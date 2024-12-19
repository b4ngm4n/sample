<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\JenisPelayanan;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VaksinController extends Controller
{
    public function index()
    {
        $vaksins = Vaksin::with('jenisPelayanan')->get();
        return view('dashboard.page.vaksin.index', compact('vaksins'));
    }

    public function create()
    {
        $jenisPelayanans = JenisPelayanan::pluck('uuid', 'nama_pelayanan');

        return view('dashboard.page.vaksin.create', compact('jenisPelayanans'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'jenis_pelayanan' => 'required|exists:jenis_pelayanans,uuid',
            'nama_vaksin' => 'required',
            'nomor_batch' => 'required|unique:vaksins,nomor_batch',
            'tanggal_kedaluwarsa' => 'required|date',
        ], [
            'jenis_pelayanan.exists' => 'Jenis Pelayanan tidak ditemukan',
            'jenis_pelayanan.required' => 'Jenis Pelayanan harus diisi',
            'nama_vaksin.required' => 'Nama Vaksin harus diisi',
            'nomor_batch.required' => 'Nomor Batch harus diisi',
            'nomor_batch.unique' => 'Nomor Batch sudah ada',
            'tanggal_kedaluwarsa.required' => 'Tanggal Kedaluwarsa harus diisi',
            'tanggal_kedaluwarsa.date' => 'Tanggal Kedaluwarsa harus berupa tanggal',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $jenisPelayanan = JenisPelayanan::where('uuid', $request->jenis_pelayanan)->first()->id;

        $vaksin = new Vaksin();
        $vaksin->nama_vaksin = $request->nama_vaksin;
        $vaksin->nomor_batch = $request->nomor_batch;
        $vaksin->slug = Str::slug($request->nama_vaksin . '-' . $request->nomor_batch);
        $vaksin->tanggal_kedaluwarsa = $request->tanggal_kedaluwarsa;
        $vaksin->jenis_pelayanan_id = $jenisPelayanan;
        $vaksin->produsen = $request->produsen;
        $vaksin->save();

        toast('Vaksin berhasil ditambahkan', 'success');

        return redirect()->route('vaksin.index');
    }

    public function show(Vaksin $vaksin)
    {
        return view('dashboard.page.vaksin.show', compact('vaksin'));
    }

    public function edit(Vaksin $vaksin)
    {
        $jenisPelayanans = JenisPelayanan::all();

        return view('dashboard.page.vaksin.edit', compact('vaksin', 'jenisPelayanans'));
    }

    public function update(Request $request, Vaksin $vaksin)
    {
        $validasi = Validator::make($request->all(), [
            'jenis_pelayanan' => 'required|exists:jenis_pelayanans,uuid',
            'nama_vaksin' => 'required',
            'nomor_batch' => 'required|unique:vaksins,nomor_batch',
            'tanggal_kedaluwarsa' => 'required|date',
        ], [
            'jenis_pelayanan.exists' => 'Jenis Pelayanan tidak ditemukan',
            'jenis_pelayanan.required' => 'Jenis Pelayanan harus diisi',
            'nama_vaksin.required' => 'Nama Vaksin harus diisi',
            'nomor_batch.required' => 'Nomor Batch harus diisi',
            'nomor_batch.unique' => 'Nomor Batch sudah ada',
            'tanggal_kedaluwarsa.required' => 'Tanggal Kedaluwarsa harus diisi',
            'tanggal_kedaluwarsa.date' => 'Tanggal Kedaluwarsa harus berupa tanggal',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $jenisPelayanan = JenisPelayanan::where('uuid', $request->jenis_pelayanan)->first()->id;

        $vaksin->update([
            'nama_vaksin' => $request->nama_vaksin,
            'nomor_batch' => $request->nomor_batch,
            'slug' => Str::slug($request->nama_vaksin . '-' . $request->nomor_batch),
            'tanggal_kedaluwarsa' => $request->tanggal_kedaluwarsa,
            'produsen' => $request->produsen,
            'jenis_pelayanan_id' => $jenisPelayanan,
        ]);
    }

    public function destroy(Vaksin $vaksin)
    {
        if ($vaksin->imunisasis->isEmpty()) {
            $vaksin->delete();
            toast('Vaksin berhasil dihapus', 'success');
            return redirect()->back();
        }

        toast('Gagal hapus, Terdapat data imunisasi', 'error');
        return redirect()->back();
    }
}
