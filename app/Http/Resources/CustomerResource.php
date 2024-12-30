<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'No_telfon' => $this->phone,
            'register_at' => $this->register_at,
            'status' => $this->customer_status,
            'orders' => $this->whenLoaded('orders', function () {
                return $this->orders->map(function ($order) {
                    return [
                        'id' => $order->id,
                        'category_id' => $order->category_id,
                        'driver_id' => $order->driver_id,
                        'time_of_order' => $order->time_of_order,
                        'total_price' => $order->net_price,
                        'payment_method' => $order->payment_method_id,
                        // tambahkan field order lainnya yang ingin ditampilkan
                    ];
                });
            })

        ];
    }
}
