<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Models\Role::create([
        	'name' => 'admin',
        	'display_name' => 'User Administrator', // optional
        	'description' => 'User is allowed to manage and edit other users', // optional
        ]);
        $admin = App\Models\Role::create([
	        'name' => 'user',
	        'display_name' => 'User ', // optional
	        'description' => 'User is allowed to do specific tasks', // optional
        ]);
    }
}
