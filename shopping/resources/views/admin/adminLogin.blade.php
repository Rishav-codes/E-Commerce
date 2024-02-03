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
                        <a class=" btn btn-outline-danger " aria-current="page" href="">Logout</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h4 text-center">Admin Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('adminlogin') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter email"
                                    value="{{ old('email') }}" class="form-control">
                                @error('email')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter password"
                                    value="{{ old('password') }}" class="form-control">
                                @error('password')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Login" class="btn btn-success w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






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
