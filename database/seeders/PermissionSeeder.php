<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'create user',
                'slug' => Str::slug('create user'),
            ],
            [
                'name' => 'read user',
                'slug' => Str::slug('read user'),
            ],
            [
                'name' => 'edit user',
                'slug' => Str::slug('edit user'),
            ],
            [
                'name' => 'update user',
                'slug' => Str::slug('update user'),
            ],
            [
                'name' => 'delete user',
                'slug' => Str::slug('delete user'),
            ],
        ];
        

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }


    }
}
