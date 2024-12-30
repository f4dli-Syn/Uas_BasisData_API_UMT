<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

    // customer
    public function loginCustomer(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the customer by email
        $customer = Customer::where('email', $request->email)->first();
        $token = $customer->createToken('customerslogin')->plainTextToken;
        return $token;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    public function me(Request $request)
    {
        return response()->json(Auth::user());
    }
}
