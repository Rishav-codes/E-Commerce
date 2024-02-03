<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <style>
        .cardup {
            transition: transform 0.4s ease;
        }

        .cardup:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body style="background-color: rgb(236, 236, 236)">

    <nav class="navbar navbar-expand-lg sticky-top navbar-white  bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand text-primary fw-bold" href="{{ route('home.home') }}">{{ env('APP_NAME') }}</a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                More <span class="navbar-toggler-icon small"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">

                @if (route('login') && route('signup'))
                @else
                    <form class="d-flex mx-auto w-50" role="search">
                        <input class="form-control rounded-0 bordered border-primary" name="search" type="search"
                            placeholder="Search products,brands and more" aria-label="Search">
                        <button class="btn btn-primary text-light rounded-0 text-dark " type="submit">Search</button>
                    </form>
                @endif


                <ul class="navbar-nav  ms-auto navbar-nav-scroll" style="--bs-scroll-height: 100px;">


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home.home') }}">Home</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-capitalize" aria-current="page"
                                href="">{{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('cart') }}">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('myorder') }}">My Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endauth


                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('signup') }}">Create an account</a>
                        </li>
                    @endguest




                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Help
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href=""> <i class="bi bi-headset"></i> 24x7 customer
                                    care</a></li>
                            <li><a class="dropdown-item" href=""><i class="bi bi-badge-ad"></i> Advertisement</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href=""><i class="bi bi-download"></i> Download App</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



    @section('content')

    @show


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        toastr.options = {
            'closeButton': true
        }
        @if (session('success'))
            toastr.success("<?= session('success') ?>")
        @endif
        @if (session('error'))
            toastr.error("<?= session('error') ?>")
        @endif
    </script>


</body>

</html>
