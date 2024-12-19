<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPelayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelayanan',
        'tahun',
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
