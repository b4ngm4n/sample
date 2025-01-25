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
        // 1. Tambahkan wilayah kerja dan alamat
        // $data = [
        //     'nama_wilayah' => 'Kota Gorontalo',
        //     'jenis_wilayah' => 'kabkot',
        //     'slug' => Str::slug('Kota Gorontalo' . '-' . '7571'),
        //     'kode_wilayah' => '7571',
        //     'jalan' => 'Jl. K.H Adam Zakaria Testing',
        //     'rt' => '002',
        //     'rw' => '003',
        //     'kode_pos' => '96121'
        // ];

        // $dataWilayah = Wilayah::create([
        //     'nama_wilayah' => $data['nama_wilayah'],
        //     'jenis_wilayah' => $data['jenis_wilayah'],
        //     'slug' => $data['slug'],
        //     'kode_wilayah' => $data['kode_wilayah'],
        // ]);

        // $parent = Wilayah::find(2)->id;

        // $dataWilayah = Wilayah::find(3);
        // $dataWilayah->parent()->associate($parent)->save();

        // $dataWilayah->alamat()->create([
        //     'jalan' => $data['jalan'],
        //     'slug' => Str::slug($data['jalan']. '-' . $data['rt'] . '-' .  $data['rw'] . '-' . $data['kode_pos']),
        //     'rt' => $data['rt'],
        //     'rw' => $data['rw'],
        //     'kode_pos' => $data['kode_pos']
        // ]);


        // END 1

        // // 2. Tambahkan Faskes

        // $data = [
        //     'nama_faskes' => 'Dinas Kesehatan Kota Gorontalo',
        //     'slug' => Str::slug('Dinas Kesehatan Kota Gorontalo' . '-' . '7571'),
        //     'kode_faskes' => '7571',
        //     'status_faskes' => 'aktif',
        //     'jenis_faskes' => 'dinkes-kabkot',
        //     'wilayah_id' => 3,
        //     'jalan' => 'Jl. K.H Adam Zakaria Testing',
        //     'rt' => '002',
        //     'rw' => '003',
        //     'kode_pos' => '96122'
        // ];

        // $dataFaskes = Faskes::create([
        //     'nama_faskes' => $data['nama_faskes'],
        //     'slug' => $data['slug'],
        //     'kode_faskes' =>  $data['kode_faskes'],
        //     'status_faskes' => $data['status_faskes'],
        //     'jenis_faskes' => $data['jenis_faskes'],
        //     'wilayah_id' => $data['wilayah_id'],
        // ]);

        // $dataFaskes->alamat()->create([
        //     'jalan' => $data['jalan'],
        //     'slug' => Str::slug($data['jalan'] . '-' . $data['rt'] . '-' .  $data['rw'] . '-' . $data['kode_pos']),
        //     'rt' => $data['rt'],
        //     'rw' => $data['rw'],
        //     'kode_pos' => $data['kode_pos']
        // ]);

        // END 2

        // 3. Wilayah Kerja

        // $data = [
        //     [
        //         'nama_faskes' => 'Pilolodaa',
        //         'kode_faskes' => '1071177',
        //         'status_faskes' => 'aktif',
        //         'jenis_faskes' => 'puskesmas',
        //         'jalan' => 'Jl. Usman Isa No. 668',
        //     ]
        // ];

        // foreach ($data as $wilayah) {
        //     $wilayah = Wilayah::create([
        //         'nama_wilayah' => $wilayah['nama_wilayah'],
        //         'kode_wilayah' => $wilayah['kode_wilayah'],
        //         'jenis_wilayah' => $wilayah['jenis_wilayah'],
        //         'slug' => Str::slug($wilayah['nama_wilayah'] . '-' . $wilayah['kode_wilayah']),
        //     ]);

        //     $wilayah->parent()->associate(3)->save();
        // }


        // dd($data);

        // END 3

        // dd($this->seed(WilayahSeeder::class));

        // $wilayahs = Wilayah::with('faskes', 'alamats', 'wilayahKerja')->get()->toTree();
        $faskes = Faskes::with('alamat', 'alamat.wilayah', 'alamat.wilayah.parent')->get()->toTree();
        // $wilayahs = Faskes::with('wilayahKerja', 'alamat')->get()->toTree();

        return response()->json($faskes);

        // $wilayahs = Wilayah::withDepth()->orderBy('depth')->get();

        // return view('dashboard.page.wilayah.index', compact('wilayahs'));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(Wilayah $wilayah) {}

    public function edit(Wilayah $wilayah) {}


    public function update(Request $request, Wilayah $wilayah) {}

    public function destroy(Wilayah $wilayah) {}
}
