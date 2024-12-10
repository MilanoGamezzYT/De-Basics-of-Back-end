<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            "name" => "Rock"
        ]);

        Genre::create([
            "name" => "Pop"
        ]);

        Genre::create([
            "name" => "Hip Hop"
        ]);

        Genre::create([
            "name" => "Jazz"
        ]);

        Genre::create([
            "name" => "Classical"
        ]);

        Genre::create([
            "name" => "Electronic"
        ]);

        Genre::create([
            "name" => "Country"
        ]);

        Genre::create([
            "name" => "Reggae"
        ]);

        Genre::create([
            "name" => "Rap"
        ]);

        Genre::create([
            "name" => "Metal"
        ]);
    }
}
