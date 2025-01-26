<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'nama_kategori' => 'Imunisasi Dasar Lengkap 1',
                'jenis_kategori' => 'imunisasi',
                'status_kategori' => 'idl',
                'keterangan' => 'Imunisasi Dasar Lengkap 1',
            ],
            [
                'nama_kategori' => 'Imunisasi Baduta Lengkap 1',
                'jenis_kategori' => 'imunisasi',
                'status_kategori' => 'ibl',
                'keterangan' => 'Imuinasasi Bayi Dua Tahun Lengkap',
            ],
            [
                'nama_kategori' => 'Imunisasi TT WUS',
                'jenis_kategori' => 'imunisasi',
                'status_kategori' => 'wus',
                'keterangan' => 'Imunisasi Tetanus Toksoid (TT) pada WUS',
            ],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create([
                'nama_kategori' => $kategori['nama_kategori'],
                'slug' => Str::slug($kategori['nama_kategori']),
                'jenis_kategori' => $kategori['jenis_kategori'],
                'status_kategori' => $kategori['status_kategori'],
                'keterangan' => $kategori['keterangan'],
            ]);
        }
    }
}
