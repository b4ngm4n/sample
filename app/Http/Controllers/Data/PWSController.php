<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use App\Models\Faskes;
use App\Models\KategoriVaksin;
use App\Models\Pws;
use App\Models\Tahun;
use App\Models\Vaksin;
use App\Models\WilayahKerja;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PWSController extends Controller
{
    private function getWilayahKerjaData($kategori, $faskesId)
    {
        $wilayahKerja = Faskes::where('id', $faskesId)->with('wilayahKerja')->first()->wilayahKerja;
        $vaksins = Vaksin::with('kategoriVaksin')->whereHas('kategoriVaksin', function ($query) use ($kategori) {
            $query->where('kategori_id', $kategori);
        })->get();

        return [
            'wilayahKerja' => $wilayahKerja,
            'vaksins' => $vaksins,
        ];
    }

    public function getImunisasiBayi(Request $request)
    {
        $tahuns = Tahun::all();
        $bulans = Bulan::all();

        // dd(now()->);
        $tahun = $request->get('tahun', Tahun::where('tahun', now()->year)->first()->id);
        $bulan = $request->get('bulan', Bulan::where('bulan', Carbon::parse(now())->isoFormat('MMMM'))->first()->id);

        $faskes = Faskes::where('id', 5)->first();
        
        $data = $this->getWilayahKerjaData(1, $faskes->id);

        $pwsRecords = PWS::where('tahun_id', $tahun)
            ->where('bulan_id', $bulan)
            ->where('kategori_id', 1)
            ->get();

        // Map data PWS ke format yang sesuai
        $pwsData = [];
        foreach ($pwsRecords as $record) {
            $pwsData[$record->vaksin_id][$record->wilayah_id] = [
                'L' => $record->jumlah_imunisasi_l,
                'P' => $record->jumlah_imunisasi_p,
            ];
        }


        return view('dashboard.page.pws.imunisasi-bayi.index', compact('tahuns', 'bulans', 'tahun', 'bulan', 'data', 'pwsData', 'faskes'));
    }

    public function storeImunisasiBayi(Request $request)
    {
        $tahunId = $request->tahun;
        $bulanId = $request->bulan;

        foreach ($request->jumlah as $vaksinId => $wilayahData) {
            foreach ($wilayahData as $wilayahId => $jumlah) {
                PWS::updateOrCreate(
                    [
                        'tahun_id' => $tahunId,
                        'bulan_id' => $bulanId,
                        'faskes_id' => 5, // Hardcoded; change as needed
                        'vaksin_id' => $vaksinId,
                        'wilayah_id' => $wilayahId,
                        'kategori_id' => 1,
                    ],
                    [
                        'jumlah_imunisasi_l' => $jumlah['L'] ?? 0,
                        'jumlah_imunisasi_p' => $jumlah['P'] ?? 0,
                    ]
                );
            }
        }

        toast('Data berhasil tersimpan', 'success');

        return redirect()->back();
    }


    public function getImunisasiBaduta()
    {
        return view('dashboard.page.pws.imunisasi-baduta.index');
    }

    public function storeImunisasiBaduta(Request $request) {}

    public function getImunisasiWUS()
    {
        return view('dashboard.page.pws.imunisasi-wus.index');
    }

    public function storeImunisasiWUS(Request $request) {}
}
