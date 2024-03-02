<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['image', 'video']);

        $url = match($type) {
            'image' => 'https://picsum.photos/id/'. rand(1,1000) .'/1024/1024',
            'video' => $this->faker->randomElement([
                'https://www.youtube.com/watch?v=' . Str::random(10),
                'https://vimeo.com/' . rand(100000, 999999)
            ]),
        };

        return [
            'url' => $url,
            'type' => $type,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
