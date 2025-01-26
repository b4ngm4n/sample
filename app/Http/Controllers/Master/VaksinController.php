<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Vaksin;
use Illuminate\Http\Request;

class VaksinController extends Controller
{
    public function index()
    {
        $vaksins = Vaksin::all();
        return view('dashboard.page.vaksin.index', compact('vaksins'));
    }

    public function create()
    {
        return view('dashboard.page.vaksin.create');
    }

    public function store(Request $request)
    {
        $vaksin = new Vaksin();
        $vaksin->name = $request->name;
        $vaksin->save();
        return redirect()->route('vaksin.index');
    }

    public function show(Vaksin $vaksin)
    {
        return view('dashboard.page.vaksin.show', compact('vaksin'));
    }

    public function edit(Vaksin $vaksin)
    {
        return view('dashboard.page.vaksin.edit', compact('vaksin'));
    }

    public function update(Request $request, Vaksin $vaksin)
    {

    }

    public function destroy(Vaksin $vaksin)
    {
        $vaksin->delete();
        
        toast('Berhasil menghapus vaksin', 'success');
        return redirect()->back();
    }
}
