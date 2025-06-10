<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="bx bx-menu bx-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        {{-- <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search bx-md"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search..." />
            </div>
        </div> --}}
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('template/assets/img/avatars/def.png') }}"
                            class="avatar rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.destinations.index') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('template/assets/img/avatars/def.png') }}"
                                            class="avatar rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalLogout">
                            <i class="bx bx-power-off bx-md me-3"></i><span>Logout</span>
                        </a>
                    </li>

                    <!-- Modal Logout -->
                    {{-- <div class="modal fade" id="modalDelete{{ $slider->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Data Slider Data</h5>
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
                    </div> --}}
                </ul>
            </li>
            <!--/ User -->

        </ul>
    </div>
</nav>

<div class="modal fade" id="modalLogout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Logout</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out of from the Wistra Admin Panel?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>
