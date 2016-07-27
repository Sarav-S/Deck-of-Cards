<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name'     => 'Sarav',
        	'email'    => 'user@gmail.com',
        	'password' => bcrypt('user123')
        ]);

        $userRole = Role::create([
        	'name' => 'user',
        	'display_name' => 'User',
        	'description' => 'This is classic user'
        ]);

        $user->attachRole($userRole);

        $admin = User::create([
        	'name'     => 'Admin',
        	'email'    => 'admin@gmail.com',
        	'password' => bcrypt('admin123')
        ]);

        $adminRole = Role::create([
        	'name' => 'admin',
        	'display_name' => 'Admin',
        	'description' => 'This is admin user'
        ]);

        $admin->attachRole($adminRole);
    }
}
