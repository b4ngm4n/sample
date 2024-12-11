<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        // cek apakah role yang dimiliki adalah super admin
        if ($this->roles()->where('slug', 'administrator')->exists()) {
            return true;
        }

        // Cek apakah user memiliki permission langsung atau melalui role
        return $this->permissions()->where('slug', $permission)->exists() ||
            $this->roles()->whereHas('permissions', function ($query) use ($permission) {
                $query->where('slug', $permission);
            })->exists();
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