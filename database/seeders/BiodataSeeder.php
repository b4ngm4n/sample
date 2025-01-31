<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Biodata::create([
            'nik' => '7571000000000001',
            'nama_lengkap' => 'Salman Mustapa',
            'nama_depan' => 'Salman',
            'nama_belakang' => 'Mustpaa',
            'tanggal_lahir' => date(now()),
            'tempat_lahir' => 'Gorontalo',
            'no_hp' => '082154488769',
            'agama' => 'Islam',
            'slug' => Str::slug('Salman Mustapa')
        ]);
    }
}
