@extends('home.base')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Blade File (home.myOrder) -->
            @if ($orders->count() > 0)
                <div class="col-7">
                    @foreach ($orders as $order)
                        <div class="card">
                            <div class="card-header">
                                <span class="float-start">
                                    Order Id : {{ $order->id }}
                                </span>
                            </div>
                            <div class="card-body">
                                @foreach ($order->orderItem as $item)
                                    <div class="card mt-1">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                                        alt="" class="w-100">
                                                </div>
                                                <div class="col-10">
                                                    <h2 class="h5">{{ $item->product->title }}</h2>
                                                    <div class="container">
                                                        <h6 class="text-success">
                                                            Rs.{{ $item->product->discount_price * $item->qty }}/-
                                                            <del
                                                                class="text-danger small">Rs.{{ $item->product->price * $item->qty }}/-</del>
                                                        </h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <span> Qty : {{ $item->qty }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <span class="small">{{ date('D d-M-Y h:i:s A', strtotime($order->updated_at)) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-7">
                    {{-- No orders message or other content --}}
                    <p>No orders found.</p>
                </div>
            @endif

        </div>


    </div>
@endsection
