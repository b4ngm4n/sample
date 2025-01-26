<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pws extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tahun_id',
        'bulan_id',
        'faskes_id',
        'vaksin_id',
        'wilayah_id',
        'jumlah_imunisasi_l',
        'jumlah_imunisasi_p',
        'kategori_id',
        'keterangan',
    ];

    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }

    public function bulan(): BelongsTo
    {
        return $this->belongsTo(Bulan::class);
    }

    public function faskes(): BelongsTo
    {
        return $this->belongsTo(Faskes::class);
    }

    public function vaksin(): BelongsTo
    {
        return $this->belongsTo(Vaksin::class);
    }

    public function wilayah(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
