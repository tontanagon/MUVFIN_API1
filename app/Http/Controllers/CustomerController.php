<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {   $user = $request->user();
        $customer = customer::find($user->id);

        return $customer;
    }

    public function index()
    {
        $customer = customer::all();

        return $customer;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        $customer = User::where('email', $request->email)->first();
        if (!$customer){
            return response()->json(['message' => 'Email not found in user'], 404);
        }

        Customers::create($validated);

        return response()->json(['message' => 'Customers created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,customer $customer)
    {

        $customer = customer::find($request->customer);

        if(!$customer){
            return response()->json([
                'message' => 'customer not found',0
            ], 404);
        }

        return response()->json([
            'message' => 'customer get successfully',
            'Data' => $customer
        ], 201);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        $customer = customer::find($request->customer_id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
            $customer->update($validated);

            return response()->json(['message' => 'Customer update successfully', 'data' => $customer], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, customer $customer)
    {
        $customer = customer::find($request->customer_id);
        if ($customer) {
        $customer->delete();
        return response()->json(['message' => 'customer deleted successfully' , 'data' => $customer], 200);
        } else{
            return response()->json(['message' => 'customer not found'], 404);
        }


    }
}
