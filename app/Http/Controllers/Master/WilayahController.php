<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Faskes;
use App\Models\Wilayah;
use Database\Seeders\WilayahSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WilayahController extends Controller
{
    public function index()
    {
        $wilayahs = Wilayah::withDepth()->orderBy('jenis_wilayah')->get();

        return view('dashboard.page.wilayah.index', compact('wilayahs'));
    }


    public function create() 
    {
        $wilayahs = Wilayah::withDepth()->orderBy('jenis_wilayah')->get();
        return view('dashboard.page.wilayah.create', compact('wilayahs'));
    }

    public function store(Request $request) 
    {
        $validasi = Validator::make($request->all(), [
            'nama_wilayah' => 'required',
            'kode_wilayah' => 'required',
            'jenis_wilayah' => 'required'
        ], [
            'nama_wilayah.required' => 'Nama Wilayah harus diisi',
            'kode_wilayah.required' => 'Kode Wilayah harus diisi',
            'jenis_wilayah' => 'Jenis Wilayah harus diisi',
        ]);

        if ($validasi->fails()) {
            toast('Gagal menambahkan data', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $wilayah = new Wilayah();
        $wilayah->nama_wilayah = $request->nama_wilayah;
        $wilayah->kode_wilayah = $request->kode_wilayah;
        $wilayah->jenis_wilayah = $request->jenis_wilayah;
        $wilayah->slug = Str::slug($request->nama_wilayah . '-' . $request->kode_wilayah);
        $wilayah->save();

        if ($request->tingkat_wilayah) {
            $parentId = Wilayah::where('uuid', $request->tingkat_wilayah)->first()->id;
            $wilayah->parent()->associate($parentId)->save();
        }

        toast('Berhasil menambahkan wilayah', 'success');
        return redirect()->route('wilayah.index');
    }

    public function show(Wilayah $wilayah) 
    {
        // $faskes = $wilayah->with('faskes.children')->first();
        // dd($faskes);
        // return json_decode($wilayah->with('faskes'));
        // return response()->json(Faskes::withDepth()->get());
        // return response()->json();
        $datafaskes = Faskes::with('children')->where('wilayah_id', $wilayah->id)->get();
        // dd($datafaskes);
        
        return view('dashboard.page.wilayah.show', compact('wilayah', 'datafaskes'));
    }

    public function edit(Wilayah $wilayah) 
    {
        $wilayahs = Wilayah::withDepth()->orderBy('jenis_wilayah')->get();
        return view('dashboard.page.wilayah.edit', compact('wilayah','wilayahs'));
    }


    public function update(Request $request, Wilayah $wilayah)
    {
        $validasi = Validator::make($request->all(), [
            'nama_wilayah' => 'required',
            'kode_wilayah' => 'required',
            'jenis_wilayah' => 'required'
        ], [
            'nama_wilayah.required' => 'Nama Wilayah harus diisi',
            'kode_wilayah.required' => 'Kode Wilayah harus diisi',
            'jenis_wilayah' => 'Jenis Wilayah harus diisi',
        ]);

        if ($validasi->fails()) {
            toast('Gagal mengubah data wilayah', 'error');
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $wilayah->update([
            'nama_wilayah' => $request->nama_wilayah,
            'kode_wilayah' => $request->kode_wilayah,
            'jenis_wilayah' => $request->jenis_wilayah,
            'slug' => Str::slug($request->nama_wilayah . '-' . $request->kode_wilayah)
        ]);

        if ($request->tingkat_wilayah) {
            $parentId = Wilayah::where('uuid', $request->tingkat_wilayah)->first()->id;
            $wilayah->parent()->associate($parentId)->save();
        }

        toast('Berhasil mengubah wilayah', 'success');
        return redirect()->route('wilayah.index');
    }

    public function destroy(Wilayah $wilayah) 
    {
        $wilayah->delete();

        toast('Berhasil menghapus wilayah', 'success');
        return redirect()->route('wilayah.index');
    }
}
