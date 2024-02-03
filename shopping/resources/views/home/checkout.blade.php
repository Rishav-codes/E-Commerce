@extends('home.base')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div>Enter Address details</div>
                        {{-- <div class="text-danger">(* required field)</div> --}}
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf

                            <div class="mb-3 d-flex">
                                <div class="text-danger">Note :- ( * is a required field that is a must to fill. )
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" name="fullname" value="{{ old('fullname') }}"
                                            class="form-control">
                                        @error('fullname')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="alt_conact">Alternative Contact</label>
                                        <input type="text" name="alt_conact" value="{{ old('alt_conact') }}"
                                            class="form-control">
                                        @error('alt_conact')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="landmark">Landmark <span class="text-danger">*</span></label>
                                        <input type="text" name="landmark" value="{{ old('landmark') }}"
                                            class="form-control">
                                        @error('landmark')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="street_name">Street Name <span class="text-danger">*</span></label>
                                        <input type="text" name="street_name" value="{{ old('street_name') }}"
                                            class="form-control">
                                        @error('street_name')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="area">Area <span class="text-danger">*</span></label>
                                        <input type="text" name="area" value="{{ old('area') }}" class="form-control">
                                        @error('area')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="pincode">Pincode <span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" value="{{ old('pincode') }}"
                                            class="form-control">
                                        @error('pincode')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="city">City <span class="text-danger">*</span></label>
                                        <select type="text" name="city" value="{{ old('city') }}" class="form-control">
                                            <option value="">Select City</option>
                                            <option value="purnea">Purnea</option>
                                            <option value="patna">Patna</option>
                                            <option value="bhagalpur">Bhagalpur</option>
                                        </select>
                                        @error('city')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="state">State <span class="text-danger">*</span></label>
                                        <select type="text" name="state" value="{{ old('state') }}"
                                            class="form-control">
                                            <option value="">Select State</option>
                                            <option value="Bihar">Bihar</option>
                                        </select>
                                        @error('state')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="type">Type</label> <br>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="type" value="o" class="form-check-input">
                                            <label class="form-check-label">Office</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="type" checked value="h" class="form-check-input">
                                            <label class="form-check-label">Home</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <input type="submit" value="Save Address" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Checked Address Section -->
            <div class="col-md-4 mt-3 mt-md-0">
                <form action="{{ route('payment') }}" method="post">
                    @csrf
                    <div class="grid">
                        @foreach ($addresses as $add)
                            <label class="card">
                                <input name="address_id" class="radio" type="radio" value="{{ $add->id }}" checked>
                                <span class="plan-details">
                                    <span class="plan-type">
                                        {{ $add->type === 'o' ? 'Office' : ($add->type === 'h' ? 'Home' : 'Unknown') }}
                                    </span>
                                    <span class="plan-cost">{{ $add->fullname }}</span>
                                    <span>
                                        {{ $add->street_name }} | {{ $add->area }}, <br>
                                        {{ $add->landmark }} |{{ $add->city }} ,<br>
                                        {{ $add->pincode }} | ({{ $add->state }})
                                    </span>
                                </span>
                            </label>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        <input type="submit" class="btn btn-primary btn-lg w-100" value="Make payment">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


