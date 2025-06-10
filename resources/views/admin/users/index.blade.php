@extends('layouts.app')

@section('title', 'Manage User Data')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Flash Message -->
        @include('partials.flash')

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-center mb-0">
                <div class="head-label">
                    <h5 class="card-title mb-0">User Data</h5>
                </div>
            </div>

            <div class="group-action">
                <div class="d-flex justify-content-between flex-column flex-md-row align-items-center pb-5">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-icon">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                        <a href="/admin/users" class="btn btn-icon btn-secondary ms-2">
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
                            <th>Email</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($users as $key => $user)
                            <tr>
                                <td>{{ $key + $users->firstItem() }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('template/assets/img/avatars/def.png') }}"
                                        class="avatar rounded-circle" />
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $user->id }}"><i
                                                    class="bx bx-info-circle me-1"></i>Detail</a>
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $user->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $user->id }}"><i
                                                    class="bx bx-trash me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="modalDetail{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail User Data</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="col mb-4">Name: {{ $user->name }}</p>
                                            <p class="col mb-4">Email: {{ $user->email }}</p>
                                            <p class="col mb-4">Password: {{ $user->password }}</p>
                                            <p class="col mb-4">Role: {{ $user->role }}</p>
                                            <p class="col mb-0">Image:</p>
                                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('template/assets/img/avatars/def.png') }}"
                                                class="img-thumbnail-lg" />
                                            <p class="col mb-4 mt-4">Created at: {{ $user->created_at }}</p>
                                            <p class="col mb-0">Updated at: {{ $user->updated_at }}</p>
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
                            <div class="modal fade" id="modalEdit{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit User Data</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="col mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                                                value="{{ $user->name }}" maxlength="100" required />
                                                        </div>
                                                        <div class="col mb-3 form-password-toggle">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password" class="form-control" name="password"
                                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                    aria-describedby="password" minlength="8" />
                                                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="role" class="form-label">Role</label>
                                                            <select name="role" id="role" class="form-select" required>
                                                                <option value="User" {{ $user->role === 'User' ? 'selected' : '' }}>User</option>
                                                                <option value="Admin" {{ $user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="col mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                                                                value="{{ $user->email }}" disabled required />
                                                        </div>
                                                        <div class="col mb-3 form-password-toggle">
                                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password_confirmation" class="form-control"
                                                                    name="password_confirmation"
                                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                    minlength="8" />
                                                            </div>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="image" class="form-label">Image</label>
                                                            <input type="file" name="image" id="image" class="form-control" />
                                                        </div>
                                                    </div>
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
                            <div class="modal fade" id="modalDelete{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete User Data</h5>
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
                {{ $users->withQueryString()->links() }}
            </div>

        </div>
        <!--/ Basic Bootstrap Table -->

        <!-- Modal Create -->
        <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-header">
                            <h5 class="modal-title">Add User Data</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="col mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" maxlength="20" required />
                                    </div>
                                    <div class="col mb-3 form-password-toggle">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"
                                                minlength="8" required />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" id="role" class="form-select" required>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required />
                                    </div>
                                    <div class="col mb-3 form-password-toggle">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" minlength="8" required />
                                        </div>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" />
                                    </div>
                                </div>
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
