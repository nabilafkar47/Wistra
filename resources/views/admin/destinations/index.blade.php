@extends('layouts.app')

@section('title', 'Manage Destination Data')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Flash Message -->
        @include('partials.flash')

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-center mb-0">
                <div class="head-label">
                    <h5 class="card-title mb-0">Destination Data</h5>
                </div>
            </div>

            <div class="group-action">
                <div class="d-flex justify-content-between flex-column flex-md-row align-items-center pb-5">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('admin.destinations.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-icon">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                        <a href="/admin/destinations" class="btn btn-icon btn-secondary ms-2">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Regency</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($destinations as $key => $destination)
                            <tr>
                                <td>{{ $key + $destinations->firstItem() }}</td>
                                <td>{{ $destination->name }}</td>
                                <td>{{ \Illuminate\Support\Str::words($destination->description, 3, '...') }}</td>
                                <td>{{ $destination->latitude }}</td>
                                <td>{{ $destination->longitude }}</td>
                                <td>{{ $destination->city->name }}</td>
                                <td>{{ $destination->category->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $destination->id }}"><i
                                                    class="bx bx-info-circle me-1"></i>Detail</a>
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $destination->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $destination->id }}"><i
                                                    class="bx bx-trash me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="modalDetail{{ $destination->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Destination Data</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="col mb-4">Name: {{ $destination->name }}</p>
                                            <p class="col mb-4">Description: {!! nl2br(e($destination->description)) !!}</p>
                                            <p class="col mb-4">Latitude: {{ $destination->latitude }}</p>
                                            <p class="col mb-4">Longitude: {{ $destination->longitude }}</p>
                                            <p class="col mb-4">Regency: {{ $destination->city->name }}</p>
                                            <p class="col mb-4">Category: {{ $destination->category->name }}</p>
                                            <p class="col mb-4">Created at: {{ $destination->created_at }}</p>
                                            <p class="col mb-0">Updated at: {{ $destination->updated_at }}</p>
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
                            <div class="modal fade" id="modalEdit{{ $destination->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Destination Data</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                                                value="{{ $destination->name }}" required />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea type="text" name="description" id="description" class="form-control" rows="4" placeholder="Description" required>{{ $destination->description }}</textarea>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label for="latitude" class="form-label">Latitude</label>
                                                                <input type="number" name="latitude" id="latitude{{ $destination->id }}" class="form-control"
                                                                    placeholder="Latitude" value="{{ $destination->latitude }}" min="-90" max="90"
                                                                    step="any" required />
                                                            </div>
                                                            <div class="col">
                                                                <label for="longitude" class="form-label">Longitude</label>
                                                                <input type="number" name="longitude" id="longitude{{ $destination->id }}"
                                                                    class="form-control" placeholder="Longitude" value="{{ $destination->longitude }}"
                                                                    min="-180" max="180" step="any" required />
                                                            </div>
                                                        </div>
                                                        <div class="row mb-0">
                                                            <div class="col">
                                                                <label for="city_id" class="form-label">Regency</label>
                                                                <select name="city_id" id="city_id" class="form-select" required>
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city->id }}"
                                                                            {{ $destination->city_id == $city->id ? 'selected' : '' }}>
                                                                            {{ $city->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label for="category_id" class="form-label">Category</label>
                                                                <select name="category_id" id="category_id" class="form-select" required>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $destination->category_id == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex flex-column map-container">
                                                        <label for="mapEdit{{ $destination->id }}" class="form-label">Map</label>
                                                        <div id="mapEdit{{ $destination->id }}" class="map"></div>
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
                            <div class="modal fade" id="modalDelete{{ $destination->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Destination Data</h5>
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
                {{ $destinations->withQueryString()->links() }}
            </div>

        </div>
        <!--/ Basic Bootstrap Table -->

        <!-- Modal Create -->
        <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.destinations.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="modal-header">
                            <h5 class="modal-title">Add Destination Data</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" maxlength="50" required />
                                    </div>
                                    <div class="col mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea type="text" name="description" id="description" class="form-control" rows="4" placeholder="Description" required></textarea>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="latitude" class="form-label">Latitude</label>
                                            <input type="number" name="latitude" id="latitude" class="form-control" placeholder="Latitude" min="-90"
                                                max="90" step="any" required />
                                        </div>
                                        <div class="col">
                                            <label for="longitude" class="form-label">Longitude</label>
                                            <input type="number" name="longitude" id="longitude" class="form-control" placeholder="Longitude" min="-180"
                                                max="180" step="any" required />
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col">
                                            <label for="city_id" class="form-label">Regency</label>
                                            <select name="city_id" id="city_id" class="form-select" required>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="category_id" class="form-label">Category</label>
                                            <select name="category_id" id="category_id" class="form-select" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex flex-column map-container">
                                    <label for="mapCreate" class="form-label">Map</label>
                                    <div id="mapCreate" class="map"></div>
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

        <script>
            // Map for create modal
            const modalCreate = document.getElementById('modalCreate');
            modalCreate.addEventListener('shown.bs.modal', function() {
                var mapCreate = L.map('mapCreate').setView([-4.42030551, 122.36572266], 7);
                // L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.{ext}', {
                //     minZoom: 0,
                //     maxZoom: 20,
                //     ext: 'png'
                // }).addTo(mapCreate);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    minZoom: 0,
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(mapCreate);

                var marker;
                mapCreate.on('click', function(e) {
                    var lat = e.latlng.lat.toFixed(8);
                    var lng = e.latlng.lng.toFixed(8);

                    if (marker) {
                        mapCreate.removeLayer(marker);
                    }
                    marker = L.marker([lat, lng]).addTo(mapCreate);

                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                });

                mapCreate.invalidateSize();
            });

            // Map for edit modal
            @foreach ($destinations as $destination)
                const modalEdit{{ $destination->id }} = document.getElementById('modalEdit{{ $destination->id }}');
                modalEdit{{ $destination->id }}.addEventListener('shown.bs.modal', function() {
                    var mapEdit{{ $destination->id }} = L.map('mapEdit{{ $destination->id }}').setView([{{ $destination->latitude }},
                        {{ $destination->longitude }}
                    ], 10);
                    // L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.{ext}', {
                    //     minZoom: 0,
                    //     maxZoom: 20,
                    //     ext: 'png'
                    // }).addTo(mapEdit{{ $destination->id }});
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        minZoom: 0,
                        maxZoom: 19,
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(mapEdit{{ $destination->id }});

                    var marker = L.marker([{{ $destination->latitude }}, {{ $destination->longitude }}]).addTo(mapEdit{{ $destination->id }});
                    mapEdit{{ $destination->id }}.on('click', function(e) {
                        var lat = e.latlng.lat.toFixed(8);
                        var lng = e.latlng.lng.toFixed(8);

                        if (marker) {
                            mapEdit{{ $destination->id }}.removeLayer(marker);
                        }
                        marker = L.marker([lat, lng]).addTo(mapEdit{{ $destination->id }});

                        document.getElementById('latitude{{ $destination->id }}').value = lat;
                        document.getElementById('longitude{{ $destination->id }}').value = lng;
                    });

                    mapEdit{{ $destination->id }}.invalidateSize();
                });
            @endforeach
        </script>

    </div>
@endsection
