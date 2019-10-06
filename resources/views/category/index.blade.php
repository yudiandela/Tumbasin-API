@extends('layouts.main')

@section('content')
<h2>Seluruh Data Kategori</h2>
@foreach ($categories as $category)
<li>
    <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
    <a href="{{ route('category.edit', $category->id) }}">Edit</a>
    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>
</li>
@endforeach
@endsection
