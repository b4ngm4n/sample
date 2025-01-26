<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;

class Faskes extends Model
{
    use NodeTrait, HasFactory;

    // protected $table = 'faskes';

    protected $fillable = [
        'nama_faskes',
        'slug',
        'kode_faskes',
        'status_faskes', //['aktif', 'tidak-aktif']
        'jenis_faskes', //['dinkes-prov', 'dinkes-kabkot', 'puskesmas', 'pustu', 'klinik', 'rs', 'lab-kesehatan', 'apotek', 'posyandu', 'gudang-farmasi', 'lkt', 'balai-pengobatan', 'labkesda']
        'wilayah_id',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function alamat()
    {
        return $this->morphMany(Alamat::class, 'alamatable');
    }

    public function wilayahKerja()
    {
        return $this->hasMany(WilayahKerja::class);
    }

    public function akunPengguna(): HasMany
    {
        return $this->hasMany(AkunPengguna::class);
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
