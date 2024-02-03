@extends('admin.adminBase')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-6 fw-bold">Manage Products ({{ $count = count($products) }})</h1>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('admin.product.insert') }}" class="btn btn-success">Insert Product</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Department Id</th>
                                <th>Department Name</th>
                                <th>isAds</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->title }}</td>
                                    <td class="text-truncate text-center" style="max-width: 150px">{{ $item->description }}
                                    </td>
                                    <td class="text-success text-center">Rs.{{ $item->discount_price }}/- <del
                                            class="text-danger small">Rs.{{ $item->price }}/-</del></td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded"
                                            width="50px" alt="{{ $item->title }}">
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Available</span>
                                        @else
                                            <span class="badge bg-danger">Out of stock</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->department_id }}</td>
                                    <td class="text-center">
                                        @foreach ($departments as $hd)
                                            @if ($item->department_id == $hd->id)
                                                {{ $hd->dep_title }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @if ($item->isAds == '0')
                                            <p>No</p>
                                        @elseif($item->isAds == '1')
                                            <p>Yes</p>
                                        @else
                                            <p>Other</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column flex-md-row">
                                            <a href="{{ route('admin.product.remove', $item->id) }}"
                                                class="btn btn-danger mb-1 me-md-1">X</a>
                                            <a href="#rock{{ $item->id }}" class="btn btn-info"
                                                data-bs-toggle="modal">Edit</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="rock{{ $item->id }}">

                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content bg-dark text-white">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Product - "{{ $item->title }}"
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card bg-dark text-white">
                                                                <div class="card-body">
                                                                    <form
                                                                        action="{{ route('admin.product.update', $item->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <!-- Form Fields -->
                                                                        <div class="mb-3">
                                                                            <label for="">Title</label>
                                                                            <input type="text" name="title"
                                                                                class="form-control"
                                                                                value="{{ $item->title }} ">
                                                                            @error('title')
                                                                                <p class="text-danger small">
                                                                                    {{ $message }}
                                                                                </p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Price</label>
                                                                            <input type="text" name="price"
                                                                                class="form-control"
                                                                                value="{{ $item->price }}">
                                                                            @error('price')
                                                                                <p class="text-danger small">
                                                                                    {{ $message }}
                                                                                </p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Discount Price</label>
                                                                            <input type="text" name="discount_price"
                                                                                class="form-control"
                                                                                value="{{ $item->discount_price }}">
                                                                            @error('discount_price')
                                                                                <p class="text-danger small">
                                                                                    {{ $message }}
                                                                                </p>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="">Description</label>
                                                                            <input type="text" name="description"
                                                                                class="form-control"
                                                                                value="{{ $item->description }}">
                                                                            @error('description')
                                                                                <p class="text-danger small">
                                                                                    {{ $message }}
                                                                                </p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Image</label>
                                                                            <input type="file" name="image"
                                                                                class="form-control"
                                                                                value="{{ $item->image }}">
                                                                            @error('image')
                                                                                <p class="text-danger small">
                                                                                    {{ $message }}
                                                                                </p>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="mb-4">
                                                                            <label for="">Select Department</label>

                                                                            <select type="text" name="department_id"
                                                                                class="form-control">
                                                                                <option value="">Select Head Title
                                                                                </option>
                                                                                @foreach ($departments as $dep)
                                                                                    <option value="{{ $dep->id }}">
                                                                                        {{ $dep->dep_title }}</option>
                                                                                @endforeach

                                                                            </select>
                                                                            @error('department_id')
                                                                                <p class="text-danger small">
                                                                                    {{ $message }}
                                                                                </p>
                                                                            @enderror
                                                                        </div>

                                                                        <label for="">IsAds</label>
                                                                        <div class="mb-3 d-flex">
                                                                            <input type="radio" name="isAds"
                                                                                class="form-check" value="0">No
                                                                            <input type="radio" name="isAds"
                                                                                class="form-check ms-3" value="1">
                                                                            Yes
                                                                            <input type="radio" name="isAds"
                                                                                class="form-check ms-3" value="2">
                                                                            Other
                                                                            @error('isAds')
                                                                                <p class="text-danger small">
                                                                                    {{ $message }}
                                                                                </p>
                                                                            @enderror
                                                                        </div>


                                                                        <!-- ... -->
                                                                        <div class="mb-3">
                                                                            <input type="submit"
                                                                                class="btn btn-primary w-100"
                                                                                value="Update Product">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
