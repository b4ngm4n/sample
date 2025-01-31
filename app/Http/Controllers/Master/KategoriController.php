<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('dashboard.page.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('dashboard.page.kategori.create');
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'jenis_kategori' => 'required',
            'status_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
            'jenis_kategori.required' => 'Jenis kategori harus diisi',
            'status_kategori.required' => 'Status kategori harus diisi',
        ]);

        if ($validasi->fails()) {
            toast('Gagal menambahkan kategori', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->jenis_kategori = $request->jenis_kategori;
        $kategori->status_kategori = $request->status_kategori;
        $kategori->slug = Str::slug($request->nama_kategori);
        $kategori->keterangan = $request->keterangan;
        $kategori->save();

        toast('Berhasil menambahkan kategori', 'success');

        return redirect()->route('kategori.index');
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.page.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validasi = Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'jenis_kategori' => 'required',
            'status_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
            'jenis_kategori.required' => 'Jenis kategori harus diisi',
            'status_kategori.required' => 'Status kategori harus diisi',
        ]);

        if ($validasi->fails()) {
            toast('Gagal mengubah kategori', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'jenis_kategori' => $request->jenis_kategori,
            'status_kategori' => $request->status_kategori,
            'slug' => Str::slug($request->nama_kategori),
            'keterangan' => $request->keterangan,
        ]);

        toast('Berhasil mengubah kategori', 'success');

        return redirect()->route('kategori.index');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
