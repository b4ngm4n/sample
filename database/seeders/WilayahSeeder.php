<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_wilayah' => 'Gorontalo',
                'kode_wilayah' => '75',
                'jenis_wilayah' => 'provinsi'
            ],
            [
                'nama_wilayah' => 'Kota Gorontalo',
                'kode_wilayah' => '7571',
                'jenis_wilayah' => 'kabkot'
            ],
            [
                'nama_wilayah' => 'Kecamatan Kota Barat',
                'kode_wilayah' => '7571010',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kecamatan Dungingi',
                'kode_wilayah' => '7571011',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kecamatan Kota Selatan',
                'kode_wilayah' => '7571020',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kecamatan Kota Timur',
                'kode_wilayah' => '7571021',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kecamatan Hulonthalangi',
                'kode_wilayah' => '7571022',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kecamatan Dumbo Raya',
                'kode_wilayah' => '7571023',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kecamatan Kota Utara',
                'kode_wilayah' => '7571030',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kecamatan Kota Tengah',
                'kode_wilayah' => '7571031',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kecamatan Sipatana',
                'kode_wilayah' => '7571032',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Dembe I',
                'kode_wilayah' => '7571010001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Lekobalo',
                'kode_wilayah' => '7571010002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Pilolodaa',
                'kode_wilayah' => '7571010003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Buliide',
                'kode_wilayah' => '7571010004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tenilo',
                'kode_wilayah' => '7571010005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Molosipat W',
                'kode_wilayah' => '7571010006',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Buladu',
                'kode_wilayah' => '7571010008',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tuladenggi',
                'kode_wilayah' => '7571011001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Libuo',
                'kode_wilayah' => '7571011002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tomulabutao',
                'kode_wilayah' => '7571011003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Huangobotu',
                'kode_wilayah' => '7571011004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tomulabutao Selatan',
                'kode_wilayah' => '7571011005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Biawu',
                'kode_wilayah' => '7571020010',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Biawao',
                'kode_wilayah' => '7571020011',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Limba B',    
                'kode_wilayah' => '7571020018',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Limba U Satu',
                'kode_wilayah' => '7571020019',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Limba U Dua',
                'kode_wilayah' => '7571020020',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Padebuolo',
                'kode_wilayah' => '7571021006',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Ipilo',
                'kode_wilayah' => '7571021007',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tamalate',
                'kode_wilayah' => '7571021008',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Moodu',
                'kode_wilayah' => '7571021009',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Heledulaa Selatan',
                'kode_wilayah' => '7571021010',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Heledulaa Utara',
                'kode_wilayah' => '7571021011',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tanjung Kramat',
                'kode_wilayah' => '7571022001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Pohe',
                'kode_wilayah' => '7571022002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tenda',
                'kode_wilayah' => '7571022003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Siendeng',
                'kode_wilayah' => '7571022004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Donggala',
                'kode_wilayah' => '7571022005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Leato Selatan',
                'kode_wilayah' => '7571023001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Leato Utara',
                'kode_wilayah' => '7571023002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Talumolo',
                'kode_wilayah' => '7571023003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Botu',
                'kode_wilayah' => '7571023004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Bugis',
                'kode_wilayah' => '7571023005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Dembe II',
                'kode_wilayah' => '7571030003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Wongkaditi Timur',
                'kode_wilayah' => '7571030004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Wongkaditi Barat',
                'kode_wilayah' => '7571030005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Dulomo Selatan',
                'kode_wilayah' => '7571030011',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Dulomo Utara',
                'kode_wilayah' => '7571030012',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Dembe Jaya',
                'kode_wilayah' => '7571030015',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Wumialo',
                'kode_wilayah' => '7571031001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Dulalowo',
                'kode_wilayah' => '7571031002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Liluwo',
                'kode_wilayah' => '7571031003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Pulubala',
                'kode_wilayah' => '7571031004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Paguyaman',
                'kode_wilayah' => '7571031005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Dulalowo Timur',
                'kode_wilayah' => '7571031006',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tapa',
                'kode_wilayah' => '7571032001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Molosipat U',
                'kode_wilayah' => '7571032002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Tanggikiki',
                'kode_wilayah' => '7571032003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Bulotadaa Timur',
                'kode_wilayah' => '7571032004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Kelurahan Bulotadaa Barat',
                'kode_wilayah' => '7571032005',
                'jenis_wilayah' => 'kelurahan'
            ],
        ];

        $dataProv = [];
        $dataKabkot = [];
        $dataKecamatan = [];
        $dataKelurahan = [];

        foreach ($data as $item) {
            if ($item['jenis_wilayah'] == 'provinsi') {
                $dataProv[] = $item;
            }
            if ($item['jenis_wilayah'] == 'kabkot') {
                $dataKabkot[] = $item;
            }
            if ($item['jenis_wilayah'] == 'kecamatan') {
                $dataKecamatan[] = $item;
            }
            if ($item['jenis_wilayah'] == 'kelurahan') {
                $dataKelurahan[] = $item;
            }
        }

        foreach ($dataProv as $itemProv) {
            $provinsi = Wilayah::create([
                'nama_wilayah' => $itemProv['nama_wilayah'],
                'kode_wilayah' => $itemProv['kode_wilayah'],
                'jenis_wilayah' => $itemProv['jenis_wilayah'],
                'slug' => Str::slug($itemProv['nama_wilayah'] . '-' . $itemProv['kode_wilayah']),
            ]);

            foreach ($dataKabkot as $itemKabkot) {
                $kabkot = Wilayah::create([
                    'nama_wilayah' => $itemKabkot['nama_wilayah'],
                    'kode_wilayah' => $itemKabkot['kode_wilayah'],
                    'jenis_wilayah' => $itemKabkot['jenis_wilayah'],
                    'slug' => Str::slug($itemKabkot['nama_wilayah'] . '-' . $itemKabkot['kode_wilayah']),
                ]);

                $kabkot->parent()->associate($provinsi->id)->save();

                foreach ($dataKecamatan as $itemKecamatan) {
                    $kecamatan = Wilayah::create([
                        'nama_wilayah' => $itemKecamatan['nama_wilayah'],
                        'kode_wilayah' => $itemKecamatan['kode_wilayah'],
                        'jenis_wilayah' => $itemKecamatan['jenis_wilayah'],
                        'slug' => Str::slug($itemKecamatan['nama_wilayah'] . '-' . $itemKecamatan['kode_wilayah']),
                    ]);

                    $kecamatan->parent()->associate($kabkot->id)->save();

                    foreach ($dataKelurahan as $itemKelurahan) {
                        if ($itemKecamatan['kode_wilayah'] == substr($itemKelurahan['kode_wilayah'], 0, 7)) {
                            $kelurahan = Wilayah::create([
                                'nama_wilayah' => $itemKelurahan['nama_wilayah'],
                                'kode_wilayah' => $itemKelurahan['kode_wilayah'],
                                'jenis_wilayah' => $itemKelurahan['jenis_wilayah'],
                                'slug' => Str::slug($itemKelurahan['nama_wilayah'] . '-' . $itemKelurahan['kode_wilayah']),
                            ]);

                            $kelurahan->parent()->associate($kecamatan->id)->save();
                        }
                    }
                }
            }
        }

    }
}
