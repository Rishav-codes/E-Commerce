@extends('home.base')


@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <a href="{{ route('home.ViewDep', $departments->id) }}" class="text-capitalise h1 text-decoration-none">{{ $departments->dep_title }}</a>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        @foreach ($departments->products as $pro)
            <div class="col mt-3">
                <a href="{{ route('home.viewProduct', $pro->id) }}" class="text-decoration-none">
                    <div class="card cardup bordered border-0">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $pro->image) }}" class="card-img-top" alt="{{ $pro->title }}">
                            <span>
                                <h4 class="h5 text-truncate mt-2">{{ $pro->title }}</h4>
                                @if ($departments->id == $pro->department_id)
                                    <span class="badge bg-success float-end">{{ $departments->dep_title }}</span>
                                @endif
                            </span>
                            <h4 class="h6 text-success">Rs.{{ $pro->discount_price }}/- <del class="text-muted small">Rs.{{ $pro->price }}/-</del></h4>
                            <p class="small text-truncate">{{ $pro->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection
