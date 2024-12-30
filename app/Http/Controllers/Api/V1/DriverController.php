<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActiveDriverResource;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return Driver::all();
        $drivers = Driver::with('orders')->get();
        return DriverResource::collection($drivers);
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
        // return response()->json(Auth::user());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $driver = Driver::with(['orders.PaymentMethod'])->find($id);
        return new DriverResource($driver);

        // $driver = Driver::with(['currentOrder.customer', 'orders'])->find($id);
        // return new DriverResource($driver);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }

    // public function updatePickup(Request $request, $orderId)
    // {
    //     // 1. Validate the request
    //     $request->validate([
    //         'driver_id' => 'required|exists:drivers,id'
    //     ]);

    //     // 2. Find the order
    //     $order = Order::find($orderId);

    //     if (!$order) {
    //         return response()->json(['error' => 'Order not found'], 404);
    //     }

    //     // 3. Check if the order is already picked up
    //     if ($order->order_status === 'Driver Sampai Titik Jemput') {
    //         return response()->json(['error' => 'Order already picked up'], 400);
    //     }

    //     // 4. Update the order status
    //     $order->order_status = 'Driver Menuju Lokasi';
    //     $order->driver_id = $request->driver_id; // Optional: Associate the driver
    //     $order->save();

    //     // 5. Return a success response
    //     return response()->json(['message' => 'Order picked up successfully']);
    // }
}
