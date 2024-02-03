@extends('home.base')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card bg-success text-light">
                    <div class="card-body">
                        <h3 class="h3 text-center">Your Order is placed successfully!!!</h3>
                        <p class="text-center"><a href="{{ route('home.home') }}" class="text-light">Back to home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
