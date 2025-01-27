<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use App\Models\Faskes;
use App\Models\Kategori;
use App\Models\Pws;
use App\Models\Tahun;
use App\Models\Vaksin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PWSController extends Controller
{
    // Konsep
    /*
        - misal saya login pakai akun faskes tertentu, ambil contoh faskes puskesmas kota barat
        maka saya hanya akan melihat data imunisasi bayi untuk faskes saya,

        - misal saya login pakai akun faskes tertentu tetapi dengan level lebih tinggi dengan contoh
        kabkot (dinas kesehatan kota gorontalo), maka puskesmas yang berada di bawahnya akan tampil
        dengan kata lain, akan terdapat filter perfaskes, sehingga faskes yang di filter akan muncul
        datanya layaknya faskes puskesmas yang login pada faskesnya.
    */
    private function getWilayahKerjaData($kategori, $faskesId)
    {
        // disini kita akan mengambil parameter kategori (berupa id dari kategori misalnya kategori IDL)
        // kemudian kategori akan kita jadikan untuk mendapatkan data vaksin untuk PWS
        $vaksins = Vaksin::with('kategoriVaksin')->whereHas('kategoriVaksin', function ($query) use ($kategori) {
            $query->where('kategori_id', $kategori);
        })->get();

        // disini kita akan mendapatkan wilayahKerja berdasarkan faskes id 
        // nah makanya kita butuh verifikasi yang login tetapi hanya sebatas dinkes kabkot.
        $wilayahKerja = Faskes::where('id', $faskesId)->with('wilayahKerja')->first()->wilayahKerja;
        return [
            'wilayahKerja' => $wilayahKerja,
            'vaksins' => $vaksins,
        ];
    }

    public function getImunisasiBayi(Request $request)
    {
        // 1. Ambil semua data tahun dan bulan untuk filter
        $tahuns = Tahun::all();
        $bulans = Bulan::all();

        // 2. Ambil bulan dan tahun default (terbaru) jika tidak ada filter
        $tahun = $request->get('tahun', Tahun::where('tahun', now()->year)->first()->id);
        $bulan = $request->get('bulan', Bulan::where('bulan', Carbon::parse(now())->isoFormat('MMMM'))->first()->id);

        // 3. Identifikasi user yang login dan jenis faskes mereka
        $user = auth()->user();
        $faskesQuery = Faskes::query();

        if ($user->roles->pluck('slug')->contains('administrator') && $user->faskes == null) {
            $selectedFaskesId = $request->get('faskes', Faskes::where('jenis_faskes', 'puskesmas')->first()->id);
            $faskes = Faskes::find($selectedFaskesId);
            $faskesQuery->where('jenis_faskes', 'puskesmas');
        } else {
            if ($user->faskes->jenis_faskes === 'puskesmas') {
                // 4. Jika user adalah puskesmas, gunakan faskes miliknya
                $faskes = $user->faskes;
                $faskesQuery->where('id', $faskes->id);
            } elseif ($user->faskes->jenis_faskes === 'dinkes-kabkot') {
                // 5. Jika user adalah dinkes_kabkot, ambil faskes berdasarkan filter atau yang pertama
                $selectedFaskesId = $request->get('faskes', Faskes::where('parent_id', $user->faskes->id)->first()->id);
                $faskes = Faskes::find($selectedFaskesId);
                $faskesQuery->where('parent_id', $user->faskes->id); // Filter hanya untuk anak faskes dinkes_kabkot
            } else {
                toast('Anda tidak berhak mengakses halaman ini', 'error');
                return redirect()->route('dashboard');
            }
        }

        // 7. Ambil daftar faskes untuk ditampilkan di filter
        $faskesList = $faskesQuery->get();

        // 8. Dapatkan kategori vaksin ID untuk kategori bayi dan status IDL
        $kategoriId = Kategori::where('jenis_kategori', 'bayi')
            ->where('status_kategori', 'idl')
            ->first()
            ->id;

        // 9. Ambil data wilayah kerja dan vaksin
        $data = $this->getWilayahKerjaData($kategoriId, $faskes->id);

        // 10. Ambil data PWS untuk tahun dan bulan yang dipilih
        $pwsRecords = PWS::where('tahun_id', $tahun)
            ->where('bulan_id', $bulan)
            ->where('kategori_id', $kategoriId)
            ->where('faskes_id', $faskes->id)
            ->get();

        // 11. Format data PWS menjadi array terstruktur
        $pwsData = [];
        foreach ($pwsRecords as $record) {
            $pwsData[$record->vaksin_id][$record->wilayah_id] = [
                'L' => $record->jumlah_imunisasi_l,
                'P' => $record->jumlah_imunisasi_p,
            ];
        }

        Session::put('tahun', $tahun);
        Session::put('bulan', $bulan);
        Session::put('faskes', $faskes->id);

        // 12. Tampilkan data ke view
        return view('dashboard.page.pws.imunisasi-bayi.index', compact([
            'tahuns',
            'bulans',
            'tahun',
            'bulan',
            'data',
            'pwsData',
            'faskes',
            'faskesList'
        ]));
    }


    public function storeImunisasiBayi(Request $request)
    {
        $tahunId = session('tahun');
        $bulanId = session('bulan');
        $faskesId = session('faskes');

        $faskes = Faskes::where('jenis_faskes', 'puskesmas')->whereHas('akunPengguna', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->first();

        $kategoriId = Kategori::where('jenis_kategori', 'bayi')->where('status_kategori', 'idl')->first()->id;

        if (!$faskes && !auth()->user()->roles->pluck('slug')->contains('administrator')) {
            toast('Anda tidak berhak melakukan penginputan', 'error');
            return redirect()->back();
        }

        foreach ($request->jumlah as $vaksinId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                PWS::updateOrCreate(
                    [
                        'tahun_id' => $tahunId,
                        'bulan_id' => $bulanId,
                        'faskes_id' => $faskesId,
                        'vaksin_id' => $vaksinId,
                        'wilayah_id' => $wilayahId,
                        'kategori_id' => $kategoriId,
                    ],
                    [
                        'jumlah_imunisasi_l' => $jumlah['L'] ?? 0,
                        'jumlah_imunisasi_p' => $jumlah['P'] ?? 0,
                    ]
                );
            }
        }

        toast('Data berhasil tersimpan', 'success');

        session()->forget('tahun');
        session()->forget('bulan');
        session()->forget('faskes');

        return redirect()->back();
    }


    public function getImunisasiBaduta(Request $request)
    {
        // 1. Ambil semua data tahun dan bulan untuk filter
        $tahuns = Tahun::all();
        $bulans = Bulan::all();

        // 2. Ambil bulan dan tahun default (terbaru) jika tidak ada filter
        $tahun = $request->get('tahun', Tahun::where('tahun', now()->year)->first()->id);
        $bulan = $request->get('bulan', Bulan::where('bulan', Carbon::parse(now())->isoFormat('MMMM'))->first()->id);

        // 3. Identifikasi user yang login dan jenis faskes mereka
        $user = auth()->user();
        $faskesQuery = Faskes::query();

        if ($user->roles->pluck('slug')->contains('administrator') && $user->faskes == null) {
            $selectedFaskesId = $request->get('faskes', Faskes::where('jenis_faskes', 'puskesmas')->first()->id);
            $faskes = Faskes::find($selectedFaskesId);
            $faskesQuery->where('jenis_faskes', 'puskesmas');
        } else {
            if ($user->faskes->jenis_faskes === 'puskesmas') {
                // 4. Jika user adalah puskesmas, gunakan faskes miliknya
                $faskes = $user->faskes;
                $faskesQuery->where('id', $faskes->id);
            } elseif ($user->faskes->jenis_faskes === 'dinkes-kabkot') {
                // 5. Jika user adalah dinkes_kabkot, ambil faskes berdasarkan filter atau yang pertama
                $selectedFaskesId = $request->get('faskes', Faskes::where('parent_id', $user->faskes->id)->first()->id);
                $faskes = Faskes::find($selectedFaskesId);
                $faskesQuery->where('parent_id', $user->faskes->id); // Filter hanya untuk anak faskes dinkes_kabkot
            } else {
                toast('Anda tidak berhak mengakses halaman ini', 'error');
                return redirect()->route('dashboard');
            }
        }

        // 7. Ambil daftar faskes untuk ditampilkan di filter
        $faskesList = $faskesQuery->get();

        // 8. Dapatkan kategori vaksin ID untuk kategori baduta dan status IBL
        $kategoriId = Kategori::where('jenis_kategori', 'baduta')
            ->where('status_kategori', 'ibl')
            ->first()
            ->id;

        // 9. Ambil data wilayah kerja dan vaksin
        $data = $this->getWilayahKerjaData($kategoriId, $faskes->id);

        // 10. Ambil data PWS untuk tahun dan bulan yang dipilih
        $pwsRecords = PWS::where('tahun_id', $tahun)
            ->where('bulan_id', $bulan)
            ->where('kategori_id', $kategoriId)
            ->where('faskes_id', $faskes->id)
            ->get();

        // 11. Format data PWS menjadi array terstruktur
        $pwsData = [];
        foreach ($pwsRecords as $record) {
            $pwsData[$record->vaksin_id][$record->wilayah_id] = [
                'L' => $record->jumlah_imunisasi_l,
                'P' => $record->jumlah_imunisasi_p,
            ];
        }

        Session::put('tahun', $tahun);
        Session::put('bulan', $bulan);
        Session::put('faskes', $faskes->id);

        // 12. Tampilkan data ke view
        return view('dashboard.page.pws.imunisasi-baduta.index', compact([
            'tahuns',
            'bulans',
            'tahun',
            'bulan',
            'data',
            'pwsData',
            'faskes',
            'faskesList'
        ]));
    }

    public function storeImunisasiBaduta(Request $request) 
    {
        $tahunId = session('tahun');
        $bulanId = session('bulan');
        $faskesId = session('faskes');

        $faskes = Faskes::where('jenis_faskes', 'puskesmas')->whereHas('akunPengguna', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->first();

        $kategoriId = Kategori::where('jenis_kategori', 'baduta')->where('status_kategori', 'ibl')->first()->id;

        if (!$faskes && !auth()->user()->roles->pluck('slug')->contains('administrator')) {
            toast('Anda tidak berhak melakukan penginputan', 'error');
            return redirect()->back();
        }

        foreach ($request->jumlah as $vaksinId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                PWS::updateOrCreate(
                    [
                        'tahun_id' => $tahunId,
                        'bulan_id' => $bulanId,
                        'faskes_id' => $faskesId,
                        'vaksin_id' => $vaksinId,
                        'wilayah_id' => $wilayahId,
                        'kategori_id' => $kategoriId,
                    ],
                    [
                        'jumlah_imunisasi_l' => $jumlah['L'] ?? 0,
                        'jumlah_imunisasi_p' => $jumlah['P'] ?? 0,
                    ]
                );
            }
        }

        toast('Data berhasil tersimpan', 'success');

        session()->forget('tahun');
        session()->forget('bulan');
        session()->forget('faskes');

        return redirect()->back();
    }

    public function getImunisasiWUS(Request $request)
    {
        // 1. Ambil semua data tahun dan bulan untuk filter
        $tahuns = Tahun::all();
        $bulans = Bulan::all();

        // 2. Ambil bulan dan tahun default (terbaru) jika tidak ada filter
        $tahun = $request->get('tahun', Tahun::where('tahun', now()->year)->first()->id);
        $bulan = $request->get('bulan', Bulan::where('bulan', Carbon::parse(now())->isoFormat('MMMM'))->first()->id);

        // 3. Identifikasi user yang login dan jenis faskes mereka
        $user = auth()->user();
        $faskesQuery = Faskes::query();

        if ($user->roles->pluck('slug')->contains('administrator') && $user->faskes == null) {
            $selectedFaskesId = $request->get('faskes', Faskes::where('jenis_faskes', 'puskesmas')->first()->id);
            $faskes = Faskes::find($selectedFaskesId);
            $faskesQuery->where('jenis_faskes', 'puskesmas');
        } else {
            if ($user->faskes->jenis_faskes === 'puskesmas') {
                // 4. Jika user adalah puskesmas, gunakan faskes miliknya
                $faskes = $user->faskes;
                $faskesQuery->where('id', $faskes->id);
            } elseif ($user->faskes->jenis_faskes === 'dinkes-kabkot') {
                // 5. Jika user adalah dinkes_kabkot, ambil faskes berdasarkan filter atau yang pertama
                $selectedFaskesId = $request->get('faskes', Faskes::where('parent_id', $user->faskes->id)->first()->id);
                $faskes = Faskes::find($selectedFaskesId);
                $faskesQuery->where('parent_id', $user->faskes->id); // Filter hanya untuk anak faskes dinkes_kabkot
            } else {
                toast('Anda tidak berhak mengakses halaman ini', 'error');
                return redirect()->route('dashboard');
            }
        }

        // 7. Ambil daftar faskes untuk ditampilkan di filter
        $faskesList = $faskesQuery->get();

        // 8. Dapatkan kategori vaksin ID untuk kategori WUS dan status TT2
        $kategoriId = Kategori::where('jenis_kategori', 'wus')
            ->where('status_kategori', 'tt+')
            ->first()
            ->id;

        // 9. Ambil data wilayah kerja dan vaksin
        $data = $this->getWilayahKerjaData($kategoriId, $faskes->id);

        // 10. Ambil data PWS untuk tahun dan bulan yang dipilih
        $pwsRecords = PWS::where('tahun_id', $tahun)
            ->where('bulan_id', $bulan)
            ->where('kategori_id', $kategoriId)
            ->where('faskes_id', $faskes->id)
            ->get();

        // 11. Format data PWS menjadi array terstruktur
        $pwsData = [];
        foreach ($pwsRecords as $record) {
            $pwsData[$record->vaksin_id][$record->wilayah_id] = [
                'L' => $record->jumlah_imunisasi_l,
                'P' => $record->jumlah_imunisasi_p,
            ];
        }

        Session::put('tahun', $tahun);
        Session::put('bulan', $bulan);
        Session::put('faskes', $faskes->id);

        return view('dashboard.page.pws.imunisasi-wus.index', compact([
            'tahuns',
            'bulans',
            'tahun',
            'bulan',
            'data',
            'pwsData',
            'faskes',
            'faskesList'
        ]));
    }

    public function storeImunisasiWUS(Request $request) 
    {
        $tahunId = session('tahun');
        $bulanId = session('bulan');
        $faskesId = session('faskes');

        $faskes = Faskes::where('jenis_faskes', 'puskesmas')->whereHas('akunPengguna', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->first();

        $kategoriId = Kategori::where('jenis_kategori', 'wus')->where('status_kategori', 'tt+')->first()->id;

        if (!$faskes && !auth()->user()->roles->pluck('slug')->contains('administrator')) {
            toast('Anda tidak berhak melakukan penginputan', 'error');
            return redirect()->back();
        }

        foreach ($request->jumlah as $vaksinId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                PWS::updateOrCreate(
                    [
                        'tahun_id' => $tahunId,
                        'bulan_id' => $bulanId,
                        'faskes_id' => $faskesId,
                        'vaksin_id' => $vaksinId,
                        'wilayah_id' => $wilayahId,
                        'kategori_id' => $kategoriId,
                    ],
                    [
                        'jumlah_imunisasi_l' => $jumlah['L'] ?? 0,
                        'jumlah_imunisasi_p' => $jumlah['P'] ?? 0,
                    ]
                );
            }
        }

        toast('Data berhasil tersimpan', 'success');

        session()->forget('tahun');
        session()->forget('bulan');
        session()->forget('faskes');

        return redirect()->back();
    }
}
