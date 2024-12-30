<?php

// namespace App\Http\Resources;

// use Illuminate\Http\Request;
// use Illuminate\Http\Resources\Json\JsonResource;

// class ActiveDriverResource extends JsonResource
// {
//     /**
//      * Transform the resource into an array.
//      *
//      * @return array<string, mixed>
//      */
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
//                         'latitude' => $this->activeOrder->latitude_pickup,
//                         'longitude' => $this->activeOrder->longitude_pickup,

//                     ],
//                     'Time Description' => [
//                         'time of order' => $this->activeOrder->time_of_order,
//                         'longitude' => $this->activeOrder->time_of_destination,

//                     ],

//                     'Price' => [
//                         'price' => $this->activeOrder->net_price,

//                     ],
//                     'order_status' => $this->activeOrder->order_status,
//                     'created_at' => $this->activeOrder->created_at,
//                 ];
//             }),
//         ];
//     }
// }
