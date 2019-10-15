@extends('layouts.back')

@section('content')
<div class="mb-2">
    <h2 class="d-inline">Detail Product</h2>
    <a href="{{ route('product.create') }}" class="float-right btn btn-primary">
        <i class="mr-1 fas fa-plus"></i> Create a new Product
    </a>
</div>
<hr>
<div class="row">
    <div class="col-md-4 text-center">
        <div class="card-deck">
            <div class="card">
                <img src="{{ $product->image }}" class="card-img-top" alt="Image {{ $product->image }}">
            </div>
        </div>
        <div class="text-muted">
            <h4 class="mt-2 font-weight-bold"></h4>
            <p></p>
        </div>
    </div>
    <div class="col-md-8">
        <div class="col-md-12">
            <h2>{{ $product->name }}</h2>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h6>Category</h6>
                {{ $product->category->name }}
            </li>
            <li class="list-group-item">
                <h6>Stock</h6>
                {{ ($product->stock > 0) ? 'Ready' : '' }}
            </li>
            <li class="list-group-item">
                <h6>Price</h6>
                {{ 'Rp. ' . number_format($product->price, 2, ',', '.') }}
            </li>
            <li class="list-group-item">
                <h6>Product Description</h6>
                {{ $product->short_description }}
            </li>
        </ul>
    </div>
</div>
@endsection
