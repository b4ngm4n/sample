<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Faskes;
use App\Models\Wilayah;
use App\Models\WilayahKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaskesController extends Controller
{
    public function index()
    {
        $dataFaskes = Faskes::with('alamat', 'alamat.wilayah')->withCount('wilayahKerja')->withDepth()->orderBy('jenis_faskes')->get();
        
        return view('dashboard.page.faskes.index', compact('dataFaskes'));
    }

    public function show(Faskes $faskes)
    {
        $wilayahs = Wilayah::pluck('uuid', 'nama_wilayah');
        return view('dashboard.page.faskes.show', compact('faskes', 'wilayahs'));
    }

    public function wilayahKerja(Request $request, Faskes $faskes)
    {
        $validasi = Validator::make($request->all(), [
            'wilayah.*' => 'required|exists:wilayahs,uuid'
        ], [
            'wilayah.*.exists' => 'Wilayah tidak ditemukan',
            'wilayah.*.required' => 'Silahkan pilih wilayah kerja'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $wilayahId = Wilayah::whereIn('uuid', $request->wilayah)->pluck('id');

        foreach ($wilayahId as $id) {
            WilayahKerja::create([
                'faskes_id' => $faskes->id,
                'wilayah_id' => $id
            ]);
        }


        toast('Wilayah Kerja berhasil disimpan', 'success');

        return redirect()->back();
    }

    public function destroyWilayahKerja(Faskes $faskes, Wilayah $wilayah)
    {
        $wilayahKerja = WilayahKerja::where('faskes_id', $faskes->id)->where('wilayah_id', $wilayah->id)->first();
        // dd($wilayahKerja);
        if (!$wilayahKerja) {
            toast('Wilayah Kerja tidak ditemukan', 'error');
            return redirect()->back();
        }

        $wilayahKerja->delete();

        toast('Wilayah Kerja berhasil dihapus', 'success');
        return redirect()->back();
    }
}
