<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        // Generate random timestamps in correct order
        $timeOfOrder = fake()->dateTimeBetween('-1 month', 'now')->format("Y/m/d H:i:s");
        $timeOfOrderReceipt = fake()->dateTimeBetween($timeOfOrder, '+10 minutes')->format("Y/m/d H:i:s");
        $timeOfPickup = fake()->dateTimeBetween($timeOfOrderReceipt, '+30 minutes')->format("Y/m/d H:i:s");
        $timeOfDestination = fake()->dateTimeBetween($timeOfPickup, '+60 minutes')->format("Y/m/d H:i:s");

        // Generate base price 
        $basePrice = fake()->numerify('######.##');
        $companyDeduction = $basePrice * 0.2; // 20% company fee
        $netPrice = $basePrice - $companyDeduction;

        return [
            'customer_id' => Customer::factory(),
            'category_id' => Category::factory(),
            'driver_id' => Driver::factory(),

            // Koordinat pickup 
            'longitude_pickup' => fake()->longitude(94, 141),
            'latitude_pickup' => fake()->latitude(-94, 141),

            // Koordinat tujuan
            'longitude_destination' => fake()->longitude(94, 141),
            'latitude_destination' => fake()->latitude(-94, 141),

            // Timestamps
            'time_of_order' => $timeOfOrder,
            'time_of_order_receipt' => $timeOfOrderReceipt,
            'time_of_pickup' => $timeOfPickup,
            'time_of_destination' => $timeOfDestination,

            // Harga dan pembayaran
            'price' => $basePrice,
            'net_price' => $netPrice,
            'company_deduction' => $companyDeduction,

            // Status order
            'order_status' => fake()->randomElement([
                'Mencari Driver',
                'Mendapatkan Driver',
                'Driver Menuju Lokasi',
                'Driver Sampai Titik Jemput'
            ]),

            'payment_method_id' => PaymentMethod::factory(),
        ];
    }
}
