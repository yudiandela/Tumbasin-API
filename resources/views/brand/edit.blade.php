@extends('layouts.back')

@section('content')
<h2>Edit a Brand</h2>
<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col mb-3">
                        <label for="name">Brand Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') ?: $brand->name }}" required />
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col mb-3">
                        <label>File Image</label>
                        <small>jpg,jpeg,png</small>
                        <div class="custom-file">
                            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg"
                                class="custom-file-input @error('image') is-invalid @enderror" id="image" required>
                            <label class="custom-file-label" for="image">Pilih file...</label>
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <button class="btn btn-primary btn-block" type="submit">Add Brand</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
