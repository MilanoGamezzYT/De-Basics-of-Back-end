<?php

namespace Database\Factories;

use App\Models\Song;
use App\Models\Genre; // Zorg ervoor dat je Genre model importeert
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'artist' => $this->faker->name,
            'duration' => $this->faker->numberBetween(180, 300),
            'genre_id' => Genre::factory(),
        ];
    }
}
