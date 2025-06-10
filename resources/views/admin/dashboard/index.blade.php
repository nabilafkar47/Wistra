@extends('layouts.app')

@section('title', 'Manage Data Category')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Flash Message -->
        @include('partials.flash')

        <div class="row">
            <div class="col-lg-3 mb-6">
                <div class="card h-60">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center mb-0">
                            <div class="avatar flex-shrink-0 me-4" style="width: 45px; height: 45px;">
                                <img src="{{ asset('template/assets/img/icons/unicons/user.png') }}" class="rounded" />
                            </div>
                            <div>
                                <p class="mb-0">Admin</p>
                                <h5 class="card-title mb-0">{{ $adminCount }} Data</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="card h-60">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center mb-0">
                            <div class="avatar flex-shrink-0 me-4" style="width: 45px; height: 45px;">
                                <img src="{{ asset('template/assets/img/icons/unicons/user.png') }}" class="rounded" />
                            </div>
                            <div>
                                <p class="mb-0">User</p>
                                <h5 class="card-title mb-0">{{ $userCount }} Data</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="card h-60">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center mb-0">
                            <div class="avatar flex-shrink-0 me-4" style="width: 45px; height: 45px;">
                                <img src="{{ asset('template/assets/img/icons/unicons/destination.png') }}" class="rounded" />
                            </div>
                            <div>
                                <p class="mb-0">Destination</p>
                                <h5 class="card-title mb-0">{{ $destinationCount }} Data</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="card h-60">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center mb-0">
                            <div class="avatar flex-shrink-0 me-4" style="width: 45px; height: 45px;">
                                <img src="{{ asset('template/assets/img/icons/unicons/destination-image.png') }}" class="rounded" />
                            </div>
                            <div>
                                <p class="mb-0">Destination Photo</p>
                                <h5 class="card-title mb-0">{{ $destinationImageCount }} Data</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="card h-60">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center mb-0">
                            <div class="avatar flex-shrink-0 me-4" style="width: 45px; height: 45px;">
                                <img src="{{ asset('template/assets/img/icons/unicons/city.png') }}" class="rounded" />
                            </div>
                            <div>
                                <p class="mb-0">Regency</p>
                                <h5 class="card-title mb-0">{{ $cityCount }} Data</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="card h-60">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center mb-0">
                            <div class="avatar flex-shrink-0 me-4" style="width: 45px; height: 45px;">
                                <img src="{{ asset('template/assets/img/icons/unicons/category.png') }}" class="rounded" />
                            </div>
                            <div>
                                <p class="mb-0">Category</p>
                                <h5 class="card-title mb-0">{{ $categoryCount }} Data</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="card h-60">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center mb-0">
                            <div class="avatar flex-shrink-0 me-4" style="width: 45px; height: 45px;">
                                <img src="{{ asset('template/assets/img/icons/unicons/review.png') }}" class="rounded" />
                            </div>
                            <div>
                                <p class="mb-0">Review</p>
                                <h5 class="card-title mb-0">{{ $reviewCount }} Data</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="card h-60">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center mb-0">
                            <div class="avatar flex-shrink-0 me-4" style="width: 45px; height: 45px;">
                                <img src="{{ asset('template/assets/img/icons/unicons/slider.png') }}" class="rounded" />
                            </div>
                            <div>
                                <p class="mb-0">Slider</p>
                                <h5 class="card-title mb-0">{{ $sliderCount }} Data</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
