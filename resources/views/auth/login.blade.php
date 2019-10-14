@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Masuk ke Akun Anda</h3>
                <form action="{{ route('login') }}" method="post">
                    @csrf
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
                        <input type="checkbox" name="remember" id="remember"> <label for="remember">Ingat saya</label>
                    </div>

                    <button type="submit" class="mt-0 btn btn-primary">
                        <i class="mr-1 fas fa-sign-in-alt"></i>
                        Proses Login
                    </button>
                </form>
                <div class="mt-2">
                    Belum punya akun ?
                    <a href="{{ route('register') }}">Daftar </a> |
                    <a href="{{ route('password.request') }}">Lupa Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
