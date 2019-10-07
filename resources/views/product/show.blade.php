@extends('layouts.main')

@section('content')
<h2>Detail Kategori</h2>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <img src="{{ $product->image_url }}" class="mr-3" alt="{{ $product->image }} Image" width="120">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $product->name }}</h5>
                        {{ $product->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
