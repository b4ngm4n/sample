<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $fillable = [
        'jalan',
        'slug',
        'rt',
        'rw',
        'kode_pos',
        'alamatable_id',
        'alamatable_type',
        'wilayah_id'
    ];

    public function alamatable()
    {
        return $this->morphTo();
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public static function boot()
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
