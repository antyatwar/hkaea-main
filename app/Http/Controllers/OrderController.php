<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function register()
    {
        $order = [
            'amount' => '100.00',
            'currency' => 'HKD',
            'id' => '123456789',
        ];

        $secret = env('PAYMENTASIA_SECRET_KEY');

        $fields = [
            'amount',
            'currency',
            'merchant_reference',
            'request_reference',
            'status',
            'sign',
        ];

        $data = [];

        foreach ($fields as $_field) {
            $data[$_field] = filter_input(INPUT_POST, $_field, FILTER_SANITIZE_STRING);
        }

        $sign = $data['sign'];

        unset($data['sign']);

        ksort($data);

        // signature validation failed, ignore this response
        if ($sign !== hash('SHA512', http_build_query($data) . $secret)) {
            exit;
        }

        // order amount should be exact match with response amount, validation failed, ignore this response
        // if (bccomp($order['amount'], $data['amount'], 2) !== 0) {
        //     exit; 
        // }

        // order currency should be exact match with response currency, validation failed, ignore this response
        // if ($order['currency'] !== $data['currency']) {
        //     exit; 
        // }

        // order id should be exact match with response merchant_reference, validation failed, ignore this response
        // if ($order['id'] !== $data['merchant_reference']) {
        //     exit; 
        // }

        /**
         * after validation above, the response is valid for your system to update accordingly
         *
         * $data['status'] === '0' means your order is pending for deposit 
         * $data['status'] === '1' means your order's deposit is accepted 
         * $data['status'] === '2' means your order's deposit is rejected 
         */

         $order = Order::where('merchant_reference', $data['merchant_reference'])->first();

        if ($data['status'] === '0') {
            $order->update([
                'status' => 0,
            ]);
        } elseif ($data['status'] === '1') {
            $order->update([
                'status' => 1,
            ]);
            $order->user->individual?->update([
                'paid_at' => now(),
            ]);
            $order->user->organization?->update([
                'paid_at' => now(),
            ]);
        } elseif ($data['status'] === '2') {
            $order->update([
                'status' => 2,
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
