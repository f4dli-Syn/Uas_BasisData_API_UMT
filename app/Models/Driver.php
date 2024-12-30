<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Driver extends Model
{
    //
    use HasFactory, SoftDeletes, HasApiTokens;
    protected function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    protected $guarded = [
        'id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'driver_id', 'id');
    }

    // public function activeOrder()
    // {
    //     return $this->hasOne(Order::class)
    //         ->where('status', 'active')
    //         ->orWhere('status', 'pickup')
    //         ->with('customer');
    // }

    // public function currentOrder()
    // {
    //     return $this->hasOne(Order::class)
    //         ->where('customer_id', 'id')  // atau status yang sesuai untuk pickup
    //         ->latest();
    // }
}
