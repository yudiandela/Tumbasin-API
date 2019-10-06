@extends('layouts.main')

@section('content')
<h2>Edit {{ $category->name }}</h2>
<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="text" name="name" placeholder="Nama kategori" value="{{ old('name') ?: $category->name }}" />
    @error('name')
    {{ $message }}
    @enderror

    <input type="file" name="image" />
    @error('image')
    {{ $message }}
    @enderror

    <button type="submit">Submit</button>
</form>
@endsection
