<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    //     public function toArray(Request $request): array
    //     {
    //         return [
    //             'id' => $this->id,
    //             'name' => $this->name,
    //             'email' => $this->email,
    //             'No_telfon' => $this->phone,
    //             'vehicle_type' => $this->vehicle_type,
    //             'vehicle_number' => $this->vehicle_number,
    //             'longitude' => $this->longitude,
    //             'latitude' => $this->latitude,
    //             'orders' => $this->whenLoaded('orders', function () {
    //                 return $this->orders->map(function ($order) {
    //                     return [
    //                         'id' => $order->id,
    //                         'category_id' => $order->category_id,
    //                         'customer_id' => $order->customer_id,
    //                         'time_of_order' => $order->time_of_order,
    //                         'total_price' => $order->net_price,
    //                         // tambahkan field order lainnya yang ingin ditampilkan
    //                     ];
    //                 });
    //             })
    //         ];
    //     }
    // }


    // class ActiveDriverResource extends JsonResource
    // {
    //     public function toArray(Request $request): array
    //     {
    //         return [
    //             'id' => $this->id,
    //             'name' => $this->name,
    //             'phone' => $this->phone,
    //             'vehicle_info' => [
    //                 'type' => $this->vehicle_type,
    //                 'number' => $this->vehicle_number,
    //             ],
    //             'current_location' => [
    //                 'latitude' => $this->latitude,
    //                 'longitude' => $this->longitude,
    //             ],
    //             'active_order' => $this->whenLoaded('activeOrder', function () {
    //                 return [
    //                     'order_id' => $this->activeOrder->id,
    //                     'customer' => [
    //                         'name' => $this->activeOrder->customer->name,
    //                         'phone' => $this->activeOrder->customer->phone,
    //                     ],
    //                     'pickup_point' => [
    //                         'latitude' => $this->activeOrder->pickup_latitude,
    //                         'longitude' => $this->activeOrder->pickup_longitude,
    //                         'address' => $this->activeOrder->pickup_address,
    //                     ],
    //                     'destination' => [
    //                         'latitude' => $this->activeOrder->destination_latitude,
    //                         'longitude' => $this->activeOrder->destination_longitude,
    //                         'address' => $this->activeOrder->destination_address,
    //                     ],
    //                     'order_status' => $this->activeOrder->status,
    //                     'created_at' => $this->activeOrder->created_at,
    //                 ];
    //             }),
    //         ];
    //     }
    // }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'No_telfon' => $this->phone,
            'vehicle_type' => $this->vehicle_type,
            'vehicle_number' => $this->vehicle_number,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'register_at' => $this->register_at,
            'status' => $this->driver_status,
            'mendapatkan_order' => $this->whenLoaded('orders', function () {
                return $this->orders->map(function ($order) {
                    return [
                        'id' => $order->id,
                        'category_id' => $order->category_id,
                        'longitude_pickup' => $order->longitude_pickup,
                        'latitude_pickup' => $order->latitude_pickup,
                        'time_of_destination' => $order->time_of_destination,
                        'total_price' => $order->net_price,
                        'payment_method' => [
                            'id' => $order->payment_method_id,

                        ]
                        // tambahkan field order lainnya yang ingin ditampilkan
                    ];
                });
            })
        ];
    }
}
