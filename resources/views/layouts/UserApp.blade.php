<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Welcome to EMS')</title>
    <link rel="icon" href="{{ asset('ems.png') }}">
    <!-- Jquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            font-family: "Barlow Semi Condensed", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-black">
            <div class="container-fluid">
                <a class="navbar-brand mx-2" href="#">
                    <img src="{{ asset('ems.png') }}" alt="Glazed" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav fs-5">
                        <li class="nav-item mx-2">
                            <a href="{{route('home')}}#about" class="nav-link text-white">About</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="{{route('home')}}" class="nav-link text-white">Events</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="#" class="nav-link text-white">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto fs-5 ">
                        <li class="nav-item mx-2">
                            <a href="#" class="nav-link text-white"><i class="bi bi-person"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer class="text-center text-lg-start text-white bg-secondary">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            EMS
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Events</h6>
                        <p>
                            <a class="text-white">...</a>
                        </p>
                        <p>
                            <a class="text-white">...</a>
                        </p>
                        <p>
                            <a class="text-white">...</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="fas fa-home mr-3"></i> Jeddah, Saudi Arabia</p>
                        <p><i class="fas fa-envelope mr-3"></i> ems@email.com</p>
                        <p><i class="fas fa-phone mr-3"></i> +000 0000000</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                        <!-- Instagram -->
                        <a
                            class="btn btn-primary btn-floating m-1 rounded-circle"
                            style="background-color: #ac2bac"
                            href="#"
                            role="button"><i class="bi bi-instagram text-white"></i></a>

                        <!-- Linkedin -->
                        <a
                            class="btn btn-primary btn-floating m-1 rounded-circle"
                            style="background-color: #0082ca"
                            href="#"><i class="bi bi-linkedin text-white"></i></a>

                        <!-- X -->
                        <a
                            class="btn btn-dark btn-floating m-1 rounded-circle"
                            href="#"><i class="bi bi-twitter-x text-white"></i></a>
                    </div>
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <hr>
        <div class="text-center pb-3">
            <a class="text-white" href="#"></a>
        </div>
    </footer>
</body>

</html>