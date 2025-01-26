<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'wilayah_id',
        'faskes_id',
    ];

    public function faskes()
    {
        return $this->belongsTo(Faskes::class);
    }


    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
