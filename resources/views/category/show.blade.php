@extends('layouts.main')

@section('content')
<h2>Menampilkan Detail Kategori {{ $category->name }}</h2>

{{ $category->name . " - " . $category->slug }}
<img src="{{ $category->image_url }}" alt="{{ $category->image }} Image" width="200">
@endsection
