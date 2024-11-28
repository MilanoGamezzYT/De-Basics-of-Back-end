<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreTableSeeder extends Seeder
{
    public function run()
    {
        Genre::create(['name' => 'Pop']);
        Genre::create(['name' => 'Rock']);
        Genre::create(['name' => 'Jazz']);
        Genre::create(['name' => 'Classical']);
        Genre::create(['name' => 'Hip Hop']);
    }
}

