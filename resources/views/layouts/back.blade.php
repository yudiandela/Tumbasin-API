@include('layouts._partials.header')

<div class="container my-4">
    <div class="row">
        <div class="col-md-3">
            @include('layouts._partials.sidenav')
        </div>

        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts._partials.footer')
