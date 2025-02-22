<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'biodata_id',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id')->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions', 'user_id', 'permission_id')->withTimestamps();
    }

    public function hasPermission($permission)
    {
        if ($this->roles->pluck('slug')->contains('administrator')) {
            return true; // Super admin
        }
    
        // Cek permission langsung dan dari role yang sudah di-load
        return $this->permissions->pluck('slug')->contains($permission) ||
               $this->roles->pluck('permissions')->flatten()->pluck('slug')->contains($permission);
    }

    // karena disni kita telah mendifinisikan hasmany untuk akun pengguna yang berelasi dengan faskes
    public function akunPengguna(): HasOne
    {
        return $this->hasOne(AkunPengguna::class);
    }

    // maka disini kita dapat mendefinisikan sebuah fungsi untuk langsung berelasi dengan faskes
    public function faskes(): HasOneThrough
    {
        // disini kita akan melakukan relasi langsung ke faskes melalui tabel akun pengguna
        return $this->hasOneThrough(Faskes::class, AkunPengguna::class, 'user_id', 'id', 'id', 'faskes_id');
    }

    // Generate UUID secara dinamis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    // Keyname menggunakan UUID
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
