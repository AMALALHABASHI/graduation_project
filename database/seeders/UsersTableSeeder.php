<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'educator1',
        	'email' => 'educator1@gmail.com',
        	'password' => bcrypt('secret123'),
            'user_type'=>1

        ]);

        DB::table('users')->insert([
            'name' => 'Educator2',
            'email' => 'educator2@gmail.com',
            'password' => bcrypt('secret123'),
            'user_type'=>1

        ]);

        DB::table('users')->insert([
            'name' => 'Educator3',
            'email' => 'educator3@gmail.com',
            'password' => bcrypt('secret123'),
            'user_type'=>1

        ]);

        DB::table('users')->insert([
            'name' => 'counselor1',
            'email' => 'counselor1@gmail.com',
            'password' => bcrypt('secret123'),
            'user_type'=>0

        ]);

        DB::table('users')->insert([
            'name' => 'counselor2',
            'email' => 'counselor2@gmail.com',
            'password' => bcrypt('secret123'),
            'user_type'=>0

        ]);
    }
}
