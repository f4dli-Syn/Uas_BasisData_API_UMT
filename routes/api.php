<?php

use App\Http\Controllers\Api\V1\AuthenticationController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\DriverController;
use App\Http\Controllers\Api\V1\ForgotPasswordController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\PaymentMethodController;
use App\Http\Controllers\Api\V1\ReviewController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::prefix('v1')->group(function () {
    Route::apiResource('/categories', CategoryController::class);
    Route::get('/customers', [CustomerController::class, 'index']);

    // ->middleware(['auth:sanctum']);
    Route::apiResource('/drivers', DriverController::class);
    Route::apiResource('/payment_methods', PaymentMethodController::class);
    Route::get('/orders', [OrderController::class, 'index']);
    // ->middleware(['auth:sanctum']);
    Route::apiResource('/reviews', ReviewController::class);
    Route::apiResource('/settings', SettingController::class);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/logout-customer', [AuthenticationController::class, 'logout']);
        Route::get('/me-customer', [AuthenticationController::class, 'me']);
    });
    Route::post('/update-forgot-password', [CustomerController::class, 'forgot_password']);

    Route::post('/login-customer', [AuthenticationController::class, 'loginCustomer']);
    Route::post('/login-driver', [AuthenticationController::class, 'loginDriver']);
    Route::post('/customers', [CustomerController::class, 'store']);
    // Route::get('drivers/{id}/pickup', [DriverController::class, 'getActiveDriver']); 
    Route::get('drivers/{id}', [DriverController::class, 'show']);
    Route::put('/orders/{id}/pickup', [OrderController::class, 'updatePickup']);

    Route::post('/forgot-password', [AuthenticationController::class, 'forgot_password']);
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
