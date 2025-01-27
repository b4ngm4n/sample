<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\KategoriVaksin;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VaksinController extends Controller
{
    public function index()
    {
        $vaksins = Vaksin::withCount('kategoris')->with('stokVaksin')->get();
        return view('dashboard.page.vaksin.index', compact('vaksins'));
    }

    public function create()
    {
        return view('dashboard.page.vaksin.create');
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_vaksin' => 'required',
        ], [
            'nama_vaksin.required' => 'Nama Vaksin harus diisi',
        ]);

        if ($validasi->fails()) {
            toast('Gagal menambahkan vaksin', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $vaksin = new Vaksin();
        $vaksin->nama_vaksin = $request->nama_vaksin;
        $vaksin->slug = Str::slug($request->nama_vaksin);
        $vaksin->produsen = $request->produsen;
        $vaksin->save();

        if ($request->kategori) {
            $vaksin->kategoriVaksin()->attach($request->kategori);
        }

        return redirect()->route('vaksin.index');
    }

    public function show(Vaksin $vaksin)
    {
        $kategoris = Kategori::class;
        $vaksin->with('stokVaksin', 'kategoris');
        return view('dashboard.page.vaksin.show', compact('vaksin'));
    }

    public function edit(Vaksin $vaksin)
    {
        return view('dashboard.page.vaksin.edit', compact('vaksin'));
    }

    public function update(Request $request, Vaksin $vaksin)
    {
        $validasi = Validator::make($request->all(), [
            'nama_vaksin' => 'required',
        ], [
            'nama_vaksin.required' => 'Nama Vaksin harus diisi',
        ]);

        if ($validasi->fails()) {
            toast('Gagal menambahkan vaksin', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        if (Str::slug($request->nama_vaksin) == $vaksin->slug) {
            toast('Nama Vaksin Sudah Ada', 'error');
            return redirect()->back();
        }

        $vaksin->update([
            'nama_vaksin' => $request->nama_vaksin,
            'slug' => Str::slug($request->nama_vaksin),
            'produsen' => $request->produsen
        ]);

        $vaksin->kategoriVaksin()->sync($request->kategori);

        return redirect()->route('vaksin.index');

    }

    public function destroy(Vaksin $vaksin)
    {
        $vaksin->delete();

        toast('Berhasil menghapus vaksin', 'success');
        return redirect()->back();
    }
}
