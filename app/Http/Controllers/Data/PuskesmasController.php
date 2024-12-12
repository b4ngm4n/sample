<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PuskesmasController extends Controller
{
    public function index()
    {
        $listpuskes =  Puskesmas::with('kecamatan')->withCount('wilayah_kerja')->get();

        return view('dashboard.page.puskesmas.index', compact('listpuskes'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::pluck('uuid', 'nama_kecamatan');
        return view('dashboard.page.puskesmas.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kecamatan' => 'required|exists:kecamatans,uuid',
            'kode_puskesmas' => 'required|unique:puskesmas,kode_puskesmas',
            'nama_puskesmas' => 'required'
        ], [
            'kecamatan.exists' => 'Kecamatan tidak ditemukan',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kode_puskesmas.unique' => 'Kode Puskesmas sudah ada',
            'kode_puskesmas.required' => 'Kode Puskesmas harus diisi',
            'nama_kecamatan.required' => 'Nama Kecamatan harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kecamatan = Kecamatan::where('uuid', $request->kecamatan)->first();

        $puskesmas = new Puskesmas();
        $puskesmas->kecamatan_id = $kecamatan->id;
        $puskesmas->nama_puskesmas = $request->nama_puskesmas;
        $puskesmas->slug = Str::slug($request->nama_puskesmas. '-' . $request->kode_puskesmas);
        $puskesmas->kode_puskesmas = $request->kode_puskesmas;
        $puskesmas->status_puskesmas = $request->status == 'on' ? 'aktif' : 'non-aktif';
        $puskesmas->alamat = $request->alamat_puskesmas ?? '';
        $puskesmas->save();

        toast('Puskesmas berhasil ditambahkan', 'success');

        return redirect()->route('puskesmas.index');
    }

    public function show(Puskesmas $puskesmas)
    {
        return view('dashboard.page.puskesmas.show', compact('puskesmas'));
    }

    public function edit(Puskesmas $puskesmas)
    {
        return view('dashboard.page.puskesmas.show', compact('puskesmas'));
    }

    public function update(Request $request, puskesmas $puskesmas)
    {
        $validasi = Validator::make($request->all(), [
            'nama_puskesmas' => 'required|unique:puskesmas, nama_puskesmas',
            'kode_puskesmas' => 'required|unique:puskesmas,kode_puskesmas'
        ]);
        
        if ($validasi->fails())
        {

        }
        
        return redirect()->route('puskesmas.index');
    }

    public function destroy(Puskesmas $puskesmas)
    {
        $puskesmas->delete();
        return redirect()->route('puskesmas.index');
    }

}
