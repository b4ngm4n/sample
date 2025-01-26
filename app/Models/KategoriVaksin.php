<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriVaksin extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'vaksin_id'
    ];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class);
    }
}
