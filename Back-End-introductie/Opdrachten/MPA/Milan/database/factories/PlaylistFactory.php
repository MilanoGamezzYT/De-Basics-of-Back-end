<?php

namespace Database\Factories;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // Voorbeeld van een naam, bijv. 'Rock' of 'Chill'
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Kies een willekeurige gebruiker
        ];
    }
}
