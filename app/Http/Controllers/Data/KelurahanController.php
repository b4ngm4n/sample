<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahans = Kelurahan::with('kecamatan')->get();
        return view('dashboard.page.kelurahan.index', compact('kelurahans'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::pluck('uuid', 'nama_kecamatan');
        return view('dashboard.page.kelurahan.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kecamatan' => 'required|exists:kecamatans,uuid',
            'nama_kelurahan' => 'required',
            'kode_kelurahan' => 'required|unique:kelurahans,kode_kelurahan',
        ], [
            'kecamatan.exists' => 'Kecamatan tidak ditemukan',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kode_kelurahan.required' => 'Kode Kelurahan harus diisi',
            'kode_kelurahan.unique' => 'Kode Kelurahan sudah ada',
            'nama_kelurahan.required' => 'Nama Kelurahan harus diisi',

        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kecamatan = Kecamatan::where('uuid', $request->kecamatan)->first();

        $kelurahan = new Kelurahan();
        $kelurahan->kecamatan_id = $kecamatan->id;
        $kelurahan->nama_kelurahan = Str::upper($request->nama_kelurahan);
        $kelurahan->slug = Str::slug($request->nama_kelurahan . '-' . $request->kode_kelurahan);
        $kelurahan->kode_kelurahan = $request->kode_kelurahan;
        $kelurahan->save();

        $refer = $request->headers->get('referer');

        if (str_contains($refer, route('kecamatan.show', $kecamatan->uuid))) {
            toast('Kelurahan berhasil ditambahkan', 'success');
            return redirect()->back();
        }

        toast('Kelurahan berhasil ditambahkan', 'success');
        return redirect()->route('kelurahan.index');
    }

    public function show(Kelurahan $kelurahan)
    {
        return view('dashboard.page.kelurahan.show', compact('kelurahan'));
    }

    public function edit(Kelurahan $kelurahan)
    {
        $kecamatans = Kecamatan::pluck('uuid', 'nama_kecamatan');
        return view('dashboard.page.kelurahan.edit', compact('kelurahan', 'kecamatans'));
    }

    public function update(Request $request, Kelurahan $kelurahan)
    {
        $validasi = Validator::make($request->all(), [
            'kecamatan' => 'required|exists:kecamatans,uuid',
            'nama_kelurahan' => 'required',
            'kode_kelurahan' => 'required|unique:kelurahans,kode_kelurahan,' . $kelurahan->id,
        ], [
            'kecamatan.exists' => 'Kecamatan tidak ditemukan',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kode_kelurahan.required' => 'Kode Kelurahan harus diisi',
            'kode_kelurahan.unique' => 'Kode Kelurahan sudah ada',
            'nama_kelurahan.required' => 'Nama Kelurahan harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kecamatan = Kecamatan::where('uuid', $request->kecamatan)->first();

        $kelurahan->update([
            'kecamatan_id' => $kecamatan->id,
            'nama_kelurahan' => Str::upper($request->nama_kelurahan),
            'slug' => Str::slug($request->nama_kelurahan . '-' . $request->kode_kelurahan),
            'kode_kelurahan' => $request->kode_kelurahan
        ]);

        toast('Kelurahan berhasil diubah', 'success');
        return redirect()->route('kelurahan.index');
    }

    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();

        toast('Kelurahan berhasil dihapus', 'success');
        return redirect()->back();
    }
}
