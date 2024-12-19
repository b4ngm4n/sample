<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\JenisPelayanan;
use App\Models\PosPelayanan;
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
        $jenisPelayanans = JenisPelayanan::pluck('uuid', 'nama_pelayanan');

        return view('dashboard.page.pos-pelayanan.create', compact('jenisPelayanans'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'jenis_pelayanan' => 'required|exists:jenis_pelayanans,uuid',
            'nama_posPelayanan' => 'required',
            'nomor_batch' => 'required|unique:posPelayanans,nomor_batch',
            'tanggal_kedaluwarsa' => 'required|date',
        ], [
            'jenis_pelayanan.exists' => 'Jenis Pelayanan tidak ditemukan',
            'jenis_pelayanan.required' => 'Jenis Pelayanan harus diisi',
            'nama_pos-pelayanan.required' => 'Nama posPelayanan harus diisi',
            'nomor_batch.required' => 'Nomor Batch harus diisi',
            'nomor_batch.unique' => 'Nomor Batch sudah ada',
            'tanggal_kedaluwarsa.required' => 'Tanggal Kedaluwarsa harus diisi',
            'tanggal_kedaluwarsa.date' => 'Tanggal Kedaluwarsa harus berupa tanggal',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $jenisPelayanan = JenisPelayanan::where('uuid', $request->jenis_pelayanan)->first()->id;

        $posPelayanan = new posPelayanan();
        $posPelayanan->nama_posPelayanan = $request->nama_posPelayanan;
        $posPelayanan->nomor_batch = $request->nomor_batch;
        $posPelayanan->slug = Str::slug($request->nama_posPelayanan . '-' . $request->nomor_batch);
        $posPelayanan->tanggal_kedaluwarsa = $request->tanggal_kedaluwarsa;
        $posPelayanan->jenis_pelayanan_id = $jenisPelayanan;
        $posPelayanan->produsen = $request->produsen;
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
        $jenisPelayanans = JenisPelayanan::pluck('uuid', 'nama_pelayanan');

        return view('dashboard.page.pos-pelayanan.edit', compact('posPelayanan', 'jenisPelayanans'));
    }

    public function update(Request $request, posPelayanan $posPelayanan)
    {
        $validasi = Validator::make($request->all(), [
            'jenis_pelayanan' => 'required|exists:jenis_pelayanans,uuid',
            'nama_posPelayanan' => 'required',
            'nomor_batch' => 'required|unique:posPelayanans,nomor_batch, ' . $posPelayanan->id,
            'tanggal_kedaluwarsa' => 'required|date',
        ], [
            'jenis_pelayanan.exists' => 'Jenis Pelayanan tidak ditemukan',
            'jenis_pelayanan.required' => 'Jenis Pelayanan harus diisi',
            'nama_pos-pelayanan.required' => 'Nama posPelayanan harus diisi',
            'nomor_batch.required' => 'Nomor Batch harus diisi',
            'nomor_batch.unique' => 'Nomor Batch sudah ada',
            'tanggal_kedaluwarsa.required' => 'Tanggal Kedaluwarsa harus diisi',
            'tanggal_kedaluwarsa.date' => 'Tanggal Kedaluwarsa harus berupa tanggal',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $jenisPelayanan = JenisPelayanan::where('uuid', $request->jenis_pelayanan)->first()->id;

        $posPelayanan->update([
            'nama_posPelayanan' => $request->nama_posPelayanan,
            'nomor_batch' => $request->nomor_batch,
            'slug' => Str::slug($request->nama_posPelayanan . '-' . $request->nomor_batch),
            'tanggal_kedaluwarsa' => $request->tanggal_kedaluwarsa,
            'produsen' => $request->produsen,
            'jenis_pelayanan_id' => $jenisPelayanan,
        ]);

        toast('posPelayanan berhasil diubah', 'success');

        return redirect()->route('pos-pelayanan.index');
    }

    public function destroy(posPelayanan $posPelayanan)
    {
        if ($posPelayanan->imunisasis->isEmpty()) {
            $posPelayanan->delete();
            toast('posPelayanan berhasil dihapus', 'success');
            return redirect()->back();
        }

        toast('Gagal hapus, Terdapat data imunisasi', 'error');
        return redirect()->back();
    }
}
