<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_vaksin',
        'nomor_batch',
        'slug',
        'tanggal_kedaluwarsa',
        'produsen',
        'jenis_pelayanan_id'
    ];


    public function jenisPelayanan()
    {
        return $this->belongsTo(JenisPelayanan::class);
    }

    public function imunisasis()
    {
        return $this->hasMany(Imunisasi::class);
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
