@extends('layouts.app')

@section('title', 'Manage Review Data')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Flash Message -->
        @include('partials.flash')

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-center mb-0">
                <div class="head-label">
                    <h5 class="card-title mb-0">Review Data</h5>
                </div>
            </div>

            <div class="group-action">
                <div class="d-flex justify-content-between flex-column flex-md-row align-items-center pb-5">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('admin.reviews.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-icon">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                        <a href="/admin/reviews" class="btn btn-icon btn-secondary ms-2">
                            <i class="bx bx-refresh"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="tabledt" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Destination</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($reviews as $key => $review)
                            <tr>
                                <td>{{ $key + $reviews->firstItem() }}</td>
                                <td>{{ $review->user->name }}</td>
                                <td>{{ $review->destination->name }}</td>
                                <td>{{ $review->rating }}</td>
                                <td>{{ \Illuminate\Support\Str::words($review->comment, 3, '...') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $review->id }}"><i
                                                    class="bx bx-info-circle me-1"></i>Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="modalDetail{{ $review->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Review Data</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="col mb-4">Name: {{ $review->user->name }}</p>
                                            <p class="col mb-4">Destination: {{ $review->destination->name }}</p>
                                            <p class="col mb-4">Rating: {{ $review->rating }}</p>
                                            <p class="col mb-4">Comment: {{ $review->comment }}</p>
                                            <p class="col mb-4">Created at: {{ $review->created_at }}</p>
                                            <p class="col mb-0">Updated at: {{ $review->updated_at }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $reviews->withQueryString()->links() }}
            </div>

        </div>
        <!--/ Basic Bootstrap Table -->

    </div>
@endsection
