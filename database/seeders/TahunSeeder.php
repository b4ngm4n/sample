<?php

namespace Database\Seeders;

use App\Models\Tahun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahuns = [
            ['tahun' => '2023'],
            ['tahun' => '2024'],
            ['tahun' => '2025'],
        ];

        foreach ($tahuns as $tahun) {
            Tahun::create($tahun);
        }
    }
}
