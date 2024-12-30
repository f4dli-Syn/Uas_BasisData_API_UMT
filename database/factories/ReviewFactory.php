<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'rating' => fake()->numberBetween(1.0, 5.0),
            'comment' => fake()->sentence(),
            'date_comment' => fake()->dateTimeThisYear()->format("Y/m/d H:i:s"),
        ];
    }
}
