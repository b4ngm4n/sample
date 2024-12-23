<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\JenisPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JenisPelayananController extends Controller
{
    public function index()
    {
        $jenisPelayanans = JenisPelayanan::withCount('posPelayanans', 'vaksins')->get();

        return view('dashboard.page.jenis-pelayanan.index', compact('jenisPelayanans'));
    }

    public function create()
    {
        return view('dashboard.page.jenis-pelayanan.create');
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_pelayanan' => 'required',
        ], [
            'nama_pelayanan.required' => 'Nama pelayanan wajib diisi'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $cekSlug = JenisPelayanan::pluck('slug')->contains(Str::slug($request->nama_pelayanan . '-' . $request->tahun));

        if ($cekSlug) {
            toast('Jenis Pelayanan sudah ada', 'error');
            return redirect()->back()->withInput();
        }

        $jenisPelayanan = new JenisPelayanan();
        $jenisPelayanan->nama_pelayanan = Str::upper($request->nama_pelayanan);
        $jenisPelayanan->tahun = $request->tahun ?? null;
        $jenisPelayanan->slug = Str::slug($request->nama_pelayanan . '-' . $request->tahun);
        $jenisPelayanan->save();

        toast('Jenis Pelayanan berhasil ditambahkan', 'success');
        return redirect()->route('jenis-pelayanan.index');
    }

    public function show(JenisPelayanan $jenisPelayanan)
    {
        $jenisPelayanan->with('vaksins', 'posPelayanans');

        return view('dashboard.page.jenis-pelayanan.show', compact('jenisPelayanan'));
    }
    
    public function edit(JenisPelayanan $jenisPelayanan)
    {
        return view('dashboard.page.jenis-pelayanan.edit', compact('jenisPelayanan'));
    }

    public function update(Request $request, JenisPelayanan $jenisPelayanan)
    {
        $validasi = Validator::make($request->all(), [
            'nama_pelayanan' => 'required',
        ], [
            'nama_pelayanan.required' => 'Nama pelayanan wajib diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $cekSlug = JenisPelayanan::where('uuid', '!=', $jenisPelayanan->uuid)->pluck('slug')->contains(Str::slug($request->nama_pelayanan . '-' . $request->tahun));

        if ($cekSlug) {
            toast('Jenis Pelayanan sudah ada', 'error');
            return redirect()->back()->withInput();
        }

        $jenisPelayanan->update([
            'nama_pelayanan' => Str::upper($request->nama_pelayanan),
            'tahun' => $request->tahun ?? null,
            'slug' => Str::slug($request->nama_pelayanan . '-' . $request->tahun)
        ]);

        toast('Jenis Pelayanan berhasil diubah', 'success');

        return redirect()->route('jenis-pelayanan.index');
    }

    public function destroy(JenisPelayanan $jenisPelayanan)
    {
        if ($jenisPelayanan->vaksins->isEmpty() || $jenisPelayanan->posPelayanans->isEmpty()) {
            $jenisPelayanan->delete();

            toast('Jenis Pelayanan berhasil dihapus', 'success');
            return redirect()->back();
        }

        toast('Hapus dahulu data vaksin atau pos pelayanan', 'error');

        return redirect()->back();
    }
}
