<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AkunPengguna extends Model
{
    use HasFactory;

    protected $fillable = [
        'faskes_id',
        'user_id',
        'status_akun',
        'keterangan'
    ];

    public function faskes(): BelongsTo
    {
        return $this->belongsTo(Faskes::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
