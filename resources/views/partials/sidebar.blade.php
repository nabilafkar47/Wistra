<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard.index') }}" class="app-brand-link">
            <img src="{{ asset('template/assets/img/icons/logo_wistra.png') }}" alt="Logo Wistra" style="width: 30px; height: 30px;">
            <span class="app-brand-text demo menu-text fw-bold ms-4">Wistra</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <!-- Data -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manage Data</span>
        </li>

        <li class="menu-item {{ request()->is('admin/users') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div class="text-truncate" data-i18n="User">User</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/destinations') ? 'active' : '' }}">
            <a href="{{ route('admin.destinations.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-pin"></i>
                <div class="text-truncate" data-i18n="Destination">Destination</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/destination-photos') ? 'active' : '' }}">
            <a href="{{ route('admin.destination-photos.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div class="text-truncate" data-i18n="Destination Photo">Destination Photo</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/cities') ? 'active' : '' }}">
            <a href="{{ route('admin.cities.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-buildings"></i>
                <div class="text-truncate" data-i18n="Regency">Regency</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/categories') ? 'active' : '' }}">
            <a href="{{ route('admin.categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div class="text-truncate" data-i18n="Category">Category</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/reviews') ? 'active' : '' }}">
            <a href="{{ route('admin.reviews.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div class="text-truncate" data-i18n="Review">Review</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/sliders') ? 'active' : '' }}">
            <a href="{{ route('admin.sliders.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-slideshow"></i>
                <div class="text-truncate" data-i18n="Slider">Slider</div>
            </a>
        </li>

        <!-- More -->
        {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Lainnya</span></li>

        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="text-truncate" data-i18n="Basic">Profil</div>
            </a>
        </li> --}}

        {{-- <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="text-truncate" data-i18n="Basic">Logout</div>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div class="text-truncate" data-i18n="Basic">Logout</div>
                </button>
            </form>
        </li> --}}

    </ul>
</aside>
