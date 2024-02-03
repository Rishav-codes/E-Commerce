@extends('admin.adminBase')

@section('content')
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col">
            <h1 class="display-6 fw-bold float-start">Insert Products</h1>
            <a href="{{ route('admin.product.index') }}" class="btn btn-success float-end mt-1">Go to Manage Product</a>
        </div>
    </div>
</div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <form action="{{ route('admin.product.insert') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" class="form-control" id="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="discount_price" class="form-label">Discount Price</label>
                                <input type="text" name="discount_price" class="form-control" id="discount_price"
                                    value="{{ old('discount_price') }}">
                                @error('discount_price')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="description"
                                    value="{{ old('description') }}">
                                @error('description')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    value="{{ old('image') }}">
                                @error('image')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="department_id" class="form-label">Select Department</label>
                                <select type="text" name="department_id" class="form-control" id="department_id">
                                    <option value="">Select Head Title</option>
                                    @foreach ($departments as $dep)
                                        <option value="{{ $dep->id }}">{{ $dep->dep_title }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <label class="form-label">IsAds</label>
                            <div class="mb-3 d-flex">
                                <input type="radio" name="isAds" class="form-check-input" value="0" checked> No
                                <input type="radio" name="isAds" class="form-check-input ml-3" value="1"> Yes
                                <input type="radio" name="isAds" class="form-check-input ml-3" value="2"> Other
                                @error('isAds')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input type="submit" class="btn btn-outline-primary w-100" value="Insert Product">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
