<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
