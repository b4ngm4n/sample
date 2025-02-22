<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pws extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tahun_id',
        'bulan_id',
        'kategori_vaksin_id',
        'wilayah_kerja_id',
    ];

    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }

    public function bulan(): BelongsTo
    {
        return $this->belongsTo(Bulan::class);
    }

    public function wilayahKerja(): BelongsTo
    {
        return $this->belongsTo(WilayahKerja::class);
    }

    public function kategoriVaksin(): BelongsTo
    {
        return $this->belongsTo(KategoriVaksin::class);
    }

    public function pwsDetail(): HasMany
    {
        return $this->hasMany(PwsDetail::class);
    }
}
