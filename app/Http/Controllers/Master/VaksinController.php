<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\KategoriVaksin;
use App\Models\StokVaksin;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VaksinController extends Controller
{

    public function index()
    {
        $vaksins = Vaksin::withCount('kategoris')->with('stokVaksin')->orderBy('urutan_vaksin', 'asc')->get();

        return view('dashboard.page.vaksin.index', compact('vaksins'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('dashboard.page.vaksin.create', compact('kategoris'));
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
        $vaksin->urutan_vaksin = $request->urutan_vaksin;
        $vaksin->produsen = $request->produsen;
        $vaksin->save();

        if ($request->kategori) {
            KategoriVaksin::create([
                'vaksin_id' => $vaksin->id,
                'kategori_id' => Kategori::where('uuid', $request->kategori)->first()->id,
            ]);
        }

        toast('Berhasil menambahkan vaksin', 'success');
        return redirect()->route('vaksin.index');
    }

    public function show(Vaksin $vaksin)
    {
        $kategoris = Kategori::all();
        $vaksin->with('stokVaksin', 'kategoris')->get();
        return view('dashboard.page.vaksin.show', compact('vaksin', 'kategoris'));
    }

    public function edit(Vaksin $vaksin)
    {

        if (Vaksin::where('urutan_vaksin', '!==', null)->exists()) {
            // Ambil nilai urutan vaksin terbesar yang bukan null
            // dan tambahkan 1 untuk menjadi urutan vaksin yang baru
           $urutan = Vaksin::where('urutan_vaksin', '!==', null)->max('urutan_vaksin');
           $urutan += 1;
        
        } else {
            $urutan = 1;
        }
        return view('dashboard.page.vaksin.edit', compact('vaksin', 'urutan'));
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

        if (Vaksin::where('slug', Str::slug($request->nama_vaksin))->whereNotIn('id', [$vaksin->id])->exists()) {
            toast('Nama Vaksin Sudah Ada', 'error');
            return redirect()->back();
        }

        $vaksin->update([
            'nama_vaksin' => $request->nama_vaksin,
            'urutan_vaksin' => $request->urutan_vaksin ?? 0,
            'slug' => Str::slug($request->nama_vaksin),
            'produsen' => $request->produsen
        ]);

        toast('Berhasil merubah data vaksin', 'success');
        return redirect()->back();
    }

    public function destroy(Vaksin $vaksin)
    {
        $vaksin->delete();

        toast('Berhasil menghapus vaksin', 'success');
        return redirect()->back();
    }

    // STOK VAKSIN
    public function storeStokVaksin(Request $request, Vaksin $vaksin)
    {
        $validasi = Validator::make($request->all(), [
            'jumlah' => 'required',
            'satuan' => 'required',
            'kode_batch' => 'required',
            'tanggal_produksi' => 'required',
            'tanggal_expired' => 'required',
        ]);

        if ($validasi->fails()) {
            toast('Gagal menambahkan stok vaksin', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $vaksin->stokVaksin()->create([
            'kode_batch' => $request->kode_batch,
            'tanggal_produksi' => $request->tanggal_produksi,
            'tanggal_expired' => $request->tanggal_expired,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan
        ]);

        toast('Berhasil menambahkan stok vaksin', 'success');

        return redirect()->back();
    }

    public function destroyStokVaksin(StokVaksin $stokVaksin)
    {
        $stokVaksin->delete();

        toast('Berhasil menghapus stok vaksin', 'success');
        return redirect()->back();
    }
    // END STOK VAKSIN


    // KATEGORI VAKSIN
    public function storeKategoriVaksin(Request $request, Vaksin $vaksin)
    {
        $validasi = Validator::make($request->all(), [
            'kategori.*' => 'required|exists:kategoris,uuid',
        ], [
            'kategori.*.required' => 'Kategori harus diisi',
            'kategori.*.exists' => 'Kategori tidak ditemukan',
        ]);

        if ($validasi->fails()) {
            toast('Gagal menambahkan kategori vaksin', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kategoriId = Kategori::whereIn('uuid', $request->kategori)->pluck('id');
        
        foreach ($kategoriId as $id) {
            KategoriVaksin::create([
                'vaksin_id' => $vaksin->id,
                'kategori_id' => $id
            ]);
        }

        toast('Berhasil menambahkan kategori vaksin', 'success');
        return redirect()->back();
    }

    public function destroyKategoriVaksin(KategoriVaksin $kategoriVaksin)
    {
        $kategoriVaksin->delete();

        toast('Berhasil menghapus kategori vaksin', 'success');
        return redirect()->back();
    }

    // END KATEGORI VAKSIN
}
