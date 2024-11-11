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
        <header>
        </header>
        <main class="container-fluid" id="wrapper">
            <div class="row">
                <!-- <div class="col-auto min-vh-100 bg-dark">
                    <div class="pt-4 pb-1">
                        <a href="" class="text-decoration-none text-white">
                            <span class="d-none d-sm-inline text-white">side bar</span>
                        </a>
                    </div>
                    <hr class="text-white">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="" class="nav-link active">
                                <i class="bi bi-speedometer2 me-2"></i>
                                <span class="d-none d-sm-inline text-white">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link">
                                <i class="bi bi-calendar-event me-2 text-white"></i>
                                <span class="d-none d-sm-inline text-white">Events</span>
                            </a>
                            <ul class="collapse nav flex-column" id="submenu2" data-bs-parent="#menu">
                                <li>
                                    <a href="#" class="nav-link">
                                        <i class="bi bi-plus-lg"></i>
                                        <span class="d-none d-sm-inline">Add Event</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link">
                                        <i class="bi bi-plus-lg"></i>
                                        <span class="d-none d-sm-inline">Add Event</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="bi bi-speedometer2 me-2"></i>
                                <span class="d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="bi bi-speedometer2 me-2"></i>
                                <span class="d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div> -->
                <div class="col-auto col-md-3 col-xl-2 bg-dark text-white">
                    <div class="d-flex flex-column text-white min-vh-100">
                        <div class="pt-4 ps-2 d-flex justify-content-start">
                            <a href="#" class="text-decoration-none text-white">
                                <i class="fs-2 bi bi-calendar2-event me-2"></i>
                                <span class="d-none d-sm-inline text-white me-2 fs-2">EMS</span>
                            </a>
                        </div>
                        <hr>
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
                        <hr>
                        <div class="dropdown pb-4 pt-2 ps-3">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle h5 me-2"></i>
                                <span class="d-none d-sm-inline">Admin</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
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