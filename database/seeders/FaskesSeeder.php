<?php

namespace Database\Seeders;

use App\Models\Faskes;
use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FaskesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $kecamatan = Wilayah::where('jenis_wilayah', 'kecamatan')->get()->toTree();

        $datafaskes = [
            [
                'nama_faskes' => 'Dinas Kesehatan Provinsi Gorontalo',
                'kode_faskes' => '75',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'dinkes-prov',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'provinsi')
                                    ->where('slug', 'like', '%gorontalo%')->first()->id,
                'jalan' => 'Jl. Pangeran Hidayat',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%paguyaman%')->first()->id,
                'kode_pos' => '96128',
            ],
            [
                'nama_faskes' => 'Dinas Kesehatan Kota Gorontalo',
                'kode_faskes' => '7571',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'dinkes-kabkot',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kabkot')
                                    ->where('slug', 'like', '%kota-gorontalo%')->first()->id,
                'jalan' => 'Jl. Jamaludin Malik',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%limba-u-dua%')->first()->id,
                'kode_pos' => '96138',
            ],
            [
                'nama_faskes' => 'Puskesmas Kota Utara',
                'kode_faskes' => '1071184',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%kota-utara%')->first()->id,
                'jalan' => 'Jl. Yusuf Dali',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%wongkaditi-barat%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Pilolodaa',
                'kode_faskes' => '1071177',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%kota-barat%')->first()->id,
                'jalan' => 'Jl. Usman Isa',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%pilolodaa%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Kota Barat',
                'kode_faskes' => '1071178',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%kota-barat%')->first()->id,
                'jalan' => 'Jl. Rambutan',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%buladu%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Dungingi',
                'kode_faskes' => '1071179',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%dungingi%')->first()->id,
                'jalan' => 'Jl. Palma',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%huangobotu%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Kota Selatan',
                'kode_faskes' => '1071180',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%kota-selatan%')->first()->id,
                'jalan' => 'Jl. Mohamad Yamin',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%limba-b%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Kota Timur',
                'kode_faskes' => '1071181',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%kota-timur%')->first()->id,
                'jalan' => 'Jl. Kutai',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%tamalate%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Hulonthalangi',
                'kode_faskes' => '1071182',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%hulonthalangi%')->first()->id,
                'jalan' => 'Jl. Sasuit Tubun',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%tenda%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Dumbo Raya',
                'kode_faskes' => '1071183',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%dumbo-raya%')->first()->id,
                'jalan' => 'Jl. Mayor Dullah',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%talumolo%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Kota Tengah',
                'kode_faskes' => '1071185',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%kota-tengah%')->first()->id,
                'jalan' => 'Jl. Sulawesi',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%dulalowo%')->first()->id,
            ],
            [
                'nama_faskes' => 'Puskesmas Sipatana',
                'kode_faskes' => '1071186',
                'status_faskes' => 'aktif',
                'jenis_faskes' => 'puskesmas',
                'wilayah_id' => Wilayah::where('jenis_wilayah', 'kecamatan')
                                    ->where('slug', 'like', '%sipatana%')->first()->id,
                'jalan' => 'Jl. Tondano',
                'wilayah_jalan' => Wilayah::where('jenis_wilayah', 'kelurahan')
                                    ->where('slug', 'like', '%bulotadaa-barat%')->first()->id,
            ],
        ];

        $dataPuskes = [];
        $dataDinkesProv = [];
        $dataDinkesKabkot = [];

        foreach ($datafaskes as $item) {
            if ($item['jenis_faskes'] == 'dinkes-prov') {
                $dataDinkesProv[] = $item;
            }
            if ($item['jenis_faskes'] == 'dinkes-kabkot') {
                $dataDinkesKabkot[] = $item;
            }
            if ($item['jenis_faskes'] == 'puskesmas') {
                $dataPuskes[] = $item;
            }
        }

        foreach ($dataDinkesProv as $itemProv) {
            $dinkesProv = Faskes::create([
                'nama_faskes' => $itemProv['nama_faskes'],
                'slug' => Str::slug($itemProv['nama_faskes']. '-' . $itemProv['kode_faskes']),
                'kode_faskes' => $itemProv['kode_faskes'],
                'status_faskes' => $itemProv['status_faskes'],
                'jenis_faskes' => $itemProv['jenis_faskes'],
                'wilayah_id' => $itemProv['wilayah_id'],
            ]);

            $dinkesProv->alamat()->create([
                'jalan' => $itemProv['jalan'],
                'slug' => Str::slug($itemProv['jalan'], '-' . $itemProv['kode_pos']),
                'wilayah_id' => $itemProv['wilayah_jalan'],
                'kode_pos' => $itemProv['kode_pos'] ?? '',
            ]);

            foreach ($dataDinkesKabkot as $itemKabkot) {
                $dinkesKabkot = Faskes::create([
                    'nama_faskes' => $itemKabkot['nama_faskes'],
                    'slug' => Str::slug($itemKabkot['nama_faskes'] . '-' . $itemKabkot['kode_faskes']),
                    'kode_faskes' => $itemKabkot['kode_faskes'],
                    'status_faskes' => $itemKabkot['status_faskes'],
                    'jenis_faskes' => $itemKabkot['jenis_faskes'],
                    'wilayah_id' => $itemKabkot['wilayah_id'],
                ]);

                $dinkesKabkot->parent()->associate($dinkesProv->id)->save();

                $dinkesKabkot->alamat()->create([
                    'jalan' => $itemKabkot['jalan'],
                    'slug' => Str::slug($itemKabkot['jalan']. '-' . $itemKabkot['kode_pos'] ?? ''),
                    'wilayah_id' => $itemKabkot['wilayah_jalan'],
                    'kode_pos' => $itemKabkot['kode_pos'] ?? '',
                ]);

                foreach ($dataPuskes as $itemPuskes) {
                    $dinkesPuskes = Faskes::create([
                        'nama_faskes' => $itemPuskes['nama_faskes'],
                        'slug' => Str::slug($itemPuskes['nama_faskes'] . '-' . $itemPuskes['kode_faskes']),
                        'kode_faskes' => $itemPuskes['kode_faskes'],
                        'status_faskes' => $itemPuskes['status_faskes'],
                        'jenis_faskes' => $itemPuskes['jenis_faskes'],
                        'wilayah_id' => $itemPuskes['wilayah_id'],
                    ]);
    
                    $dinkesPuskes->parent()->associate($dinkesKabkot->id)->save();
    
                    $dinkesPuskes->alamat()->create([
                        'jalan' => $itemPuskes['jalan'],
                        'slug' => Str::slug($itemPuskes['jalan']. '-' . $itemPuskes['wilayah_jalan'] ?? ''),
                        'wilayah_id' => $itemPuskes['wilayah_jalan'],
                    ]);
                }
            }
        }
    }
}
