<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Controllers\Action\OrderAction;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderAction::index();        // Tampilkan data berupa JSON
        return (OrderResource::collection($orders))->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = OrderAction::store($request);
        // return (new OrderResource($order))->response()->setStatusCode(201);
        return response()->json($order, 201);
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
        $orders = OrderAction::where('product_id', $id);
        return (OrderResource::collection($orders))->response()->setStatusCode(200);
    }

    /**
     * Tampilkan product berdasarkan status terpilih
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function getStatus($id)
    {
        $orders = OrderAction::where('status', $id);
        return (OrderResource::collection($orders))->response()->setStatusCode(200);
    }

    /**
     * Ubah status Order
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request, $id)
    {
        Order::where('id', $id)->update([
            'status' => $request->status
        ]);
        return response()->json([
            'message' => 'Status Changed'
        ], 201);
    }

    /**
     * Tampilkan product berdasarkan order number
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function byOrderNumber($id)
    {
        $orders = OrderAction::where('order_number', $id);
        $orderNumber = $orders[0]->order_number;
        $user = $orders[0]->user->name;
        $price = Order::select('total')->where('order_number', $id)->get();
        $total = $price->sum('total');
        return (OrderResource::collection($orders))->response()->setStatusCode(200);
    }
}
