<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // DB::table('users')->insert([
        //     [
        //         'name' => 'User 1',
        //         'email' => 'user1@example.com',
        //         'password' => Hash::make('password')
        //     ],
        //     [
        //         'name' => 'User 2',
        //         'email' => 'user2@example.com',
        //         'password' => Hash::make('password')
        //     ],
        // ]);
    }
}
