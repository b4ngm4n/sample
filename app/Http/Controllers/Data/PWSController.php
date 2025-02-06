<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use App\Models\Faskes;
use App\Models\Kategori;
use App\Models\KategoriVaksin;
use App\Models\Pws;
use App\Models\PwsDetail;
use App\Models\Tahun;
use App\Models\Vaksin;
use App\Models\WilayahKerja;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        $vaksins = Vaksin::whereHas('kategoriVaksin', function ($query) use ($kategori) {
                $query->where('kategori_id', $kategori);
            })->orderBy('urutan_vaksin', 'asc')->get();

        // disini kita akan mendapatkan wilayahKerja berdasarkan faskes id 
        // nah makanya kita butuh verifikasi yang login tetapi hanya sebatas dinkes kabkot.
        // $wilayahKerja = Faskes::where('id', $faskesId)->with('wilayahKerja.wilayah')->first()->wilayahKerja;
        // $wilayahKerja = Cache::remember('pws_wilayah_kerja_' . $faskesId, 60 * 60, function () use ($faskesId) {
        //     return WilayahKerja::where('faskes_id', $faskesId)->with('wilayah')->get();
        // });
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
        if ($request->get('tahun')) {
            $tahun = Tahun::where('id', $request->get('tahun'))->first();
         } else {
             $tahun = Tahun::where('tahun', now()->year)->first();
         }
         if ($request->get('bulan')) {
             $bulan = Bulan::where('id', $request->get('bulan'))->first();
         } else {
             $bulan = Bulan::where('bulan', Carbon::parse(now())->isoFormat('MMMM'))->first();
         }
        
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
        try {

            $kategoriId = Kategori::where('jenis_kategori', 'pws')
            ->where('status_kategori', 'idl')
            ->first()
            ->id;
        } catch (Exception $e) {
            toast('Jenis Kategori "pws" dan status "idl" tidak ditemukan', 'error');
            return redirect()->route('kategori.index');
        }

        // 9. Ambil data wilayah kerja dan vaksin
        $data = $this->getWilayahKerjaData($kategoriId, $faskes->id);

        // 10. Ambil data PWS berdasarkan filter
        $pwsRecords = PWS::where('tahun_id', $tahun->id)
            ->where('bulan_id', $bulan->id)
            ->whereHas('kategoriVaksin', function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })->whereHas('wilayahKerja', function ($query) use ($faskes) {
                $query->where('faskes_id', $faskes->id);
            })
            ->with('pwsDetail', 'kategoriVaksin.vaksin', 'wilayahKerja.wilayah')
            ->get();

        // 11. Format data PWS menjadi array terstruktur
        $pwsData = [];
        foreach ($pwsRecords as $record) {
            foreach ($record->pwsDetail as $detail) {
                $pwsData[$record->kategoriVaksin->vaksin->id][$record->wilayahKerja->wilayah->id][$detail->jenis_data] = $detail->jumlah;
            }
        }

        //  Simpan Session agar dapat digunakan sebagai ketika melakukan store
        Session::put('tahun', $tahun->id);
        Session::put('bulan', $bulan->id);
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

        $kategoriId = Kategori::where('jenis_kategori', 'pws')->where('status_kategori', 'idl')->first()->id;

        try {
            $kategoriId = Kategori::where('jenis_kategori', 'pws')
                    ->where('status_kategori', 'idl')
                    ->first()
                    ->id;

            if (!KategoriVaksin::where('kategori_id', $kategoriId)->first()) {
                toast('Anda belum menambahkan vaksin untuk kategori ini', 'error');
                return redirect()->route('vaksin.index');
            }
        } catch (Exception $e) {
            toast('Jenis Kategori "pws" dan status "idl" tidak ditemukan', 'error');
            return redirect()->route('kategori.index');
        }

        foreach ($request->jumlah as $vaksinId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                $wilayahKerjaId = WilayahKerja::where('faskes_id', $faskesId)->where('wilayah_id', $wilayahId)->first()->id;
                $kategoriVaksinId = KategoriVaksin::where('vaksin_id', $vaksinId)->where('kategori_id', $kategoriId)->first()->id;
                $pws = PWS::updateOrCreate(
                    [
                        'tahun_id' => $tahunId,
                        'bulan_id' => $bulanId,
                        'kategori_vaksin_id' => $kategoriVaksinId,
                        'wilayah_kerja_id' => $wilayahKerjaId,
                    ]
                );

                // Update or Create details untuk Laki - Laki
                PwsDetail::updateOrCreate(
                    [
                        'pws_id' => $pws->id,
                        'jenis_data' => 'jumlah_laki_laki',
                    ],
                    [
                        'jumlah' => $jumlah['L'] ?? 0,
                    ]
                );
                // Update or Create details untuk Perempuan
                PwsDetail::updateOrCreate(
                    [
                        'pws_id' => $pws->id,
                        'jenis_data' => 'jumlah_perempuan',
                    ],
                    [
                        'jumlah' => $jumlah['P'] ?? 0,
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
        // dd($request->all());
        // 1. Ambil semua data tahun dan bulan untuk filter
        $tahuns = Tahun::all();
        $bulans = Bulan::all();

        // 2. Ambil bulan dan tahun default (terbaru) jika tidak ada filter
        if ($request->get('tahun')) {
           $tahun = Tahun::where('id', $request->get('tahun'))->first();
        } else {
            $tahun = Tahun::where('tahun', now()->year)->first();
        }
        if ($request->get('bulan')) {
            $bulan = Bulan::where('id', $request->get('bulan'))->first();
        } else {
            $bulan = Bulan::where('bulan', Carbon::parse(now())->isoFormat('MMMM'))->first();
        }

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
        try {
            $kategoriId = Kategori::where('jenis_kategori', 'pws')
                    ->where('status_kategori', 'ibl')
                    ->first()
                    ->id;
            
        } catch (Exception $e) {
            toast('Jenis Kategori "pws" dan status "ibl" tidak ditemukan', 'error');
            return redirect()->route('kategori.index');
        }

        // 9. Ambil data wilayah kerja dan vaksin
        $data = $this->getWilayahKerjaData($kategoriId, $faskes->id);

        // 10. Ambil data PWS berdasarkan filter
        $pwsRecords = PWS::where('tahun_id', $tahun->id)
            ->where('bulan_id', $bulan->id)
            ->whereHas('kategoriVaksin', function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })->whereHas('wilayahKerja', function ($query) use ($faskes) {
                $query->where('faskes_id', $faskes->id);
            })
            ->with('pwsDetail', 'kategoriVaksin.vaksin', 'wilayahKerja.wilayah')
            ->get();

        // 11. Format data PWS menjadi array terstruktur
        $pwsData = [];
        foreach ($pwsRecords as $record) {
            foreach ($record->pwsDetail as $detail) {
                $pwsData[$record->kategoriVaksin->vaksin->id][$record->wilayahKerja->wilayah->id][$detail->jenis_data] = $detail->jumlah;
            }
        }

        //  Simpan Session agar dapat digunakan sebagai ketika melakukan store
        Session::put('tahun', $tahun->id);
        Session::put('bulan', $bulan->id);
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

        $kategoriId = Kategori::where('jenis_kategori', 'pws')->where('status_kategori', 'ibl')->first()->id;

        try {
            $kategoriId = Kategori::where('jenis_kategori', 'pws')
                    ->where('status_kategori', 'ibl')
                    ->first()
                    ->id;

            if (!KategoriVaksin::where('kategori_id', $kategoriId)->first()) {
                toast('Anda belum menambahkan vaksin untuk kategori ini', 'error');
                return redirect()->route('vaksin.index');
            }
        } catch (Exception $e) {
            toast('Jenis Kategori "pws" dan status "ibl" tidak ditemukan', 'error');
            return redirect()->route('kategori.index');
        }

        foreach ($request->jumlah as $vaksinId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                $wilayahKerjaId = WilayahKerja::where('faskes_id', $faskesId)->where('wilayah_id', $wilayahId)->first()->id;

                $kategoriVaksinId = KategoriVaksin::where('vaksin_id', $vaksinId)->where('kategori_id', $kategoriId)->first()->id;
                $pws = PWS::updateOrCreate(
                    [
                        'tahun_id' => $tahunId,
                        'bulan_id' => $bulanId,
                        'kategori_vaksin_id' => $kategoriVaksinId,
                        'wilayah_kerja_id' => $wilayahKerjaId,
                    ]
                );

                // Update or Create details untuk Laki - Laki
                PwsDetail::updateOrCreate(
                    [
                        'pws_id' => $pws->id,
                        'jenis_data' => 'jumlah_laki_laki',
                    ],
                    [
                        'jumlah' => $jumlah['L'] ?? 0,
                    ]
                );
                // Update or Create details untuk Perempuan
                PwsDetail::updateOrCreate(
                    [
                        'pws_id' => $pws->id,
                        'jenis_data' => 'jumlah_perempuan',
                    ],
                    [
                        'jumlah' => $jumlah['P'] ?? 0,
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

    public function getImunisasiWUSIbuHamil(Request $request)
    {
        // 1. Ambil semua data tahun dan bulan untuk filter
        $tahuns = Tahun::all();
        $bulans = Bulan::all();

        // 2. Ambil bulan dan tahun default (terbaru) jika tidak ada filter
        if ($request->get('tahun')) {
            $tahun = Tahun::where('id', $request->get('tahun'))->first();
         } else {
             $tahun = Tahun::where('tahun', now()->year)->first();
         }
         if ($request->get('bulan')) {
             $bulan = Bulan::where('id', $request->get('bulan'))->first();
         } else {
             $bulan = Bulan::where('bulan', Carbon::parse(now())->isoFormat('MMMM'))->first();
         }

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
        try {
            $kategoriId = Kategori::where('jenis_kategori', 'pws')
                    ->where('status_kategori', 'tt+')
                    ->where('slug', 'LIKE', '%ibu-hamil%')
                    ->first()
                    ->id;

            if (!KategoriVaksin::where('kategori_id', $kategoriId)->first()) {
                toast('Anda belum menambahkan vaksin untuk kategori ini', 'error');
                return redirect()->route('vaksin.index');
            }
        } catch (Exception $e) {
            toast('Jenis Kategori "pws" dan status "tt+" ibu-hamil tidak ditemukan', 'error');
            return redirect()->route('kategori.index');
        }

        // 9. Ambil data wilayah kerja dan vaksin
        $data = $this->getWilayahKerjaData($kategoriId, $faskes->id);

        // 10. Ambil data PWS berdasarkan filter
        $pwsRecords = PWS::where('tahun_id', $tahun->id)
            ->where('bulan_id', $bulan->id)
            ->whereHas('kategoriVaksin', function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })->whereHas('wilayahKerja', function ($query) use ($faskes) {
                $query->where('faskes_id', $faskes->id);
            })
            ->with('pwsDetail', 'kategoriVaksin.vaksin', 'wilayahKerja.wilayah')
            ->get();

        // 11. Format data PWS menjadi array terstruktur
        $pwsData = [];
        foreach ($pwsRecords as $record) {
            foreach ($record->pwsDetail as $detail) {
                $pwsData[$record->kategoriVaksin->vaksin->id][$record->wilayahKerja->wilayah->id][$detail->jenis_data] = $detail->jumlah;
            }
        }

        //  Simpan Session agar dapat digunakan sebagai ketika melakukan store
        Session::put('tahun', $tahun->id);
        Session::put('bulan', $bulan->id);
        Session::put('faskes', $faskes->id);

        return view('dashboard.page.pws.imunisasi-wus-ibu-hamil.index', compact([
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

    public function storeImunisasiWUSIbuHamil(Request $request)
    {
        $tahunId = session('tahun');
        $bulanId = session('bulan');
        $faskesId = session('faskes');

        $kategoriId = Kategori::where('jenis_kategori', 'pws')
            ->where('status_kategori', 'tt+')
            ->where('slug', 'LIKE', '%ibu-hamil%')
            ->first()->id;

        foreach ($request->jumlah as $vaksinId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                $wilayahKerjaId = WilayahKerja::where('faskes_id', $faskesId)->where('wilayah_id', $wilayahId)->first()->id;

                $kategoriVaksinId = KategoriVaksin::where('vaksin_id', $vaksinId)->where('kategori_id', $kategoriId)->first()->id;
                $pws = PWS::updateOrCreate(
                    [
                        'tahun_id' => $tahunId,
                        'bulan_id' => $bulanId,
                        'kategori_vaksin_id' => $kategoriVaksinId,
                        'wilayah_kerja_id' => $wilayahKerjaId,
                    ]
                );

                // Update or Create details untuk Laki - Laki
                PwsDetail::updateOrCreate(
                    [
                        'pws_id' => $pws->id,
                        'jenis_data' => 'jumlah_wus_suntik',
                    ],
                    [
                        'jumlah' => $jumlah['Suntik'] ?? 0,
                    ]
                );
                // Update or Create details untuk Perempuan
                PwsDetail::updateOrCreate(
                    [
                        'pws_id' => $pws->id,
                        'jenis_data' => 'jumlah_wus_status',
                    ],
                    [
                        'jumlah' => $jumlah['Status'] ?? 0,
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

    public function getImunisasiWUSTidakHamil(Request $request)
    {
        // 1. Ambil semua data tahun dan bulan untuk filter
        $tahuns = Tahun::all();
        $bulans = Bulan::all();

        // 2. Ambil bulan dan tahun default (terbaru) jika tidak ada filter
        if ($request->get('tahun')) {
            $tahun = Tahun::where('id', $request->get('tahun'))->first();
         } else {
             $tahun = Tahun::where('tahun', now()->year)->first();
         }
         if ($request->get('bulan')) {
             $bulan = Bulan::where('id', $request->get('bulan'))->first();
         } else {
             $bulan = Bulan::where('bulan', Carbon::parse(now())->isoFormat('MMMM'))->first();
         }

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
        try {
            
            $kategoriId = Kategori::where('jenis_kategori', 'pws')
                    ->where('status_kategori', 'tt+')
                    ->where('slug', 'LIKE', '%tidak-hamil%')
                    ->first()
                    ->id;

            if (!KategoriVaksin::where('kategori_id', $kategoriId)->first()) {
                toast('Anda belum menambahkan vaksin untuk kategori ini', 'error');
                return redirect()->route('vaksin.index');
            }
        } catch (Exception $e) {
            toast('Jenis Kategori "pws" dan status "tt+" tidak-hamil tidak ditemukan', 'error');
            return redirect()->route('kategori.index');
        }

        // 9. Ambil data wilayah kerja dan vaksin
        $data = $this->getWilayahKerjaData($kategoriId, $faskes->id);

        // 10. Ambil data PWS berdasarkan filter
        $pwsRecords = PWS::where('tahun_id', $tahun->id)
            ->where('bulan_id', $bulan->id)
            ->whereHas('kategoriVaksin', function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })->whereHas('wilayahKerja', function ($query) use ($faskes) {
                $query->where('faskes_id', $faskes->id);
            })
            ->with('pwsDetail', 'kategoriVaksin.vaksin', 'wilayahKerja.wilayah')
            ->get();

        // 11. Format data PWS menjadi array terstruktur
        $pwsData = [];
        foreach ($pwsRecords as $record) {
            foreach ($record->pwsDetail as $detail) {
                $pwsData[$record->kategoriVaksin->vaksin->id][$record->wilayahKerja->wilayah->id][$detail->jenis_data] = $detail->jumlah;
            }
        }

        //  Simpan Session agar dapat digunakan sebagai ketika melakukan store
        Session::put('tahun', $tahun->id);
        Session::put('bulan', $bulan->id);
        Session::put('faskes', $faskes->id);

        return view('dashboard.page.pws.imunisasi-wus-tidak-hamil.index', compact([
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

    public function storeImunisasiWUSTidakHamil(Request $request)
    {
        $tahunId = session('tahun');
        $bulanId = session('bulan');
        $faskesId = session('faskes');

        $kategoriId = Kategori::where('jenis_kategori', 'pws')
            ->where('status_kategori', 'tt+')
            ->where('slug', 'LIKE', '%tidak-hamil%')
            ->first()->id;

        foreach ($request->jumlah as $vaksinId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                $wilayahKerjaId = WilayahKerja::where('faskes_id', $faskesId)->where('wilayah_id', $wilayahId)->first()->id;

                $kategoriVaksinId = KategoriVaksin::where('vaksin_id', $vaksinId)->where('kategori_id', $kategoriId)->first()->id;
                $pws = PWS::updateOrCreate(
                    [
                        'tahun_id' => $tahunId,
                        'bulan_id' => $bulanId,
                        'kategori_vaksin_id' => $kategoriVaksinId,
                        'wilayah_kerja_id' => $wilayahKerjaId,
                    ]
                );

                // Update or Create details untuk Laki - Laki
                PwsDetail::updateOrCreate(
                    [
                        'pws_id' => $pws->id,
                        'jenis_data' => 'jumlah_wus_suntik',
                    ],
                    [
                        'jumlah' => $jumlah['Suntik'] ?? 0,
                    ]
                );
                // Update or Create details untuk Perempuan
                PwsDetail::updateOrCreate(
                    [
                        'pws_id' => $pws->id,
                        'jenis_data' => 'jumlah_wus_status',
                    ],
                    [
                        'jumlah' => $jumlah['Status'] ?? 0,
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
