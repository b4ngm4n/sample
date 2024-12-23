<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosPelayanan extends Model
{
    use HasFactory;

    // protected $with = ['puskesmas', 'jenisPelayanan', 'Kelurahan'];

    protected $fillable = [
        'puskesmas_id',
        'kelurahan_id',
        'nama_pos_pelayanan',
        'slug',
        'alamat',
        'jenis_pelayanan_id',
    ];

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

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
