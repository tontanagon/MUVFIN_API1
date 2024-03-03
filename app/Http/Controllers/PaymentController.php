<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\payment;
use Illuminate\Http\Request;
use App\Models\film;
use App\Models\category;
use Inertia\Inertia;
use Carbon\Carbon;



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
        $user = $request->user();
        $PaymentNotEx = DB::table('payments')
        ->leftJoin('films','films.film_id','=','payments.film_id')
        ->leftJoin('categories','categories.category_id','=','films.category_id')
        ->where('payments.id',$user->id)
        ->where(DB::raw('DATE(payments.created_at) + 7*payments.week - DATE(NOW())') ,'>','0')
        ->select('films.*', 'payments.*', 'categories.*' ,'payments.created_at', DB::raw('DATE(payments.created_at) + 7*payments.week - DATE(NOW()) as time'))
        ->get();

        $PaymentEx = DB::table('payments')
        ->leftJoin('films','films.film_id','=','payments.film_id')
        ->leftJoin('categories','categories.category_id','=','films.category_id')
        ->where('payments.id',$user->id)
        ->where(DB::raw('DATE(payments.created_at) + 7*payments.week - DATE(NOW())') ,'<=','0')
        ->select('films.*', 'payments.*', 'categories.name' ,'payments.created_at', DB::raw('DATE(payments.created_at) + 7*payments.week - DATE(NOW()) as time'))
        ->get();


        return Inertia::render('Orderhistory',[
            'PaymentNotEx' => $PaymentNotEx,
            'PaymentEx' => $PaymentEx

        ]);
    }

  public function cart(Request $request )
    {
        $user = $request->user();
        $containsFilm = DB::table('payments')
                        ->where('id', $user->id)
                        ->where(DB::raw('DATE(payments.created_at) + 7*payments.week - DATE(NOW())') ,'>','0')
                        ->select('payments.film_id')
                        ->get();

        return Inertia::render('Cart', [
            'containsFilm' => $containsFilm,
            'user' => $user
        ]);
    }

    public function payment(Request $request , payment $payment)
    {
        $payment = payment::all();
        return $payment;
    }
    /**
     * Show the form for creating a new resources.cc
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
            'id' => 'required|integer',
            'film_id' => 'required|integer',
            'total' => 'required|numeric',
            'week' => 'required|integer',
        ]);

        payment::create($validated);

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
            'id' => 'required|integer',
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

    public function checkout(Request $request)
    {
        $validatedData = $request->validate([
            'payment_id' => 'required|string|max:6',
            'id' => 'required|integer',
            'film_id' => 'required|integer',
            'total' => 'required|numeric',
            'week' => 'required|integer',
        ]);

        $payment = Payment::create($validatedData);

        return response()->json($payment, 201);
    }


}

