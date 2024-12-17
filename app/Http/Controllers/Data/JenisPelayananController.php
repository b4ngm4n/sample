<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\JenisPelayanan;
use Illuminate\Http\Request;

class JenisPelayananController extends Controller
{
    public function index()
    {
        $jenisPelayanans = JenisPelayanan::all();
        return view('dashboard.page.jenis-pelayanan.index', compact('jenisPelayanans'));
    }

    public function create()
    {
        return view('dashboard.page.jenis-pelayanan.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
    
    public function edit(JenisPelayanan $jenisPelayanan)
    {
        return view('dashboard.page.jenis-pelayanan.edit', compact('jenisPelayanan'));
    }

    public function update(Request $request, JenisPelayanan $jenisPelayanan)
    {
        dd($request->all());
    }

    public function destroy(JenisPelayanan $jenisPelayanan)
    {
        $jenisPelayanan->delete();

        toast('Jenis Pelayanan berhasil dihapus', 'success');
        return redirect()->back();
    }
}
