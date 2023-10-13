<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'isAdmin'=>1,
            'password' => Hash::make('12345'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'user',
            'email' => 'user@gmail.com',
            'isAdmin'=>0,
            'password' => Hash::make('12345'),
        ]);
    }
}
