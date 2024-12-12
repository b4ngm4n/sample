<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan_id',
        'nama_puskesmas',
        'slug',
        'kode_puskesmas',
        'status_puskesmas',
        'alamat'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    
    public function wilayah_kerja()
    {
        return $this->belongsToMany(Kelurahan::class, 'wilayah_kerjas', 'puskesmas_id', 'kelurahan_id')->withTimestamps();
    }

    // Generate UUID secara dinamis
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
