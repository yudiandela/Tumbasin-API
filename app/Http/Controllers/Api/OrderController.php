<?php

namespace App\Http\Controllers\Api;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Action\OrderAction;
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
        $orders = OrderAction::index();

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => OrderResource::collection($orders)
        ], 200);
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

        return response()->json([
            'status' => [
                'code' => 201,
                'description' => 'Created'
            ],
            'result' => $order
        ], 201);
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

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => OrderResource::collection($orders)
        ], 200);
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

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => OrderResource::collection($orders)
        ], 200);
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
            'status' => [
                'code' => 201,
                'description' => 'Created'
            ],
            'result' => 'Status Changed'
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

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => OrderResource::collection($orders)
        ], 200);
    }
}
