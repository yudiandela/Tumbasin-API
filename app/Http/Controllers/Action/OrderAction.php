<?php

namespace App\Http\Controllers\Action;

use App\Order;

class OrderAction
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        return Order::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store($request)
    {
        $request->validate([
            'product_id' => ['required']
        ]);

        $order = [];

        for ($i = 0; $i < count($request->product_id); $i++) {
            $order[] = Order::create([
                'order_number' => $request->order_number,
                'user_id'      => $request->user_id,
                'product_id'   => $request->product_id[$i],
                'quantity'     => $request->quantity[$i],
                'total'        => $request->quantity[$i] * $request->price[$i],
            ]);
        }

        return $order;
    }

    public static function where($coloum, $data)
    {
        return Order::where($coloum, $data)->get();
    }
}
