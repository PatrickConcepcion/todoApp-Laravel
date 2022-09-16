<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
            <div class="container">
                <a class="navbar-brand m-0 p-0 d-flex align-items-center" href="{{ route('admin.home') }}">
                    <img class="logo" src="{{ url('images/logo.png') }}" alt="">
                    <p class="fs-4 d-inline m-0 ms-2 brand">ToDo</p>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                       

                        @if(Auth::guard('admin')->check());

                        <li class="nav-item text-end">
                            <a class="nav-link" href="{{ route('admin.home') }}">Dashboard</a>
                        </li>
                        
                        <li class="nav-item text-end">
                            <a class="nav-link" href="{{ route('admin.weatherapi.index') }}">Weather</a>
                        </li>

                        <li class="nav-item text-end">
                            <a class="nav-link" href="{{ route('admin.user.index') }}">User Management</a>
                        </li>

                        <li class="nav-item text-end ms-md-5">
                            <a class="nav-link">
                                    {{ Auth::guard('admin')->user()->name }}

                            </a>
                        </li> 
                            
                        <li class="nav-item text-end">
                            <a class="btn btn-outline-dark" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
                                Logout
                            </a>
                            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('components.messages')
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
