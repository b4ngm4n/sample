<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisImunisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis_imunisasi',
        'slug'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function posPelayanans()
    {
        return $this->hasMany(PosPelayanan::class);
    }

    public function vaksins()
    {
        return $this->hasMany(Vaksin::class);
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
