<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    // protected $with = ['kecamatan'];

    protected $fillable = [
        'kecamatan_id',
        'nama_kelurahan',
        'slug',
        'kode_kelurahan'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    // public function getUserPermissionsAttribute()
    // {
    //     $user = auth()->user();

    //     return [
    //         'canView' => $user->hasPermission('read-kelurahan'),
    //         'canEdit' => $user->hasPermission('edit-kelurahan'),
    //         'canDelete' => $user->hasPermission('delete-kelurahan'),
    //     ];
    // }

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
