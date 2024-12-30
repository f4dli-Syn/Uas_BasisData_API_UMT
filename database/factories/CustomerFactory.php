<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => str_replace(
                '@example.com',
                '@gmail.com',
                fake()->unique()->safeEmail()
            ),
            'phone' => $this->faker->phoneNumber(),
            'password' => password_hash('customer123', PASSWORD_BCRYPT, ['cost' => 10]), // default password
            'register_at' => fake()->dateTimeBetween('-1 year', 'now')->format("Y/m/d H:i:s"),
            'customer_status' => fake()->randomElement(['online', 'offline']),

        ];
    }
}
