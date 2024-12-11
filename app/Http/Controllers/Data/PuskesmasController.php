<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PuskesmasController extends Controller
{
    public function index()
    {
        $listpuskes =  Puskesmas::all();
        return view('dashboard.page.puskesmas.index', compact('listpuskes'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan')->get();
        return view('dashboard.page.puskesmas.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kecamatan' => 'required',
            'kode_puskesmas' => 'required|unique:puskesmas,kode_puskesmas',
            'nama_puskesmas' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $kecamatan = Kecamatan::where('slug', $request->kecamatan)->first();

        $puskesmas = new Puskesmas();
        $puskesmas->kecamatan_id = $kecamatan->id;
        $puskesmas->nama_puskesmas = $request->nama_puskesmas;
        $puskesmas->slug = Str::slug($request->nama_puskesmas);
        $puskesmas->kode_puskesmas = $request->kode_puskesmas;
        $puskesmas->save();

        return redirect()->route('puskesmas.index');
    }

    public function show(Puskesmas $puskesmas)
    {
        return view('dashboard.page.puskesmas.show', compact('puskesmas'));
    }

    public function edit(Puskesmas $puskesmas)
    {
        return view('dashboard.page.puskesmas.show', compact('puskesmas'));
    }

    public function update(Request $request, puskesmas $puskesmas)
    {
        $validasi = Validator::make($request->all(), [
            'nama_puskesmas' => 'required|unique:puskesmas, nama_puskesmas',
            'kode_puskesmas' => 'required|unique:puskesmas,kode_puskesmas'
        ]);
        
        if ($validasi->fails())
        {

        }
        
        return redirect()->route('puskesmas.index');
    }

    public function destroy(Puskesmas $puskesmas)
    {
        $puskesmas->delete();
        return redirect()->route('puskesmas.index');
    }

}
