<?php

namespace App\Providers;

use App\Models\Kelurahan;
use App\Models\User;
use App\Policies\KelurahanPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Kelurahan::class => KelurahanPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();

        Gate::define('any-permission', function (User $user, array $permissions) {
            // Super admin memiliki akses penuh
            if ($user->roles->pluck('slug')->contains('administrator')) {
                return true;
            }
        
            // Gabungkan semua izin pengguna dan izin dari roles
            $userPermissions = $user->permissions->pluck('slug')
                ->merge($user->roles->pluck('permissions')->flatten()->pluck('slug'));
        
            // Cek apakah salah satu izin yang diminta ada pada koleksi izin
            return $userPermissions->intersect($permissions)->isNotEmpty();
        });
        

        Gate::define('permission', function ($user, $permission) {
            // Super admin memiliki akses penuh
            if ($user->roles->pluck('slug')->contains('administrator')) {
                return true;
            }

            // Cek permission
            return $user->permissions->pluck('slug')->contains($permission) ||
                $user->roles->pluck('permissions')->flatten()->pluck('slug')->contains($permission);
        });
    }
}
