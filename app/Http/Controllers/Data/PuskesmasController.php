<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PuskesmasController extends Controller
{
    public function index()
    {
        $listpuskes =  Puskesmas::withCount('wilayah_kerja')->get();

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
        $puskesmas->nama_puskesmas = Str::upper($request->nama_puskesmas);
        $puskesmas->slug = Str::slug($request->nama_puskesmas . '-' . $request->kode_puskesmas);
        $puskesmas->kode_puskesmas = $request->kode_puskesmas;
        $puskesmas->status_puskesmas = $request->status == 'on' ? 'aktif' : 'non-aktif';
        $puskesmas->alamat = $request->alamat_puskesmas ?? '';
        $puskesmas->save();

        toast('Puskesmas berhasil ditambahkan', 'success');

        return redirect()->route('puskesmas.index');
    }

    public function show(Puskesmas $puskesmas)
    {
        $kelurahans = Kelurahan::where('kecamatan_id', $puskesmas->kecamatan_id)->with('kecamatan')->pluck('uuid', 'nama_kelurahan');

        return view('dashboard.page.puskesmas.show', compact('puskesmas', 'kelurahans'));
    }

    public function edit(Puskesmas $puskesmas)
    {
        $kecamatans = Kecamatan::pluck('uuid', 'nama_kecamatan');
        return view('dashboard.page.puskesmas.edit', compact('puskesmas', 'kecamatans'));
    }

    public function update(Request $request, puskesmas $puskesmas)
    {
        $validasi = Validator::make($request->all(), [
            'kecamatan' => 'required|exists:kecamatans,uuid',
            'kode_puskesmas' => 'required|unique:puskesmas,kode_puskesmas, ' . $puskesmas->id,
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

        $puskesmas->update([
            'kecamatan_id' => $kecamatan->id,
            'nama_puskesmas' => Str::upper($request->nama_puskesmas),
            'kode_puskesmas' => $request->kode_puskesmas,
            'slug' => Str::slug($request->nama_puskesmas . '-' . $request->kode_puskesmas),
            'status_puskesmas' => $request->status == 'on' ? 'aktif' : 'non-aktif',
            'alamat' => $request->alamat_puskesmas ?? '',
        ]);

        toast('Puskesmas berhasil diubah', 'success');

        return redirect()->route('puskesmas.index');
    }

    public function destroy(Puskesmas $puskesmas)
    {
        if ($puskesmas->wilayah_kerja->isEmpty()) {
            $puskesmas->delete();
            toast('Puskesmas berhasil dihapus', 'success');

            return redirect()->route('puskesmas.index');
        }

        toast('Hapus dahulu wilayah kerja', 'error');

        return redirect()->route('puskesmas.index');
    }


    // WILAYAH KERJA
    public function wilayahKerja(Request $request, Puskesmas $puskesmas)
    {
        $validasi = Validator::make($request->all(), [
            // 'wilayah' => 'required|array',
            'wilayah.*' => 'required|exists:kelurahans,uuid'
        ], [
            // 'wilayah.required' => 'Wilayah harus diisi',
            'wilayah.*.exists' => 'Wilayah tidak ditemukan'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        if ($request->wilayah == null) {
            $puskesmas->wilayah_kerja()->detach();
            toast('Wilayah kerja telah kosong', 'success');
            return redirect()->back();
        }

        $kelurahanId = Kelurahan::whereIn('uuid', $request->wilayah)->pluck('id');

        $puskesmas->wilayah_kerja()->sync($kelurahanId);

        toast('Wilayah Kerja berhasil disimpan', 'success');
        return redirect()->back();
    }

}
