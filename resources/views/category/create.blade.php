@extends('layouts.main')

@section('content')
<h2>Masukkan data kategori baru</h2>
<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Nama kategori" value="{{ old('name') }}" />
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
