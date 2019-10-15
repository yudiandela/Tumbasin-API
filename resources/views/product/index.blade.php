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
    <h2 class="d-inline">List All Products</h2>
    <a href="{{ route('product.create') }}" class="float-right btn btn-primary">
        <i class="mr-1 fas fa-plus"></i> Create a new Product
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (count($products) > 0)
        @foreach ($products as $product)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $product->name }}</td>
            <td class="align-middle">{{ $product->category->name }}</td>
            <td class="align-middle">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
            <td class="align-middle">{{ number_format($product->stock, 0, ',', '.') }}</td>
            <td><img src="{{ $product->image }}" alt="{{ $product->name }} Image" width="50"></td>
            <td class="align-middle">
                <a href="{{ route('product.show', $product->id)}}" class="btn btn-primary btn-sm">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('product.edit', $product->id)}}" class="btn btn-info btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('product.destroy', $product->id)}}" class="btn btn-danger btn-sm"
                    onclick="event.preventDefault(); document.getElementById('product-delete-{{ $product->slug }}').submit();">
                    <i class="fas fa-trash"></i>
                </a>
                <form id="product-delete-{{ $product->slug }}" hidden
                    action="{{ route('product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('delete')
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6" class="text-center">Tidak ada data disini</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
