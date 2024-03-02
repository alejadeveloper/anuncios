<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
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
                'Dating',
                'Relationship',
                'Marriage',
                'Travel',
                'Food',
                'Lifestyle',
                'Fashion',
                'Beauty',
                'Health',
                'Fitness',
                'Sports',
                'Technology',
                'Science',
                'Education',
                'Entertainment',
                'Music',
                'Movies',
                'TV Shows',
                'Books',
                'Art',
                'Photography',
                'Nature',
                'Pets',
                'Cars',
                'Motorcycles',
                'Business',
                'Finance',
                'Escort',
                'Home',
                'Garden',
                'Family',
                'Parenting',
                'Kids',
                'Teens',
                'Adults',
                'Seniors',
            ])
        ];
    }
}
