<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokVaksin extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaksin_id',
        'kode_batch',
        'tanggal_produksi',
        'expired_date',
        'jumlah',
        'satuan', // vial / ampul
        'keterangan'
    ];

    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class);
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
