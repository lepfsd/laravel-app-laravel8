<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : ''}}"><a class="nav-link" href="{{ route('home') }}">home</a></li>
                        <li class="nav-item {{ request()->routeIs('about') ? 'active' : ''}}"><a class="nav-link" href="{{ route('about') }}">about</a></li>
                        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : ''}}"><a class="nav-link" href="{{ route('contact') }}">contact</a></li>
                        <li class="nav-item {{ request()->routeIs('portfolio') ? 'active' : ''}}"><a class="nav-link" href="{{ route('portfolio.index') }}">portfolio</a></li>
                        <li class="nav-item {{ request()->routeIs('messages.index') ? 'active' : ''}}"><a class="nav-link" href="{{ route('messages.index') }}">messages</a></li>
                        @if(@auth()->user()->role == 'admin')
                            <li class="nav-item {{ request()->routeIs('users') ? 'active' : ''}}"><a class="nav-link" href="{{ route('users.index') }}">users</a></li>
                        @endif
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <ul class="dropdown-menu">
                                        <li class="item"><a class="text-decoration-none" href="#">Home</a></li>
                                        <li class="item" ><a href="#">Portfolio</a></li>
                                        <li class="item" ><a class="text-decoration-none" href="#">About</a></li>
                                        <li class="item" ><a class="text-decoration-none" href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            @include('partials.session-status')<br>
            @yield('content')
        </main>

        <footer class="bg-white text-center text-black-50 py-3 shadow">
                {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>
    </div>
</body>
</html>
