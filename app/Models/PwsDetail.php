<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PwsDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'pws_id',
        'jumlah',
        'jenis_data' //['jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_wus_suntik', 'jumlah_wus_status']
    ];

    public function pws(): BelongsTo
    {
        return $this->belongsTo(Pws::class);
    }
}
