<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\DB;

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
        return OrderResource::collection($orders);
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
        return OrderResource::collection($order);
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
        return OrderResource::collection($order);
    }
}
