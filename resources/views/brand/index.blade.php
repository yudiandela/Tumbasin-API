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
    <h2 class="d-inline">List All Brand</h2>
    <a href="{{ route('brand.create') }}" class="float-right btn btn-primary">
        <i class="mr-1 fas fa-plus"></i> Create a new Brand
    </a>
</div>
<table class="table datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (count($brands) > 0)
        @foreach ($brands as $brand)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $brand->name }}</td>
            <td><img src="{{ $brand->image }}" alt="{{ $brand->name }} Image" width="50"></td>
            <td class="align-middle">
                <a href="{{ route('brand.edit', $brand->id)}}" class="btn btn-info btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('brand.destroy', $brand->id)}}" class="btn btn-danger btn-sm"
                    onclick="event.preventDefault(); document.getElementById('brand-delete-{{ $brand->slug }}').submit();">
                    <i class="fas fa-trash"></i>
                </a>
                <form id="brand-delete-{{ $brand->slug }}" hidden action="{{ route('brand.destroy', $brand->id) }}"
                    method="post">
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
