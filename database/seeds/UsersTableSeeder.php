<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();

        // for ($i=1; $i < 11; $i++) { 
        	$user = User::create([
	        	'name' => "David",
	        	'email' => "david@email.com",
	        	'password' => "123123"
        	]);
        // }

        	$role = Role::create([
	        	'name' => "admin",
	        	'display_name' => "Administrador",
	        	'description' => "Administrador del sitio Web"
        	]);

        	$user->roles()->save($role);

    }
}
