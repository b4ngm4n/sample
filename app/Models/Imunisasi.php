<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'biodata_id',
        'pos_pelayanan_id',
        'vaksin_id',
        'orang_tua_id',
        'dosis',
        'tanggal_imunisasi',
        'tanggal_pelayanan',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }

    public function posPelayanan()
    {
        return $this->belongsTo(PosPelayanan::class);
    }

    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class);
    }

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
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
