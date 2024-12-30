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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->string('phone', 25)->unique();
            $table->string('vehicle_type', 15);
            $table->string('vehicle_number', 10)->unique();
            $table->string('password', 60);
            $table->decimal('longitude', total: 10, places: 7);
            $table->decimal('latitude', total: 10, places: 7);
            $table->timestamp('register_at');
            $table->enum('driver_status', ['online', 'offline']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
