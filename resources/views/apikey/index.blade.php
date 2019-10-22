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

<h2>Api Key</h2>
<hr>
<p>
    Gunakan API Key ini untuk menggunakan API {{ config('app.name') }}.
    <br>
    Untuk informasi lebih lanjut mengenai cara menggunakan API
    {{ config('app.name') }}, silakan baca
    <a href="https://documenter.getpostman.com/view/1379625/SVtZtk91">
        Dokumentasi API
    </a>.
</p>

<div class="border-top border-bottom text-center text-danger py-5">
    <h4>
        <span class="border p-2">
            {{ Auth::user()->api_token }}
        </span>
    </h4>
    <div class="text-warning">
        <strong>Peringatan:</strong>
        API key Anda berfungsi layaknya username dan password. Jaga baik-baik API key Anda!
    </div>
</div>

<div class="mt-3">
    <div class="text-primary"><strong>Tips:</strong></div>
    Jika Anda merasa API Key Anda sudah diketahui orang lain, silakan ubah API Key dengan tombol di bawah.
    <br>
    <a href="{{ route('apikey.update') }}" class="btn btn-primary"
        onclick="event.preventDefault(); document.getElementById('update-key').submit();">
        Ubah Api Key
    </a>
    <form id="update-key" action="{{ route('apikey.update') }}" method="POST">
        @csrf
        @method('put')
    </form>
</div>
@endsection
