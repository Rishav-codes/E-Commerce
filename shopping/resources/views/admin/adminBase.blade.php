<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | {{ env('APP_NAME') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<body style="background-color: rgb(128, 128, 128)">

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark ">
        <div class="container">
            <a class="navbar-brand text-primary fw-bold" href="{{ route('admin.dashboard') }}">Admin Panel |
                {{ env('APP_NAME') }}</a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav  ms-auto navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class=" btn btn-outline-danger " aria-current="page"
                            href="{{ route('adminlogout') }}">Logout</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarScrolls"
                aria-controls="navbarScrolls" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarScrolls" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">😏 Hello Admin
                        😁
                        </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="{{ route('admin.manageHead') }}">Manage Head</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="{{ route('admin.manageDepartment') }}">Manage Departments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="{{ route('admin.product.index') }}">Manage Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="{{ route('admin.product.insert') }}">Insert Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="{{ route('admin.cart.index') }}">Manage Carts</a>
                        </li>
                    </ul>
                </div>
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
