<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdPackage>
 */
class AdPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Standard',
                'Day Renewal',
                'Day Featured',
                'Weekly Renewal',
                'Biweekly Renewal',
                'Monthly Renewal',
                'Weekly Featured',
                'Biweekly Featured',
                'Monthly Featured'
            ]),
            'price' => fake()->randomFloat(2, 2, 100),
            'duration' => fake()->randomElement(['1', '7', '14', '21', '30']),
            'max_ads' => fake()->randomElement(['1', '3', '5']),
            'max_photos' => fake()->randomElement(['1', '3', '5']),
            'max_videos' => fake()->randomElement(['1', '3', '5']),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
