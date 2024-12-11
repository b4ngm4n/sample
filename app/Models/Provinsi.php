<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_provinsi',
        'slug',
        'kode_provinsi',
    ];

    public function kabupatens()
    {
        return $this->hasMany(Kabupaten::class);
    }

    public static function  boot()
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
