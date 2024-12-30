<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return Order::all();
        // $orders = Order::all();
        // return OrderResource::collection($orders);

        $orders = Order::with('customer')->get();
        return OrderResource::collection($orders);

        $orders = Order::with('category')->get();
        return OrderResource::collection($orders);

        $orders = Order::with('driver')->get();
        return OrderResource::collection($orders);

        $orders = Order::with('PaymentMethod')->get();
        return OrderResource::collection($orders);

        $orders = Order::with('reviews')->get();
        return OrderResource::collection($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $validated = $request->validate([
        //     // 'customer_id' => 'required|exists:customers,id',
        //     'driver_id' => 'required|exists:drivers,id',
        //     'category_id' => 'required|exists:categories,id',
        //     'longitude_pickup' => 'required|decimal, decimalPlaces: 6',
        //     'latitude_pickup' => 'required|decimal, decimalPlaces: 6',
        //     'longitude_destination' => 'required|decimal, decimalPlaces: 6',
        //     'latitude_destination' => 'required|decimal, decimalPlaces: 6',
        //     'time_of_order' => 'required|timestamp',
        //     'time_of_order_receipt' => 'required|timestamp',
        //     'time_of_pickup' => 'required|timestamp',
        //     'time_of_destination' => 'required|timestamp',
        //     'price' => 'required|decimal,decimalPlaces: 2',
        //     'net_price' => 'required|decimal,decimalPlaces: 2',
        //     'company_deduction' => 'required|decimal,decimalPlaces: 2',
        //     'order_status' => 'required|integer',
        //     'payment_method_id' => 'required|exists:payment_methods,id',
        // ]);
        // $request['customer'] = Auth::user()->id;
        // $order = Order::create($request->all());
        // return new OrderResource($order);
        // return response()->json("oke bisa diakses");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function updatePickup(Request $request, $orderId)
    {
        // 1. Validate the request
        $request->validate([
            'driver_id' => 'required|exists:drivers,id'
        ]);

        // 2. Find the order
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // 3. Check if the order is already picked up
        if ($order->order_status === 'Driver Sampai Titik Jemput') {
            return response()->json(['Message' => 'Driver Sudah Di Lokasi Anda']);
        } elseif ($order->order_status === 'Driver Menuju Lokasi') {
            return response()->json(['Message' => 'Driver Sedang Dalam Perjalanan, Mohon Tunggu']);
        }

        // 5. Return a success response
        return response()->json(['message' => 'Pesanan Diterima']);
    }
}
