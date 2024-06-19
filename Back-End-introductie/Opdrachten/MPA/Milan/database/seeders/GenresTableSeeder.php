<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['name' => 'Pop'],
            ['name' => 'Rock'],
            ['name' => 'Jazz'],
            ['name' => 'Electronic'],
            ['name' => 'Hip Hop'],
            ['name' => 'Classical'],
            ['name' => 'Reggae'],
        ];

        foreach ($genres as $genreData) {
            Genre::create($genreData);
        }
    }
}
