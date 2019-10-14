@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Verifikasi email') }}</h2>
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Tautan verifikasi baru telah dikirim ke alamat email anda.') }}
                    </div>
                    @endif

                    {{ __('Sebelum melanjutkan, silakan periksa email anda untuk tautan verifikasi.') }}<br />
                    {{ __('Jika anda tidak menerima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini untuk meminta yang lain') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
