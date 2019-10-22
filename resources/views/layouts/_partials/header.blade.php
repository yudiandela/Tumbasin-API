<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tumbasin.id</title>

    <link rel="stylesheet" href="/css/bootwatch/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <header class="border-top border-primary">
        <div class="container my-4">
            <h1>
                <a href="{{ url('/') }}">
                    Tumbasin.<strong>id</strong>
                </a>
            </h1>
            <p class="text-muted">
                Mengantarkan bahan makanan dan kebutuhan sehari-hari dari Pasar ke depan pintu rumah Anda. <br> Belanja
                hari ini kami antar besok hari.
            </p>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary border py-3">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
                    aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor03">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">
                                <i class="mr-1 fas fa-home"></i>
                                {{ __('Beranda') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="https://documenter.getpostman.com/view/1379625/SVzubhDj"
                                class="nav-link">
                                <i class="mr-1 fas fa-book"></i>
                                {{ __('Dokumentasi API') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="mr-1 fas fa-ambulance"></i>
                                {{ __('Bantuan') }}
                                <i class="mr-1 fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg">
                                <a href="#" class="dropdown-item">
                                    <i class="mr-2 fas fa-question-circle"></i>
                                    {{ __('Faq') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="mr-2 fas fa-phone-alt"></i>
                                    {{ __('Hubungi Kami') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="mr-2 fas fa-exclamation-triangle"></i>
                                    {{ __('Tentang Kami') }}
                                </a>
                            </div>
                        </li>
                    </ul>

                    {{-- Navbar Kanan --}}
                    <ul class="navbar-nav ml-auto">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="mr-1 fas fa-user"></i>
                                {{ Auth::user()->name }}
                                <i class="mr-1 fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="#" class="dropdown-item">
                                    <i class="mr-2 fas fa-unlock-alt"></i>
                                    {{ __('Upgrade') }}
                                </a>
                                <a href="{{ route('dashboard.index') }}" class="dropdown-item">
                                    <i class="mr-2 fas fa-tachometer-alt"></i>
                                    {{ __('Panel') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                    <i class="mr-2 fas fa-sign-out-alt"></i>
                                    {{ __('Keluar') }}
                                </a>
                                <form hidden action="{{ route('logout') }}" method="post" id="logout">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="mr-1 fas fa-user"></i>
                                {{ __('Akun') }}
                                <i class="mr-1 fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="{{ route('login') }}" class="dropdown-item">
                                    <i class="mr-2 fas fa-sign-in-alt"></i>
                                    {{ __('Login') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('register') }}" class="dropdown-item">
                                    <i class="mr-2 fas fa-users"></i>
                                    {{ __('Register') }}
                                </a>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
