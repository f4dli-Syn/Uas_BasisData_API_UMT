<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('driver_id')->constrained()->onDelete('cascade');
            $table->decimal('longitude_pickup', total: 10, places: 6);
            $table->decimal('latitude_pickup', total: 10, places: 6);
            $table->decimal('longitude_destination', total: 10, places: 6);
            $table->decimal('latitude_destination', total: 10, places: 6);
            $table->timestamp('time_of_order');
            $table->timestamp('time_of_order_receipt');
            $table->timestamp('time_of_pickup');
            $table->timestamp('time_of_destination');
            $table->decimal('price', total: 10, places: 2);
            $table->decimal('net_price', total: 10, places: 2);
            $table->decimal('company_deduction', total: 10, places: 2);
            $table->enum('order_status', ['Mencari Driver', 'Mendapatkan Driver', 'Driver Menuju Lokasi', 'Driver Sampai Titik Jemput']);
            $table->foreignId('payment_method_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
