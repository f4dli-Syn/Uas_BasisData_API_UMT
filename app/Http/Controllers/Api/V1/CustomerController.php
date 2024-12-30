<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Customer::all();
        // $customers = Customer::all();
        // return CustomerResource::collection($customers);

        $customers = Customer::with('orders')->get();
        return CustomerResource::collection($customers);
    }


    public function store(StoreCustomerRequest $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:customers',
            //     'phone' => 'required|string',
            'password' => 'required'
        ]);

        // $customer = Customer::create($request->all());
        // return new CustomerResource($customer->loadMissing('order:id, '));
        $customer = Customer::create($request->validated());
        return CustomerResource::make($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customers)
    {
        //
        // return CustomerResource::make($customers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    // public function forgot_password()
    // {
    //     return view('auth.forgot-password');
    // }

    // public function reset_password(Request $request)
    // {
    //     $request->validate(['email' => 'required|email']);

    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );

    //     return $status === Password::RESET_LINK_SENT
    //         ? back()->with(['status' => __($status)])
    //         : back()->withErrors(['email' => __($status)]);
    // }

    public function forgot_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'new_password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($request->errors(), 442);
        }
        $user = Customer::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'Email tidak ditemukan.'], 404);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return response()->json(['message' => 'Password berhasil diperbarui.']);
    }
}
