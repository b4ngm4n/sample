<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::with('kabupaten')->get();
        return view('dashboard.page.kecamatan.index', compact('kecamatans'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::pluck('uuid', 'nama_kabupaten');
        return view('dashboard.page.kecamatan.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kabupaten' => 'required|exists:kabupatens,uuid',
            'nama_kecamatan' => 'required',
            'kode_kecamatan' => 'required|unique:kecamatans,kode_kecamatan',
        ], [
            'kabupaten.exists' => 'Kabupaten tidak ditemukan',
            'kabupaten.required' => 'Kabupaten harus diisi',
            'kode_kecamatan.required' => 'Kode Kecamatan harus diisi',
            'kode_kecamatan.unique' => 'Kode Kecamatan sudah ada',
            'nama_kecamatan.required' => 'Nama Kecamatan harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kabupaten = Kabupaten::where('uuid', $request->kabupaten)->first();

        $kecamatan = new Kecamatan();
        $kecamatan->kabupaten_id = $kabupaten->id;
        $kecamatan->nama_kecamatan = Str::upper($request->nama_kecamatan);
        $kecamatan->slug = Str::slug($request->nama_kecamatan . '-' . $request->kode_kecamatan);
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->save();

        $refer = $request->headers->get('referer');

        if (str_contains($refer, route('kabupaten.show', $kabupaten->uuid))) {
            toast('Kecamatan berhasil ditambahkan', 'success');
            return redirect()->back();
        }

        toast('Kecamatan berhasil ditambahkan', 'success');
        return redirect()->route('kecamatan.index');
    }

    public function show(Kecamatan $kecamatan)
    {
        return view('dashboard.page.kecamatan.show', compact('kecamatan'));
    }

    public function edit(Kecamatan $kecamatan)
    {
        $kabupatens = Kabupaten::pluck('uuid', 'nama_kabupaten');
        return view('dashboard.page.kecamatan.edit', compact('kecamatan', 'kabupatens'));
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $validasi = Validator::make($request->all(), [
            'kabupaten' => 'required|exists:kabupatens,uuid',
            'nama_kecamatan' => 'required',
            'kode_kecamatan' => 'required|unique:kecamatans,kode_kecamatan,' . $kecamatan->id,
        ], [
            'kabupaten.exists' => 'Kabupaten tidak ditemukan',
            'kabupaten.required' => 'Kabupaten harus diisi',
            'kode_kecamatan.required' => 'Kode Kecamatan harus diisi',
            'kode_kecamatan.unique' => 'Kode Kecamatan sudah ada',
            'nama_kecamatan.required' => 'Nama Kecamatan harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kabupaten = Kabupaten::where('uuid', $request->kabupaten)->first();

        $kecamatan->update([
            'kabupaten_id' => $kabupaten->id,
            'nama_kecamatan' => Str::upper($request->nama_kecamatan),
            'slug' => Str::slug($request->nama_kecamatan . '-' . $request->kode_kecamatan),
            'kode_kecamatan' => $request->kode_kecamatan
        ]);

        toast('Kecamatan berhasil diubah', 'success');
        return redirect()->route('kecamatan.index');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();

        toast('Kecamatan berhasil dihapus', 'success');
        return redirect()->back();
    }
}
