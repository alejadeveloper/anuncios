<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionHistory>
 */
class TransactionHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_number' => 'INV-' . fake()->unique()->numberBetween(100000, 999999),
            'title' => 'You have purchased a package',
            'description' => 'You have purchased a package ' . fake()->randomElement([
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
            'user_id' => null,
            'ad_id' => null,
            'ad_package_id' => null,
            'status' => fake()->randomElement(['pending', 'approved', 'rejected', 'refunded']),
        ];
    }
}
