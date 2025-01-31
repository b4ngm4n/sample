<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'jenis_kategori',
        'slug',
        'keterangan',
        'status_kategori'
    ];


    public function kategoriVaksin(): HasMany
    {
        return $this->hasMany(KategoriVaksin::class);
    }

    public function vaksins()
    {
        return $this->hasManyThrough(Vaksin::class, KategoriVaksin::class, 'kategori_id', 'id', 'id', 'vaksin_id');
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
