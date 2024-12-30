<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
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
            'vehicle_type' => fake()->randomElement(['motor', 'mobil']),
            'vehicle_number' => fake()->randomElement([
                strtoupper(fake()->bothify('?? #### ??')),
                strtoupper(fake()->bothify('? #### ??'))
            ]),
            'password' => password_hash('driver123', PASSWORD_BCRYPT, ['cost' => 10]),
            'longitude' => fake()->longitude(94, 141), // Range longitude Indonesia
            'latitude' => fake()->latitude(-11, 6), // Range latitude Indonesia
            'register_at' => fake()->dateTimeBetween('-1 year', 'now')->format("Y/m/d H:i:s"),
            'driver_status' => fake()->randomElement(['online', 'offline']),
        ];
    }
}
