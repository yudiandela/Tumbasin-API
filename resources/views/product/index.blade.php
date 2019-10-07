@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2>Data Product</h2>
    <a href="{{ route('product.create') }}" class="btn btn-primary">New Product</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Unit</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ $product->image_url }}" alt="{{ $product->title }}" width="20" class="mr-2">
                <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
            </td>
            <td><a href="{{ '/category/' . $product->category->id }}">{{ $product->category->name }}</a></td>
            <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
            <td>{{ $product->unit }}</td>
            <td class="text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('product.edit', $product->id) }}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
