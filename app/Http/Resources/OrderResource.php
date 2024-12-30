<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // return parent::toArray($request);
        return [
            'order_id' => $this->id,
            'longitude_pickup' => $this->longitude_pickup,
            'latitude_pickup' => $this->latitude_pickup,
            'longitude_destination' => $this->longitude_destination,
            'latitude_destination' => $this->latitude_destination,
            'waktu_order' => $this->time_of_order,
            'Harga' => $this->net_price,

            'category_order' => [
                // 'id' => $this->category->id,
                'name' => $this->category->name,
                // tambahkan field category lainnya sesuai kebutuhan
            ],
            'customer' => [
                'id' => $this->customer->id,
                'name' => $this->customer->name,
                'email' => $this->customer->email,
                'phone' => $this->customer->phone,
                // tambahkan field customer lainnya sesuai kebutuhan
            ],

            'driver' => [
                'id' => $this->driver->id,
                'nama' => $this->driver->name,
                'jenis_kendaraan' => $this->driver->vehicle_type,
                'plat_kendaraan' => $this->driver->vehicle_number,
                'posisi_driver' => [
                    'latitude' => $this->driver->latitude,
                    'longitude' => $this->driver->longitude,
                    // 'nama_area' => $this->driver->area->name, // tambahkan field area lainnya sesuai kebutuhan
                ]
            ],

            'metode_pembayaran' => [
                'id' => $this->PaymentMethod->id,
                'nama_metode' => $this->PaymentMethod->payment_method,
                // tambahkan field metode_pembayaran lainnya sesuai kebutuhan
            ],

            'kolom review' => [
                'reviews' => ReviewResource::collection($this->reviews),
            ]

        ];
    }
}
