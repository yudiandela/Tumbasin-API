@extends('layouts.main')

@section('content')

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card mb-5">

        <div class="card-header">
            <h2>Tambah Product</h2>
        </div>

        <div class="card-body">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Product Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror" id="description"
                            rows="5">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <select name="category_id" class="custom-select">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input name="image" type="file"
                                    class="form-control-file @error('image') is-invalid @enderror" id="image"
                                    aria-describedby="fileHelp">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="text" name="price"
                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror"
                                    id="unit" value="{{ old('unit') }}">
                                @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" name="stock"
                                    class="form-control @error('stock') is-invalid @enderror" id="stock"
                                    value="{{ old('stock') }}">
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary float-right" type="submit">Masukkan Data</button>
        </div>
    </div>
</form>
@endsection
