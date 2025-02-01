<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vaksin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_vaksin',
        'urutan_vaksin',
        'slug',
        'produsen',
    ];

    public function stokVaksin(): HasMany
    {
        return $this->hasMany(StokVaksin::class);
    }

    // Akses dari KategoriVaksin
    public function kategoriVaksin(): HasMany
    {
        return $this->hasMany(KategoriVaksin::class);
    }

    // Akses Langsung ke Kategori
    public function kategoris(): HasManyThrough
    {
        return $this->hasManyThrough(Kategori::class, KategoriVaksin::class, 'vaksin_id', 'id', 'id', 'kategori_id');
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
