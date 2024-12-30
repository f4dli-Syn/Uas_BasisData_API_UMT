<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Laravel\Sanctum\PersonalAccessToken;

class ForgotPasswordController extends Controller
{
    //
    public function update_forgot_password(Request $request, PersonalAccessToken $personalAccessToken)
    {

        $request->validate([
            'token' => 'required',
            'password' => 'required',
        ]);
        $customer = PersonalAccessToken::where('token', $request->token)->first();
        if ($customer) {
            // $customer->password = Hash::make($request->password);
            $personalAccessToken->token = null; // Hapus token setelah digunakan
            $customer->save();
            return response()->json(['message' => 'Password berhasil diperbarui.']);
        }
        return response()->json(['message' => 'Token tidak valid.'], 400);
    }
}


// token
// 2|MDCUM6fTo2Cg1AJcj1eddy1h0lAo6OaR9w5s0Ycu9a19ef26