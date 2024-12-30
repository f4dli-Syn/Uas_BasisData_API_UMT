<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    //
    use HasFactory, SoftDeletes, HasApiTokens, Notifiable, CanResetPassword;


    protected $fillable = [
        'name',
        'email',
        'password',
        // 'phone',
        // 'register_at',
        // 'customer_status',
    ];

    protected function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}
