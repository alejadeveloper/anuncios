<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
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
                'Man',
                'Woman',
                'Travesty',
                'Trans Woman',
                'Trans Man',
                'Lesbian',
                'Gay',
                'Bisexual',
                'Queer',
                'Intersex',
                'Asexual',
                'Pansexual',
                'Non-binary']),
        ];
    }
}
