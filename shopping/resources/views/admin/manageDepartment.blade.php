@extends('admin.adminBase')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col">
                <h1 class="display-6 fw-bold float-start">
                    Manage Departments ({{ $count = count($totalDep) }})
                </h1>
                <a href="#rock" class="btn btn-success float-end" data-bs-toggle="modal">Insert Department</a>

                {{-- Modal --}}
                <div class="modal fade" id="rock">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header bg-dark text-light">Insert Department</div>
                            <div class="modal-body">
                                <div class="card bg-dark text-white">
                                    <div class="card-body">
                                        <form action="{{ route('admin.manageDepartment') }}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="dep_title" class="text-light">Department Title</label>
                                                <input type="text" name="dep_title" id="dep_title"
                                                    class="form-control text-dark" placeholder="Enter Department title">
                                                @error('dep_title')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <select type="text" name="head_id" class="form-control">

                                                    <option value="">Select Head Title</option>
                                                    @foreach ($heads as $dep)
                                                        <option value="{{ $dep->id }}">{{ $dep->head_title }}</option>
                                                    @endforeach

                                                </select>
                                                @error('head_id')
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Department's title</th>
                            <th>Head id</th>
                            <th>Head Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($departments as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->dep_title }}</td>
                                <td>{{ $item->head_id }} </td>
                                <td>
                                    @foreach ($heads as $hd)
                                        @if ($item->head_id == $hd->id)
                                            {{ $hd->head_title }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.removeDepartment', $item->id) }}" class="btn btn-danger">X</a>

                                    <a href="#rock{{ $item->id }}" class="btn btn-info" data-bs-toggle="modal">Edit</a>

                                    {{-- modal --}}
                                    <div class="modal fade" id="rock{{ $item->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-dark">
                                                <div class="modal-header">Edit {{ $item->dep_title }} Department</div>
                                                <div class="modal-body">
                                                    <div class="card bg-dark text-white">
                                                        <div class="card-body">
                                                            <form action="{{ route('admin.updateDepartment', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="dep_title">Department Title</label>
                                                                    <input type="text" name="dep_title"
                                                                        class="form-control"
                                                                        value="{{ $item->dep_title }}">
                                                                    @error('dep_title')
                                                                        <p class="text-danger small">{{ $message }}</p>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <select name="head_id" class="form-control">
                                                                        <option value="">Select Head Title</option>
                                                                        @foreach ($heads as $dep)
                                                                            <option value="{{ $dep->id }}"
                                                                                {{ $dep->id == $item->head_id ? 'selected' : '' }}>
                                                                                {{ $dep->head_title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('head_id')
                                                                        <p class="text-danger small">{{ $message }}</p>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="submit" class="btn btn-primary w-100"
                                                                        value="Update Department">
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

                    {{ $departments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
