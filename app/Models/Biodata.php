<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nama_depan',
        'nama_tengah',
        'nama_belakang',
        'slug',
        'nik',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'pekerjaan',
        'alamat',
        'jenis_kelamin',
        'no_hp'
    ];

    // Generate UUID secara dinamis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    // Keyname menggunakan UUID
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
