<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PwsSasaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_id',
        'kategori_id',
        'wilayah_kerja_id',
        'jumlah',
        'jenis_data'
    ];

    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function wilayahKerja(): BelongsTo
    {
        return $this->belongsTo(WilayahKerja::class);
    }
}
