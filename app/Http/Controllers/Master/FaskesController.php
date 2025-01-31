<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Faskes;
use App\Models\Wilayah;
use App\Models\WilayahKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FaskesController extends Controller
{
    public function index()
    {
        $dataFaskes = Faskes::with('alamat.wilayah.parent')->withCount('wilayahKerja')->withDepth()->orderBy('jenis_faskes')->get();
        
        return view('dashboard.page.faskes.index', compact('dataFaskes'));
    }

    public function create()
    {
        $faskes = Faskes::all();
        return view('dashboard.page.faskes.create', compact('faskes'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_faskes' => 'required',
            'kode_faskes' => 'required',
            'status_faskes' => 'required',
            'jenis_faskes' => 'required',
            'wilayah' => 'required',
        ], [
            'nama_faskes.required' => 'Nama Faskes harus diisi',
            'kode_faskes.required' => 'Kode Faskes harus diisi',
            'status_faskes.required' => 'Status Faskes harus diisi',
            'jenis_faskes.required' => 'Jenis Faskes harus diisi',
            'wilayah.required' => 'Wilayah harus diisi',
        ]);

        if ($request->fails) {
            toast('Gagal menambahkan faskes', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $faskes = new Faskes();
        $faskes->nama_faskes = $request->nama_faskes;
        $faskes->kode_faskes = $request->kode_faskes;
        $faskes->slug = Str::slug($request->nama_faskes . '-'. $request->kode_faskes);
        $faskes->status_faskes = $request->status_faskes;
        $faskes->jenis_faskes = $request->jenis_faskes;
        $faskes->save();

        if ($faskes->jalan) {
            $faskes->alamat()->create([
                'jalan' => $request->jalan,
                'slug' => Str::slug($request->jalan),
                'rt' => $request->rt ?? '',
                'rw' => $request->rw ?? '',
                'kode_pos' => $request->kode_pos ?? '',
                'wilayah_id' => $request->wilayah ?? '',
            ]);
        }

        toast('Berhasil simpan data faskes', 'success');
        return redirect()->route('faskes.index');
    }

    public function show(Faskes $faskes)
    {
        $wilayahs = Wilayah::pluck('uuid', 'nama_wilayah');

        return view('dashboard.page.faskes.show', compact('faskes', 'wilayahs'));
    }

    public function edit(Faskes $faskes)
    {
        $dataFaskes = Faskes::all();
        return view('dashboard.page.faskes.edit', compact('faskes', 'dataFaskes'));
    }

    public function update(Request $request, Faskes $faskes)
    {
        $validasi = Validator::make($request->all(), [
            'nama_faskes' => 'required',
            'kode_faskes' => 'required',
            'status_faskes' => 'required',
            'jenis_faskes' => 'required',
            'wilayah' => 'required',
        ], [
            'nama_faskes.required' => 'Nama Faskes harus diisi',
            'kode_faskes.required' => 'Kode Faskes harus diisi',
            'status_faskes.required' => 'Status Faskes harus diisi',
            'jenis_faskes.required' => 'Jenis Faskes harus diisi',
            'wilayah.required' => 'Wilayah harus diisi',
        ]);

        if ($request->fails) {
            toast('Gagal ubah faskes', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $faskes->update([
            'nama_faskes' => $request->nama_faskes,
            'kode_faskes' => $request->kode_faskes,
            'slug' => Str::slug($request->nama_faskes . '-'. $request->kode_faskes),
            'status_faskes' => $request->status_faskes,
            'jenis_faskes' => $request->jenis_faskes,
        ]);

        $faskes->alamat()->update([
            'jalan' => $request->jalan,
            'slug' => Str::slug($request->jalan),
            'rt' => $request->rt ?? '',
            'rw' => $request->rw ?? '',
            'kode_pos' => $request->kode_pos ?? '',
            'wilayah_id' => $request->wilayah ?? '',
        ]);

        toast('Berhasil ubah data faskes', 'success');
        return redirect()->route('faskes.index');
    }

    public function wilayahKerja(Request $request, Faskes $faskes)
    {
        $validasi = Validator::make($request->all(), [
            'wilayah.*' => 'required|exists:wilayahs,uuid'
        ], [
            'wilayah.*.exists' => 'Wilayah tidak ditemukan',
            'wilayah.*.required' => 'Silahkan pilih wilayah kerja'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $wilayahId = Wilayah::whereIn('uuid', $request->wilayah)->pluck('id');

        foreach ($wilayahId as $id) {
            WilayahKerja::create([
                'faskes_id' => $faskes->id,
                'wilayah_id' => $id
            ]);
        }

        toast('Wilayah Kerja berhasil disimpan', 'success');

        return redirect()->back();
    }

    public function destroyWilayahKerja(Faskes $faskes, Wilayah $wilayah)
    {
        $wilayahKerja = WilayahKerja::where('faskes_id', $faskes->id)->where('wilayah_id', $wilayah->id)->first();
       
        if (!$wilayahKerja) {
            toast('Wilayah Kerja tidak ditemukan', 'error');
            return redirect()->back();
        }

        $wilayahKerja->delete();

        toast('Wilayah Kerja berhasil dihapus', 'success');
        return redirect()->back();
    }
}
