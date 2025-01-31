<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Faskes;
use App\Models\Kategori;
use App\Models\PwsSasaran;
use App\Models\Tahun;
use App\Models\Vaksin;
use App\Models\WilayahKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PwsSasaranController extends Controller
{
    public function index(Request $request)
    {
        $tahuns = Tahun::all();

        // $tahun = $request->get('tahun', Tahun::where('tahun', now()->year)->first());
        if ($request->get('tahun')) {
            $tahun = Tahun::find($request->get('tahun'));
        } else {
            $tahun = Tahun::where('tahun', now()->year)->first();
        }


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

        $faskesList = $faskesQuery->get();

        $wilayahKerja = WilayahKerja::with('faskes', 'wilayah')->where('faskes_id', $faskes->id)->get();

        $pwsSasaranRecords = PwsSasaran::where('tahun_id', $tahun->id)
                                    ->whereHas('wilayahKerja', function ($query) use ($faskes) {
                                        $query->where('faskes_id', $faskes->id);
                                    })
                                    ->with('kategori', 'wilayahKerja.wilayah')
                                    ->get();


        $pwsSasaran = [];
        foreach ($pwsSasaranRecords as $record) {
            $pwsSasaran[$record->kategori_id][$record->wilayahKerja->wilayah->id][$record->jenis_data] = $record->jumlah;
        }

        $kategoris = Kategori::where('jenis_kategori', 'pws')
                            ->where('slug', 'LIKE', '%sasaran%')
                            ->get();

        Session::put('tahun', $tahun->id);
        Session::put('faskes', $faskes->id);

        return view('dashboard.page.pws.sasaran.index', compact([
            'kategoris',
            'faskes',
            'tahuns',
            'tahun',
            'faskesList',
            'wilayahKerja',
            'pwsSasaran'
        ]));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'jumlah' => 'required',
        ]);

        if ($validasi->fails()) {
            toast('Gagal menambahkan data', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $tahunId = session('tahun');
        $faskesId = session('faskes');

        foreach ($request->jumlah as $kategoriId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                $wilayaKerjaId = WilayahKerja::where('faskes_id', $faskesId)->where('wilayah_id', $wilayahId)->first()->id;
                if(isset($jumlah['l'])){
                    PwsSasaran::updateOrCreate(
                        [
                            'tahun_id' => $tahunId,
                            'kategori_id' => $kategoriId,
                            'wilayah_kerja_id' => $wilayaKerjaId,
                            'jenis_data' => 'l',
                        ],
                        [
                            'jumlah' => $jumlah['l'] ?? 0,
                        ]
                    );
                }
                if(isset($jumlah['p'])){
                    PwsSasaran::updateOrCreate(
                        [
                            'tahun_id' => $tahunId,
                            'kategori_id' => $kategoriId,
                            'wilayah_kerja_id' => $wilayaKerjaId,
                            'jenis_data' => 'p',
                        ],
                        [
                             'jumlah' => $jumlah['p'] ?? 0,
                        ]
                    );
                }
                 if(isset($jumlah['ibu_hamil'])){
                     PwsSasaran::updateOrCreate(
                        [
                            'tahun_id' => $tahunId,
                            'kategori_id' => $kategoriId,
                            'wilayah_kerja_id' => $wilayaKerjaId,
                            'jenis_data' => 'ibu-hamil',
                        ],
                        [
                             'jumlah' => $jumlah['ibu_hamil'] ?? 0,
                        ]
                    );
                }
                if(isset($jumlah['tidak_hamil'])){
                      PwsSasaran::updateOrCreate(
                        [
                            'tahun_id' => $tahunId,
                            'kategori_id' => $kategoriId,
                            'wilayah_kerja_id' => $wilayaKerjaId,
                            'jenis_data' => 'tidak-hamil',
                        ],
                        [
                             'jumlah' => $jumlah['tidak_hamil'] ?? 0,
                        ]
                     );
                }
            }
        }

         toast('Data berhasil tersimpan', 'success');

         session()->forget('tahun');
         session()->forget('faskes');

          return redirect()->back();
    }
}
