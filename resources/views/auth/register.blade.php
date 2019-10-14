@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Mendaftar akun baru</h3>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" name="name" required />
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" name="email" required />
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required />
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" required />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember"> <label for="remember">Ingat saya</label>
                    </div>

                    <button type="submit" class="mt-0 btn btn-primary">
                        <i class="mr-1 fas fa-user-plus"></i>
                        Proses Pendaftaran
                    </button>
                </form>
                <div class="mt-2">
                    Sudah punya akun ?
                    <a href="{{ route('login') }}">Masuk </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
