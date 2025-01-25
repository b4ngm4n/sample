<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\JenisImunisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JenisImunisasiController extends Controller
{
    public function index()
    {
        $jenisImunisasis = JenisImunisasi::withCount('posPelayanans', 'vaksins')->get();

        return view('dashboard.page.jenis-pelayanan.index', compact('jenisImunisasis'));
    }

    public function create()
    {
        return view('dashboard.page.jenis-pelayanan.create');
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_jenis_imunisasi' => 'required',
        ], [
            'nama_jenis_imunisasi.required' => 'Nama Imunisasi wajib diisi'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $cekSlug = JenisImunisasi::pluck('slug')->contains(Str::slug($request->nama_jenis_imunisasi . '-' . $request->tahun));

        if ($cekSlug) {
            toast('Jenis Imunisasi sudah ada', 'error');
            return redirect()->back()->withInput();
        }

        $jenisImunisasi = new JenisImunisasi();
        $jenisImunisasi->nama_jenis_imunisasi = Str::upper($request->nama_jenis_imunisasi);
        $jenisImunisasi->slug = Str::slug($request->nama_jenis_imunisasi);
        $jenisImunisasi->save();

        toast('Jenis Imunisasi berhasil ditambahkan', 'success');
        return redirect()->route('jenis-pelayanan.index');
    }

    public function show(JenisImunisasi $jenisImunisasi)
    {
        $jenisImunisasi->with('vaksins', 'posPelayanans');

        return view('dashboard.page.jenis-pelayanan.show', compact('jenisImunisasi'));
    }
    
    public function edit(JenisImunisasi $jenisImunisasi)
    {
        return view('dashboard.page.jenis-pelayanan.edit', compact('jenisImunisasi'));
    }

    public function update(Request $request, JenisImunisasi $jenisImunisasi)
    {
        $validasi = Validator::make($request->all(), [
            'nama_jenis_imunisasi' => 'required',
        ], [
            'nama_jenis_imunisasi.required' => 'Nama Imunisasi wajib diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $cekSlug = JenisImunisasi::where('uuid', '!=', $jenisImunisasi->uuid)->pluck('slug')->contains(Str::slug($request->nama_jenis_imunisasi . '-' . $request->tahun));

        if ($cekSlug) {
            toast('Jenis Imunisasi sudah ada', 'error');
            return redirect()->back()->withInput();
        }

        $jenisImunisasi->update([
            'nama_jenis_imunisasi' => Str::upper($request->nama_jenis_imunisasi),
            'slug' => Str::slug($request->nama_jenis_imunisasi)
        ]);

        toast('Jenis Imunisasi berhasil diubah', 'success');

        return redirect()->route('jenis-pelayanan.index');
    }

    public function destroy(JenisImunisasi $jenisImunisasi)
    {
        if ($jenisImunisasi->vaksins->isEmpty() || $jenisImunisasi->posPelayanans->isEmpty()) {
            $jenisImunisasi->delete();

            toast('Jenis Imunisasi berhasil dihapus', 'success');
            return redirect()->back();
        }

        toast('Hapus dahulu data vaksin atau pos pelayanan', 'error');

        return redirect()->back();
    }
}
