@extends('layouts.back')

@section('content')
<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    <h2>Edit a Product</h2>

    <div class="card">
        <div class="card-body">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Product Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" value="{{ old('name') ?: $product->name }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label><span class="text-danger">*</span>
                        <textarea type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror" id="description" rows="5"
                            required>{{ old('description') ?: $product->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label><span class="text-danger">*</span>
                                <select name="category_id" class="custom-select">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="brand">Brand</label><span class="text-danger">*</span>
                                <select name="brand_id" class="custom-select">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ old('brand_id') == $brand->id ? 'selected' : $product->brand_id == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>File Image</label>
                            <small>jpg,jpeg,png</small>
                            <div class="custom-file">
                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg"
                                    class="custom-file-input @error('image') is-invalid @enderror" id="image">
                                <label class="custom-file-label" for="image">Pilih file...</label>
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Price</label><span class="text-danger">*</span>
                                <input type="text" name="price"
                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                    value="{{ old('price') ?: $product->price }}" required>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit">Unit</label><span class="text-danger">*</span>
                                <small>pcs, box</small>
                                <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror"
                                    id="unit" value="{{ old('unit') ?: $product->unit }}" required>
                                @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock">Stock</label><span class="text-danger">*</span>
                                <input type="text" name="stock"
                                    class="form-control @error('stock') is-invalid @enderror" id="stock"
                                    value="{{ old('stock') ?: $product->stock }}" required>
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="weight">Weight</label><span class="text-danger">*</span>
                                <input type="text" name="weight"
                                    class="form-control @error('weight') is-invalid @enderror" id="weight"
                                    value="{{ old('weight') ?: $product->weight }}" required>
                                @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="length">Length</label><span class="text-danger">*</span>
                                <input type="text" name="length"
                                    class="form-control @error('length') is-invalid @enderror" id="length"
                                    value="{{ old('length') ?: $product->length }}" required>
                                @error('length')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="width">Width</label><span class="text-danger">*</span>
                                <input type="text" name="width"
                                    class="form-control @error('width') is-invalid @enderror" id="width"
                                    value="{{ old('width') ?: $product->width }}" required>
                                @error('width')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="height">Height</label><span class="text-danger">*</span>
                                <input type="text" name="height"
                                    class="form-control @error('height') is-invalid @enderror" id="height"
                                    value="{{ old('height') ?: $product->height }}" required>
                                @error('height')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <button class="mt-2 btn btn-primary float-right" type="submit">Simpan Perubahan Data</button>
</form>
@endsection
