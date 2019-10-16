@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 text-center">
        <div class="card">
            <div class="card-body">
                <h2 class="font-weight-bold">Selamat Datang</h2>
                Halaman depan {{ config('app.name') }}
            </div>
        </div>
    </div>
</div>
@endsection
