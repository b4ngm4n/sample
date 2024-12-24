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
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        // Define multiple permissions check (any-permission)
        Gate::define('any-permission', function (User $user, array $permissions) {
            foreach ($permissions as $permission) {
                if (
                    $user->permissions->pluck('slug')->contains($permission) ||
                    $user->roles->pluck('permissions')->flatten()->pluck('slug')->contains($permission)
                ) {
                    return true;
                }
            }
            return false;
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
