<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();;
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       $roles = ['suadmin','admin','account','user'];
        foreach($roles as $role){

            Role::create(['name' =>$role]);
            $user = User::create([
                'name' => $role,
                'email' => $role.'@gmail.com',
                'password' => Hash::make('aaaaaaaa')
            ]);
            $user->assignRole($role);
        }

    }
}
