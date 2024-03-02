<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'alias' => fake()->unique()->userName,
            'name' => fake()->name,
            'lastname' => fake()->lastName,
            'birthday' => fake()->dateTimeBetween('-90 years', '-18 years')->format('Y-m-d'),
            'location' => fake()->address,
            'instagram' => 'https://www.instagram.com/' . fake()->userName,
            'facebook' => 'https://www.facebook.com/' . fake()->userName,
            'youtube' => 'https://www.youtube.com/channel' . Str::random(24),
        ];
    }
}
