@extends('layouts.back')

@section('content')
<div class="border-bottom pb-3 mb-2">
    <h2 class="d-inline">Order Detail</h2>
    <a href="{{ route('order.index') }}" class="float-right btn btn-primary">
        <i class="mr-1 fas fa-shopping-cart"></i> List all Orders
    </a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col">
                <span class="text-muted">User Order</span>
                <p>{{ $user }}</p>
            </div>
            <div class="col text-right">
                <span class="text-muted">Order Number</span>
                <h4>#{{ $orderNumber }}</h4>
            </div>
        </div>

        <table class="table table-bordered" id="tableOrder">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td class="text-center">{{ $order->quantity }}</td>
                    <td class="text-left">
                        Rp. <span class="float-right">{{ number_format($order->product->price, 2, ',', '.') }}</span>
                    </td>
                    <td class="text-left">
                        Rp. <span class="float-right">{{ number_format($order->total, 2, ',', '.') }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="font-weight-bold">
                    <td colspan="4" class="text-right">Total</td>
                    <td>Rp. <span class="float-right">{{ number_format($total, 2, ',', '.') }}</span></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
