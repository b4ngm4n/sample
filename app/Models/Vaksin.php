<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaksin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_vaksin',
        'slug',
        'produsen',
    ];

    public function stokVaksin(): HasMany
    {
        return $this->hasMany(StokVaksin::class);
    }

    public function kategoriVaksin(): HasMany
    {
        return $this->hasMany(KategoriVaksin::class);
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
