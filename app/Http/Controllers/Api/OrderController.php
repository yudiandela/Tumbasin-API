<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();

        // Tampilkan data berupa JSON
        return (OrderResource::collection($orders))->response()->setStatusCode(200);
    }

    /**
     * Tampilkan berdasarkan status terpilih
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function getStatus($id)
    {
        $order = Order::where('status', $id)->get();

        // Tampilkan data berupa JSON
        return (OrderResource::collection($order))->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     * Where product_id
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function showByProduct($id)
    {
        $order = Order::where('product_id', $id)->get();
        // Tampilkan data berupa JSON
        return (OrderResource::collection($order))->response()->setStatusCode(200);
    }
}
