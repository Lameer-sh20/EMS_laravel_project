<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'EMS Admin')</title>

    <link rel="icon" href="{{ asset('ems.png') }}">

    <!-- Jquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand mx-2" href="#">
                    <i class="fs-2 bi bi-calendar2-event me-2 text-white"></i>
                    <span class="d-none d-sm-inline text-white me-2 fs-2">EMS</span>
                </a>
                <button class="navbar-toggler border " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="bi bi-list text-white h3"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                        <li class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-person"></i>
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
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container-fluid" id="wrapper">
            <div class="row">
                <div class="col-auto col-md-3 col-xl-2 bg-dark text-white">
                    <div class="d-flex flex-column text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link align-start text-white">
                                    <i class="fs-4 bi-house me-2"></i>
                                    <span class="ms-1 d-none d-sm-inline">Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view_events')}}" class="nav-link align-start text-white">
                                    <i class="fs-4 bi-table me-2"></i>
                                    <span class="ms-1 d-none d-sm-inline">Events</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('new_event')}}" class="nav-link align-start text-white">
                                    <i class="fs-4 bi bi-plus-square me-2"></i>
                                    <span class="ms-1 d-none d-sm-inline">Add Events</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <i class="fs-4 bi bi-bookmark-plus me-2"></i>
                                    <span class="ms-1 d-none d-sm-inline">Tickets</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <i class="fs-4 fs-4 bi-people me-2"></i>
                                    <span class="ms-1 d-none d-sm-inline">Customers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
        </footer>
    </div>
    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>