<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Faskes;
use App\Models\Wilayah;
use Database\Seeders\WilayahSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WilayahController extends Controller
{
    public function index()
    {
        $wilayahs = Wilayah::withDepth()->orderBy('jenis_wilayah')->get();

        return view('dashboard.page.wilayah.index', compact('wilayahs'));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(Wilayah $wilayah) {}

    public function edit(Wilayah $wilayah) {}


    public function update(Request $request, Wilayah $wilayah) {}

    public function destroy(Wilayah $wilayah) {}
}
