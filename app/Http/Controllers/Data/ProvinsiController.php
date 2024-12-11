<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::all();

        return view('dashboard.page.provinsi.index', compact('provinsis'));
    }

    public function create()
    {
        return view('dashboard.page.provinsi.create');
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kode_provinsi' => 'required|unique:provinsis,kode_provinsi',
            'nama_provinsi' => 'required',
        ]);

        if ($validasi->fails()) {
            toast('Provinsi gagal ditambahkan', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $provinsi = new Provinsi();
        $provinsi->nama_provinsi = Str::upper($request->nama_provinsi);
        $provinsi->slug = Str::slug($request->nama_provinsi . '-'. $request->kode_provinsi);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->save();

        toast('Provinsi berhasil ditambahkan', 'success');
        return redirect()->route('provinsi.index');
    }

    public function show(Provinsi $provinsi)
    {
        return view('dashboard.page.provinsi.show', compact('provinsi'));
    }

    public function edit(Provinsi $provinsi)
    {
        return view('dashboard.page.provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, Provinsi $provinsi)
    {
        $validasi = Validator::make($request->all(), [
            'kode_provinsi' => 'required|unique:provinsis,kode_provinsi,' . $provinsi->id,
            'nama_provinsi' => 'required',
        ]);

        if ($validasi->fails()) {
            toast('Provinsi gagal diubah', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $provinsi->update([
            'nama_provinsi' => Str::upper($request->nama_provinsi),
            'slug' => Str::slug($request->nama_provinsi . '-' . $request->kode_provinsi),
            'kode_provinsi' => $request->kode_provinsi
        ]);

        toast('Provinsi berhasil diubah', 'success');
        return redirect()->route('provinsi.index');
    }

    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();

        toast('Provinsi berhasil dihapus', 'success');
        return redirect()->route('provinsi.index');
    }
}
