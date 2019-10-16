<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->get();
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
        $request->validate([
            'product_id' => ['required']
        ]);

        for ($i = 0; $i < count($request->product_id); $i++) {
            Order::create([
                'order_number' => $request->order_number,
                'user_id'      => $request->user_id,
                'product_id'   => $request->product_id[$i],
                'quantity'     => $request->quantity[$i],
                'total'        => $request->quantity[$i] * $request->price[$i],
            ]);
        }

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
        $orders = Order::where('product_id', $id)->get();
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
        $orders = Order::where('status', $id)->get();
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
        $orders = Order::where('order_number', $id)->get();
        $orderNumber = $orders[0]->order_number;
        $user = $orders[0]->user->name;
        $price = Order::select('total')->where('order_number', $id)->get();
        $total = $price->sum('total');
        return view('order.show', compact('orderNumber', 'user', 'orders', 'total'));
    }
}
