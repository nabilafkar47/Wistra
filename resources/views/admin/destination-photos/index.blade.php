@extends('layouts.app')

@section('title', 'Manage Destination Photo')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Flash Message -->
        @include('partials.flash')

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-center mb-0">
                <div class="head-label">
                    <h5 class="card-title mb-0">Destination Photo</h5>
                </div>
            </div>

            <div class="group-action">
                <div class="d-flex justify-content-between flex-column flex-md-row align-items-center pb-5">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('admin.destination-photos.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-icon">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                        <a href="/admin/destination-photos" class="btn btn-icon btn-secondary ms-2">
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
                            <th>Destination</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($destination_images as $key => $destination_image)
                            <tr>
                                <td>{{ $key + $destination_images->firstItem() }}</td>
                                <td>{{ $destination_image->destination->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $destination_image->image) }}" class="img-thumbnail-lg">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modalDetail{{ $destination_image->id }}"><i class="bx bx-info-circle me-1"></i>Detail</a>
                                            <a href="" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit{{ $destination_image->id }}"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a href="" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $destination_image->id }}"><i class="bx bx-trash me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="modalDetail{{ $destination_image->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Destination Photo</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="col mb-4">Name: {{ $destination_image->destination->name }}</p>
                                            <p class="col mb-0">Image:</p>
                                            <img src="{{ asset('storage/' . $destination_image->image) }}" class="img-thumbnail-xl mb-4">
                                            <p class="col mb-4">Created at: {{ $destination_image->created_at }}</p>
                                            <p class="col mb-0">Updated at: {{ $destination_image->updated_at }}</p>
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
                            <div class="modal fade" id="modalEdit{{ $destination_image->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.destination-photos.update', $destination_image->id) }}"
                                            method="POST"enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Destination Photo</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col mb-3">
                                                    <label for="destination_id" class="form-label">Destination</label>
                                                    <select name="destination_id" id="destination_id" class="form-select" required>
                                                        @foreach ($destinations as $destination)
                                                            <option value="{{ $destination->id }}"
                                                                {{ $destination_image->destination_id == $destination->id ? 'selected' : '' }}>
                                                                {{ $destination->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="image" class="form-label">Image</label>
                                                    <input type="file" name="image" id="image" class="form-control" />
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
                            <div class="modal fade" id="modalDelete{{ $destination_image->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.destination-photos.destroy', $destination_image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Destination Photo</h5>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete this data? This action is permanent and will delete all related
                                                data.
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
                {{ $destination_images->withQueryString()->links() }}
            </div>

        </div>
        <!--/ Basic Bootstrap Table -->

        <!-- Modal Create -->
        <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.destination-photos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-header">
                            <h5 class="modal-title">Add Destination Photo</h5>
                        </div>
                        <div class="modal-body">
                            <div class="col mb-3">
                                <label for="destination_id" class="form-label">Destination</label>
                                <select name="destination_id" id="destination_id" class="form-select" required>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mb-0">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required />
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
