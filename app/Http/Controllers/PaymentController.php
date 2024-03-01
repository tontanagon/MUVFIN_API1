<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\payment;
use Illuminate\Http\Request;
use App\Models\film;
use App\Models\category;
use Inertia\Inertia;



class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = payment::all();
        return response()->json(['message' => $payment ], 201);

    }
    public function orderhistory(Request $request , payment $payment)
    {
        // $films = DB::table('films')
        // ->select('imgUrl','title','price','length')
        // ->get('imgUrl','title','price','length');
        // ->get();


        // return Inertia::render('Orderhistory',[
        //     'films' => $films,

        // ]);

        $payment = payments::all();

        return $payment;
    }
    public function payment(Request $request , payment $payment)
    {
        $payment = payments::all();
        return $payment;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request , payment $payment)
    {
        // $peyment = $request ->cartItem;
        // return Inertia::render('Cart',[
        //     'paymentsss' => $peyment,

        // ]);
    //     $payment_id = rand(0,999999);
    //     $payments = payment::find($payment_id);
    //     $validated = $request->validate([
    //         'payment_id' => 'required|string|max:6',
    //         'quantity' => 'required|numeric|max:8',
    //         'film_id' => 'required|numeric',
    //         'price' => 'required|string',
    // ]);

    // while($payments){
    //     $payment_id = rand(10,999999);
    // }

    //         $payment->create($validated);




      //id id ของuser เขียนว่าเข้าไปดูuserที่loginตอนนี้

      //film_id id ของหนัง
      //total ราคารวมกับweek
      //week ระยะเวลาเช่าหนัง
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
            'payment_id' => 'required|string|max:6',
            'customer_id' => 'required|integer',
            'film_id' => 'required|integer',
            'total' => 'required|numeric',
            'week' => 'required|integer',
        ]);

        payments::create($validated);

        return response()->json(['message' => 'payments created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Request  $request,payment $payment)
    {
        $payment = payment::find($request->payment);

        if(!$payment){
            return response()->json([
                'message' => 'payment not found',
            ], 404);
        }

        return response()->json([
            'message' => 'payment get successfully',
            'Data' => $payment
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        $validated = $request->validate([
            'payment_id' => 'required|string|max:6',
            'customer_id' => 'required|integer',
            'film_id' => 'required|integer',
            'total' => 'required|numeric',
            'week' => 'required|integer',
        ]);

        $payment = payment::find($request->payment_id);

        if (!$payment) {
            return response()->json(['message' => 'payment not found'], 404);
        }
            $payment->update($validated);

            return response()->json(['message' => 'payment update successfully', 'data' => $payment], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,payment $payment)
    {
        $payment = payment::find($request->payment_id);
        if ($payment) {
        $payment->delete();
        return response()->json(['message' => 'payment deleted successfully'], 200);
        } else{
            return response()->json(['message' => 'payment not found'], 404);
        }

    }
}
