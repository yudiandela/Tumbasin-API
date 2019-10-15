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
    <h2 class="d-inline">List All Category</h2>
    <a href="{{ route('category.create') }}" class="float-right btn btn-primary">
        <i class="mr-1 fas fa-plus"></i> Create a new Category
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (count($categories) > 0)
        @foreach ($categories as $category)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $category->name }}</td>
            <td><img src="{{ $category->image }}" alt="{{ $category->name }} Image" width="50"></td>
            <td class="align-middle">
                <a href="{{ route('category.edit', $category->id)}}" class="btn btn-info btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('category.destroy', $category->id)}}" class="btn btn-danger btn-sm"
                    onclick="event.preventDefault(); document.getElementById('category-delete-{{ $category->slug }}').submit();">
                    <i class="fas fa-trash"></i>
                </a>
                <form id="category-delete-{{ $category->slug }}" hidden
                    action="{{ route('category.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4" class="text-center">Tidak ada data disini</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
