<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KabupatenController extends Controller
{
    public function index()
    {
        $kabupatens = Kabupaten::with('provinsi')->get();

        return view('dashboard.page.kabupaten.index', compact('kabupatens'));
    }

    public function create()
    {
        $provinsis = Provinsi::pluck('uuid', 'nama_provinsi');
        return view('dashboard.page.kabupaten.create', compact('provinsis'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'provinsi' => 'required|exists:provinsis,uuid',
            'nama_kabupaten' => 'required',
            'kode_kabupaten' => 'required|required|unique:kabupatens,kode_kabupaten',
        ]);

        if ($validasi->fails()) {
            toast('Gagal menambahkan','error');
            return back()->withErrors($validasi)->withInput();
        }

        $provinsi = Provinsi::where('uuid', $request->provinsi)->first();

        $kabupaten = new Kabupaten();
        $kabupaten->provinsi_id = $provinsi->id;
        $kabupaten->nama_kabupaten = Str::upper($request->nama_kabupaten);
        $kabupaten->slug = Str::slug($request->nama_kabupaten. '-' . $request->kode_kabupaten);
        $kabupaten->kode_kabupaten = $request->kode_kabupaten;
        $kabupaten->save();

        // cek asal request
        $referer = $request->headers->get('referer');

        if (str_contains($referer, route('provinsi.show', $provinsi->uuid))) {
            toast('Kabupaten berhasil ditambahkan', 'success');
            return redirect()->back();
        }

        toast('Kabupaten berhasil ditambahkan', 'success');
        return redirect()->route('kabupaten.index');
    }

    public function show(Kabupaten $kabupaten)
    {
        return view('dashboard.page.kabupaten.show', compact('kabupaten'));
    }

    public function edit(Kabupaten $kabupaten)
    {
        $provinsis = Provinsi::pluck('uuid', 'nama_provinsi');
        return view('dashboard.page.kabupaten.edit', compact('kabupaten', 'provinsis'));
    }

    public function update(Request $request, Kabupaten $kabupaten)
    {
        $validasi = Validator::make($request->all(), [
            'provinsi' => 'required|exists:provinsis,uuid',
            'nama_kabupaten' => 'required',
            'kode_kabupaten' => 'required|required|unique:kabupatens,kode_kabupaten,'. $kabupaten->id,
        ], [
            'provinsi.exists' => 'Provinsi tidak ditemukan',
            'provinsi.required' => 'Provinsi harus diisi',
            'kode_kabupaten.required' => 'Kode Kabupaten harus diisi',
            'kode_kabupaten.unique' => 'Kode Kabupaten sudah ada',
            'nama_kabupaten.required' => 'Nama Kabupaten harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $provinsi = Provinsi::where('uuid', $request->provinsi)->first();

        $kabupaten->update([
            'provinsi_id' => $provinsi->id,
            'nama_kabupaten' => Str::upper($request->nama_kabupaten),
            'slug' => Str::slug($request->nama_kabupaten . '-' . $request->kode_kabupaten),
            'kode_kabupaten' => $request->kode_kabupaten
        ]);

        toast('Kabupaten berhasil diubah', 'success');
        return redirect()->route('kabupaten.index');
    }

    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();

        toast('Kabupaten berhasil dihapus', 'success');
        return redirect()->back();
    }
}
