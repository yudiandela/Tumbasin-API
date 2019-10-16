<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
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
        $orders = OrderAction::index();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name', 'ASC')->get();
        $products = Product::orderBy('name', 'ASC')->get();
        $orderNumber = time();
        return view('order.create', compact('products', 'users', 'orderNumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OrderAction::store($request);
        return redirect()->route('order.index')->with('success', 'menambahkan order baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success', 'menghapus data order');
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
        return view('order.index', compact('orders'));
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
        return view('order.index', compact('orders'));
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

        return redirect()->route('order.index')->with('status', 'mengubah status order');
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
        return view('order.show', compact('orderNumber', 'user', 'orders', 'total'));
    }
}
