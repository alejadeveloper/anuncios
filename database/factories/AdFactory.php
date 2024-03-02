<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => rand(1, 20),
            'title' => fake()->sentence,
            'content' => fake()->paragraph,
            'cover' => 'https://picsum.photos/id/'. rand(1,1000) .'/90/90',
            'price' => fake()->randomFloat(2, 5, 1000),
            'is_verified' => fake()->boolean,
            'is_ranked' => fake()->boolean,
            'is_commentable' => fake()->boolean,
            'is_shareable' => fake()->boolean,
            'is_age_visible' => fake()->boolean,
            'status' => fake()->randomElement(['active', 'pending', 'inactive', 'expired']),
        ];
    }
}
