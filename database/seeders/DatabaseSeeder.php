<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WilayahSeeder::class,
            FaskesSeeder::class,
            BiodataSeeder::class,
            // PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            TahunSeeder::class,
            BulanSeeder::class,
        ]);
    }
}
