@extends('layouts.app')

@section('title', 'Manage Regency Data')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Flash Message -->
        @include('partials.flash')

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-center mb-0">
                <div class="head-label">
                    <h5 class="card-title mb-0">Regency Data</h5>
                </div>
            </div>

            <div class="group-action">
                <div class="d-flex justify-content-between flex-column flex-md-row align-items-center pb-5">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('admin.cities.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-icon">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                        <a href="/admin/cities" class="btn btn-icon btn-secondary ms-2">
                            <i class="bx bx-refresh"></i>
                        </a>
                    </div>
                    <div class="pt-5 pt-md-0">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="tabledt" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($cities as $key => $city)
                            <tr>
                                <td>{{ $key + $cities->firstItem() }}</td>
                                <td>{{ $city->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $city->id }}"><i
                                                    class="bx bx-info-circle me-1"></i>Detail</a>
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $city->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $city->id }}"><i
                                                    class="bx bx-trash me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="modalDetail{{ $city->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Regency Data</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="col mb-4">Name: {{ $city->name }}</p>
                                            <p class="col mb-4">Created at: {{ $city->created_at }}</p>
                                            <p class="col mb-0">Updated at: {{ $city->updated_at }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEdit{{ $city->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.cities.update', $city->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Regency Data</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col mb-0">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                                        value="{{ $city->name }}" required />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="modalDelete{{ $city->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.cities.destroy', $city->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Regency Data</h5>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete this data? This action is permanent and will delete all related data.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $cities->withQueryString()->links() }}
            </div>

        </div>
        <!--/ Basic Bootstrap Table -->

        <!-- Modal Create -->
        <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.cities.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="modal-header">
                            <h5 class="modal-title">Add regency Data</h5>
                        </div>
                        <div class="modal-body">
                            <div class="col mb-0">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
