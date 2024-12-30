<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentMethod>
 */
class PaymentMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_method' => fake()->randomElement([
                'Cash',
                'E-Wallet',
                'QRIS',
                'Bank Transfer',
                'Credit Card',
                'Debit Card'
            ]),
            'created_at' => fake()->dateTimeThisYear()->format("Y/m/d H:i:s"),
            'updated_at' => fake()->dateTimeThisYear()->format("Y/m/d H:i:s"),
        ];
    }
}
