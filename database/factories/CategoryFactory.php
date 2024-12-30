<?php

namespace Database\Factories;

use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $categories = [
        ['name' => 'GoJek', 'slug' => 'gojek'],
        ['name' => 'GoFood', 'slug' => 'gofood'],
        ['name' => 'GoSend', 'slug' => 'gosend']
    ];
    public function definition(): array
    {
        return $this->faker->randomElement($this->categories);
    }
}
