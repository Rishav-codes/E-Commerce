@extends('admin.adminBase')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col">
                <h1 class="display-6 fw-bold">
                    Manage Head ({{ $count = count($heads) }})
                </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-3 mt-lg-0">
                <div class="card bg-dark">
                    <div class="card-body">
                        <form action="{{ route('admin.manageHead') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="text-light">Head Title</label>
                                <input type="text" name="head_title" class="form-control" placeholder="Enter head title">
                                @error('head_title')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Head category title</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($heads as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->head_title }}</td>
                                <td>
                                    <a href="{{ route('admin.removeHead', $item->id) }}" class="btn btn-danger">X</a>

                                    <a href="#rock{{ $item->id }}" class="btn btn-info" data-bs-toggle="modal">Edit</a>

                                    {{-- modal --}}
                                    <div class="modal fade" id="rock{{ $item->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-dark">
                                                <div class="modal-header ">Edit {{ $item->head_title }} Head</div>
                                                <div class="modal-body">
                                                    <div class="card bg-dark text-white ">
                                                        <div class="card-body">
                                                            <form action="{{ route('admin.updateHead', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="">Head Title</label>
                                                                    <input type="text" name="head_title"
                                                                        class="form-control"
                                                                        value="{{ $item->head_title }}">
                                                                    @error('head_title')
                                                                        <p class="text-danger small">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3 ">
                                                                    <input type="submit" class="btn btn-primary w-100"
                                                                        value="Update Head">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- 1 --}}
