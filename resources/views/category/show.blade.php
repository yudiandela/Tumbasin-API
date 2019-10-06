@extends('layouts.main')

@section('content')
<h2>Detail Kategori</h2>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <img src="{{ $category->image_url }}" class="mr-3" alt="{{ $category->image }} Image" width="120">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $category->name }}</h5>
                        {{ $category->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
