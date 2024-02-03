@extends('home.base')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="{{ route('home.viewHead', $heads->id) }}"
                    class="text-capitalise h1 text-decoration-none">{{ $heads->head_title }}</a>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach ($departments as $dep)
            @if ($heads->id == $dep->head_id)
                <div class="container my-5">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('home.ViewDep', $dep->id) }}"
                                class="text-capitalise h4 text-decoration-none">{{ $dep->dep_title }}</a>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                        @foreach ($dep->products as $pro)
                            <div class="col mt-3">
                                <a href="{{ route('home.viewProduct', $pro->id) }}" class="text-decoration-none">
                                    <div class="card cardup bordered border-0">
                                        <div class="card-body">
                                            <img src="{{ asset('storage/' . $pro->image) }}" class="card-img-top"
                                                alt="{{ $pro->title }}">
                                            <span>
                                                <h4 class="h5 text-truncate mt-2">{{ $pro->title }}</h4>
                                                @if ($dep->id == $pro->department_id)
                                                    <span class="badge bg-success float-end">{{ $dep->dep_title }}</span>
                                                @endif
                                            </span>
                                            <h4 class="h6 text-success">Rs.{{ $pro->discount_price }}/- <del
                                                    class="text-muted small">Rs.{{ $pro->price }}/-</del></h4>
                                            <p class="small text-truncate">{{ $pro->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
