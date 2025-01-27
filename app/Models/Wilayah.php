<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Wilayah extends Model
{
    use NodeTrait, HasFactory;

    protected $fillable = [
        'nama_wilayah',
        'slug',
        'kode_wilayah',
        'jenis_wilayah', //['provinsi', 'kabkot', 'kecamatan', 'kelurahan', 'desa']
    ];

    public function wilayahKerja()
    {
        return $this->hasMany(WilayahKerja::class);
    }

    public function faskes()
    {
        return $this->hasMany(Faskes::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
