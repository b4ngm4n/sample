<?php

namespace Database\Seeders;

use App\Models\Bulan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bulans = [
            ['bulan' => 'Januari', 'slug' => 'januari'],
            ['bulan' => 'Februari', 'slug' => 'februari'],
            ['bulan' => 'Maret', 'slug' => 'maret'],
            ['bulan' => 'April', 'slug' => 'april'],
            ['bulan' => 'Mei', 'slug' => 'mei'],
            ['bulan' => 'Juni', 'slug' => 'juni'],
            ['bulan' => 'Juli', 'slug' => 'juli'],
            ['bulan' => 'Agustus', 'slug' => 'agustus'],
            ['bulan' => 'September', 'slug' => 'september'],
            ['bulan' => 'Oktober', 'slug' => 'oktober'],
            ['bulan' => 'November', 'slug' => 'november'],
            ['bulan' => 'Desember', 'slug' => 'desember'],
        ];

        foreach ($bulans as $bulan) {
            Bulan::create($bulan);
        }
    }
}
