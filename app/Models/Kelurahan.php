<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan_id',
        'nama_kelurahan',
        'slug',
        'kode_kelurahan'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
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
