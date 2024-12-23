<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\JenisPelayanan;
use App\Models\Kelurahan;
use App\Models\PosPelayanan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PosPelayananController extends Controller
{
    public function index()
    {
        $posPelayanans = PosPelayanan::with('jenisPelayanan', 'puskesmas', 'kelurahan')->get();
        return view('dashboard.page.pos-pelayanan.index', compact('posPelayanans'));
    }

    public function create()
    {
        $puskesmas = Puskesmas::pluck('uuid', 'nama_puskesmas');
        $kelurahans = Kelurahan::pluck('uuid', 'nama_kelurahan');
        $jenisPelayanans = JenisPelayanan::pluck('uuid', 'nama_pelayanan');

        return view('dashboard.page.pos-pelayanan.create', compact([
            'jenisPelayanans',
            'puskesmas',
            'kelurahans'
        ]));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'puskesmas' => 'required|exists:puskesmas,uuid',
            'kelurahan' => 'required|exists:kelurahans,uuid',
            'jenis_pelayanan' => 'required|exists:jenis_pelayanans,uuid',
            'nama_pos' => 'required',

        ], [
            'puskesmas.exists' => 'Puskesmas tidak ditemukan',
            'puskesmas.required' => 'Puskesmas harus diisi',
            'kelurahan.exists' => 'Kelurahan tidak ditemukan',
            'kelurahan.required' => 'Kelurahan harus diisi',
            'jenis_pelayanan.exists' => 'Jenis Pelayanan tidak ditemukan',
            'jenis_pelayanan.required' => 'Jenis Pelayanan harus diisi',
            'nama_pos.required' => 'Nama posPelayanan harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $puskesmas = Puskesmas::where('uuid', $request->puskesmas)->first()->id;
        $kelurahan = Kelurahan::where('uuid', $request->kelurahan)->first()->id;
        $jenisPelayanan = JenisPelayanan::where('uuid', $request->jenis_pelayanan)->first()->id;

        $cekSlug = PosPelayanan::pluck('slug')->contains(Str::slug($request->nama_pos . '-' . $puskesmas . '-' . $kelurahan . '-' . $jenisPelayanan));

        if ($cekSlug) {
            toast('Pos Pelayanan sudah ada', 'error');
            return redirect()->back()->withInput();
        }

        $posPelayanan = new PosPelayanan();
        $posPelayanan->puskesmas_id = $puskesmas;
        $posPelayanan->kelurahan_id = $kelurahan;
        $posPelayanan->jenis_pelayanan_id = $jenisPelayanan;
        $posPelayanan->nama_pos_pelayanan = Str::upper($request->nama_pos);
        $posPelayanan->slug = Str::slug($request->nama_pos . '-' . $puskesmas . '-' . $kelurahan . '-' . $jenisPelayanan);
        $posPelayanan->alamat = $request->alamat ?? null;
        $posPelayanan->save();

        toast('posPelayanan berhasil ditambahkan', 'success');

        return redirect()->route('pos-pelayanan.index');
    }

    public function show(posPelayanan $posPelayanan)
    {
        return view('dashboard.page.pos-pelayanan.show', compact('posPelayanan'));
    }

    public function edit(posPelayanan $posPelayanan)
    {
        $puskesmas = Puskesmas::pluck('uuid', 'nama_puskesmas');
        $kelurahans = Kelurahan::pluck('uuid', 'nama_kelurahan');
        $jenisPelayanans = JenisPelayanan::pluck('uuid', 'nama_pelayanan');

        return view('dashboard.page.pos-pelayanan.edit', compact([
            'posPelayanan',
            'jenisPelayanans',
            'puskesmas',
            'kelurahans'
        ]));
    }

    public function update(Request $request, posPelayanan $posPelayanan)
    {
        $validasi = Validator::make($request->all(), [
            'puskesmas' => 'required|exists:puskesmas,uuid',
            'kelurahan' => 'required|exists:kelurahans,uuid',
            'jenis_pelayanan' => 'required|exists:jenis_pelayanans,uuid',
            'nama_pos' => 'required',

        ], [
            'puskesmas.exists' => 'Puskesmas tidak ditemukan',
            'puskesmas.required' => 'Puskesmas harus diisi',
            'kelurahan.exists' => 'Kelurahan tidak ditemukan',
            'kelurahan.required' => 'Kelurahan harus diisi',
            'jenis_pelayanan.exists' => 'Jenis Pelayanan tidak ditemukan',
            'jenis_pelayanan.required' => 'Jenis Pelayanan harus diisi',
            'nama_pos.required' => 'Nama posPelayanan harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        
        $puskesmas = Puskesmas::where('uuid', $request->puskesmas)->first()->id;
        $kelurahan = Kelurahan::where('uuid', $request->kelurahan)->first()->id;
        $jenisPelayanan = JenisPelayanan::where('uuid', $request->jenis_pelayanan)->first()->id;
        
        $cekSlug = PosPelayanan::where('uuid', '!=', $posPelayanan->uuid)->pluck('slug')->contains(Str::slug($request->nama_pos . '-' . $puskesmas . '-' . $kelurahan . '-' . $jenisPelayanan));

        if ($cekSlug) {
            toast('Pos Pelayanan sudah ada', 'error');
            return redirect()->back()->withInput();
        }

        $posPelayanan->update([
            'puskesmas_id' => $puskesmas,
            'kelurahan_id' => $kelurahan,
            'jenis_pelayanan_id' => $jenisPelayanan,
            'nama_pos_pelayanan' => Str::upper($request->nama_pos),
            'slug' => Str::slug($request->nama_pos . '-' . $puskesmas . '-' . $kelurahan . '-' . $jenisPelayanan),
            'alamat' => $request->alamat ?? null,
        ]);

        toast('posPelayanan berhasil diubah', 'success');

        return redirect()->route('pos-pelayanan.index');
    }

    public function destroy(posPelayanan $posPelayanan)
    {
        if ($posPelayanan->imunisasis->isEmpty()) {
            $posPelayanan->delete();
            toast('Pos Pelayanan berhasil dihapus', 'success');
            return redirect()->back();
        }

        toast('Gagal hapus, Terdapat data imunisasi', 'error');
        return redirect()->back();
    }
}
