<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class SyncPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi permission dari middleware route ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routes = Route::getRoutes();
        $newPermissions = 0;

        foreach ($routes as $route) {
            $middlewares = $route->gatherMiddleware();

            
            foreach ($middlewares as $middleware) {
                if (Str::startsWith($middleware, 'permission:')) {
                    $permissionSlug = Str::after($middleware, 'permission:');
                    
                    $permission = Permission::firstOrCreate(
                        ['slug' => $permissionSlug],
                        ['name' => Str::lower(str_replace('-', ' ', $permissionSlug))]
                    );

                    if ($permission->wasRecentlyCreated) {
                        $newPermissions++;
                    }
                }
            }
        }

        $newPermissionsList = Permission::where('created_at', '>', now()->subSeconds(5))->pluck('name')->toArray();

        if (count($newPermissionsList) > 0) {
            $this->info("Singkronisasi permission selesai. Total $newPermissions permission baru ditambahkan: ");
            $this->line("List: ");
            foreach ($newPermissionsList as $key => $permission) {
                $this->line(($key + 1) . ". " . $permission);
            }
        } else {
            $this->info("Tidak ada permission yang ditambahkan.");
        }
    }
}
