<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
