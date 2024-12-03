<?php

namespace Database\Seeders;

use App\Models\Biodata;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->username = 'b4ngm4n';
        $user->password = Hash::make('tOOr12345*');
        $user->biodata_id = Biodata::where('slug', 'salman-mustapa')->first()->id;
        $user->email = 'abangucup@duck.com';
        $user->save();

        $roleId = Role::where('slug', 'administrator')->first()->id;

        $user->roles()->attach($roleId);
    }
}
