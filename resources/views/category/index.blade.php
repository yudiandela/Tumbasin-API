@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2>Data Kategori</h2>
    <a href="{{ route('category.create') }}" class="btn btn-primary">New Category</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></td>
            <td>{{ $category->slug }}</td>
            <td class="text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('category.edit', $category->id) }}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline">
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
