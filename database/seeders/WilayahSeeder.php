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
                'nama_wilayah' => 'Kota Barat',
                'kode_wilayah' => '7571010',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Dungingi',
                'kode_wilayah' => '7571011',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kota Selatan',
                'kode_wilayah' => '75',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Gorontalo',
                'kode_wilayah' => '7571020',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kota Timur',
                'kode_wilayah' => '7571021',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Hulonthalangi',
                'kode_wilayah' => '7571022',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Dumbo Raya',
                'kode_wilayah' => '7571023',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kota Utara',
                'kode_wilayah' => '7571030',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Kota Tengah',
                'kode_wilayah' => '7571031',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Sipatana',
                'kode_wilayah' => '7571032',
                'jenis_wilayah' => 'kecamatan'
            ],
            [
                'nama_wilayah' => 'Dembe I',
                'kode_wilayah' => '7571010001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Lekobalo',
                'kode_wilayah' => '7571010002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Pilolodaa',
                'kode_wilayah' => '7571010003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Buliide',
                'kode_wilayah' => '7571010004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tenilo',
                'kode_wilayah' => '7571010005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Molosipat W',
                'kode_wilayah' => '7571010006',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Buladu',
                'kode_wilayah' => '7571010008',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tuladenggi',
                'kode_wilayah' => '7571011001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Libuo',
                'kode_wilayah' => '7571011002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tomulabutao',
                'kode_wilayah' => '7571011003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Huangobotu',
                'kode_wilayah' => '7571011004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tomulabutao Selatan',
                'kode_wilayah' => '7571011005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Biawu',
                'kode_wilayah' => '7571020010',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Biawao',
                'kode_wilayah' => '7571020011',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Limba B',    
                'kode_wilayah' => '7571020018',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Limba U Satu',
                'kode_wilayah' => '7571020019',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Limba U Dua',
                'kode_wilayah' => '7571020020',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Padebuolo',
                'kode_wilayah' => '7571021006',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Ipilo',
                'kode_wilayah' => '7571021007',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tamalate',
                'kode_wilayah' => '7571021008',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Moodu',
                'kode_wilayah' => '7571021009',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Heledulaa Selatan',
                'kode_wilayah' => '7571021010',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Heledulaa',
                'kode_wilayah' => '7571021011',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tanjung Kramat',
                'kode_wilayah' => '7571022001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Pohe',
                'kode_wilayah' => '7571022002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tenda',
                'kode_wilayah' => '7571022003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Siendeng',
                'kode_wilayah' => '7571022004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Donggala',
                'kode_wilayah' => '7571022005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Leato Selatan',
                'kode_wilayah' => '7571023001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Leato Utara',
                'kode_wilayah' => '7571023002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Talumolo',
                'kode_wilayah' => '7571023003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Botu',
                'kode_wilayah' => '7571023004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Bugis',
                'kode_wilayah' => '7571023005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Dembe II',
                'kode_wilayah' => '7571030003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Wongkaditi',
                'kode_wilayah' => '7571030004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Wongkaditi Barat',
                'kode_wilayah' => '7571030005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Dulomo Selatan',
                'kode_wilayah' => '7571030011',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Dulomo Utara',
                'kode_wilayah' => '7571030012',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Dembe Jaya',
                'kode_wilayah' => '7571030015',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Wumialo',
                'kode_wilayah' => '7571031001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Dulalowo',
                'kode_wilayah' => '7571031002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Liluwo',
                'kode_wilayah' => '7571031003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Pulubala',
                'kode_wilayah' => '7571031004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Paguyaman',
                'kode_wilayah' => '7571031005',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Dulalowo Timur',
                'kode_wilayah' => '7571031006',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tapa',
                'kode_wilayah' => '7571032001',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Molosipat U',
                'kode_wilayah' => '7571032002',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Tanggikiki',
                'kode_wilayah' => '7571032003',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Bulotadaa Timur',
                'kode_wilayah' => '7571032004',
                'jenis_wilayah' => 'kelurahan'
            ],
            [
                'nama_wilayah' => 'Bulotadaa Barat',
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
