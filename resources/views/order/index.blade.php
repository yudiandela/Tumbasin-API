@extends('layouts.back')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('success') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="mb-2">
    <h2 class="d-inline">List Order</h2>
    <a href="{{ route('order.create') }}" class="float-right btn btn-primary">
        <i class="mr-1 fas fa-plus"></i> Create a new Order
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Number</th>
            <th>User</th>
            <th>Product</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Status</th>
            <th class="text-center">Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (count($orders) > 0)
        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('order.byOrderNumber', $order->order_number) }}">{{ $order->order_number }}</a></td>
            <td>{{ $order->user->name }}</td>
            <td>
                <a href="{{ route('order.showByProduct', $order->product->id) }}">
                    {{ $order->product->name }}
                </a>
            </td>
            <td class="text-center">{{ $order->quantity }}</td>
            <td class="text-center">
                <a href="{{ route('order.getByStatus', $order->status) }}">
                    {!! $order->status_order !!}
                </a>
            </td>
            <td class="text-center">{{ $order->create_date }}</td>
            <td>
                <div class="d-inline dropdown">
                    @if ($order->status != 4)
                    <button class="btn btn-sm btn-danger dropdown-toggle" id="dLabel{{ $order->order_number }}"
                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel{{ $order->order_number }}">
                        <a class="dropdown-item text-danger" href="{{ route('order.destroy', $order->id) }}"
                            onclick="event.preventDefault(); document.getElementById('destroy-order-{{ $order->id }}').submit();">
                            <i class="mr-1 fas fa-times-circle"></i>
                            Delete
                        </a>

                        <form id="destroy-order-{{ $order->id }}" hidden action="{{ route('order.destroy', $order->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        </form>

                        <div class="dropdown-divider"></div>

                        @if ($order->status !== 0)
                        <a class="dropdown-item text-danger" href="{{ route('order.change.status', $order->id) }}"
                            onclick="event.preventDefault(); document.getElementById('cancel-order-{{ $order->id }}').submit();">
                            <i class="mr-1 fas fa-times"></i>
                            Cancel
                        </a>

                        <form id="cancel-order-{{ $order->id }}" hidden action="{{ route('order.change.status', $order->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="0">
                        </form>
                        @endif

                        @if ($order->status < 1)
                        <a class="dropdown-item text-info" href="{{ route('order.change.status', $order->id) }}"
                            onclick="event.preventDefault(); document.getElementById('process-order-{{ $order->id }}').submit();">
                            <i class="mr-1 fas fa-share"></i>
                            Proses
                        </a>

                        <form id="process-order-{{ $order->id }}" hidden action="{{ route('order.change.status', $order->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="1">
                        </form>
                        @endif

                        @if ($order->status < 2)
                        <a class="dropdown-item text-primary" href="{{ route('order.change.status', $order->id) }}"
                            onclick="event.preventDefault(); document.getElementById('ongoing-order-{{ $order->id }}').submit();">
                            <i class="mr-1 fas fa-shopping-basket"></i>
                            Ongoing
                        </a>

                        <form id="ongoing-order-{{ $order->id }}" hidden action="{{ route('order.change.status', $order->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="2">
                        </form>
                        @endif

                        @if ($order->status < 3)
                        <a class="dropdown-item text-warning" href="{{ route('order.change.status', $order->id) }}"
                            onclick="event.preventDefault(); document.getElementById('delivery-order-{{ $order->id }}').submit();">
                            <i class="mr-1 fas fa-truck"></i>
                            Delivery
                        </a>

                        <form id="delivery-order-{{ $order->id }}" hidden action="{{ route('order.change.status', $order->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="3">
                        </form>
                        @endif

                        <a class="dropdown-item text-success" href="{{ route('order.change.status', $order->id) }}"
                            onclick="event.preventDefault(); document.getElementById('complete-order-{{ $order->id }}').submit();">
                            <i class="mr-1 fas fa-thumbs-up"></i>
                            Complete
                        </a>

                        <form id="complete-order-{{ $order->id }}" hidden action="{{ route('order.change.status', $order->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="4">
                        </form>
                    </div>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7" class="text-center">Tidak ada data disini</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
