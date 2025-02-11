<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            ['name' => 'Blinding Lights', 'artist' => 'The Weeknd', 'genre_id' => 1, 'duration' => 200],
            ['name' => 'Shape of You', 'artist' => 'Ed Sheeran', 'genre_id' => 2, 'duration' => 234],
            ['name' => 'Bohemian Rhapsody', 'artist' => 'Queen', 'genre_id' => 3, 'duration' => 354],
            ['name' => 'Uptown Funk', 'artist' => 'Mark Ronson ft. Bruno Mars', 'genre_id' => 4, 'duration' => 270],
            ['name' => 'Someone Like You', 'artist' => 'Adele', 'genre_id' => 5, 'duration' => 285],
        ];

        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}
