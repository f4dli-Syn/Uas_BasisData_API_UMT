<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Driver;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Customer::factory(5)->create();
        Driver::factory(5)->create();
        PaymentMethod::factory(5)->create();
        Order::factory(5)->create();
        Review::factory(5)->create();
        Setting::factory(5)->create();

        $this->call([RolePermissionSeeder::class, CategorySeeder::class]);
    }
}
