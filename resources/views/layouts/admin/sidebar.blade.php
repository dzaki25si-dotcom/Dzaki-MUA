
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">

        {{-- Logo --}}
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary d-flex align-items-center gap-2">
                <img src="{{ asset('adminassets/img/logoprojectbg1.png') }}"
                     alt="Logo MUA Ulva" width="60">
                MUA Ulva
            </h3>
        </a>

        {{-- Profil Admin --}}
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle"
                     src="{{ asset('adminassets/img/logoproject.jpg') }}"
                     alt="Foto Admin"
                     style="width: 40px; height: 40px;">

                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>

            <div class="ms-3">
                <h6 class="mb-0">Admin MUA Ulva</h6>
                <span>Admin</span>
            </div>
        </div>

        {{-- Menu Sidebar --}}
        <div class="navbar-nav w-100">

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="nav-item nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>
                Dashboard
            </a>

            {{-- Pelanggan --}}
            <a href="{{ route('pelanggan.index') }}"
               class="nav-item nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i>
                Pelanggan
            </a>

            {{-- Paket Makeup --}}
            <a href="{{ route('paket.index') }}"
               class="nav-item nav-link {{ request()->routeIs('paket.*') ? 'active' : '' }}">
                <i class="fa fa-palette me-2"></i>
                Paket Makeup
            </a>

            {{-- Reservasi --}}
            <a href="{{ route('reservasi.index') }}"
               class="nav-item nav-link {{ request()->routeIs('reservasi.*') ? 'active' : '' }}">
                <i class="fa fa-calendar-alt me-2"></i>
                Reservasi
            </a>

            {{-- User --}}
            <a href="{{ route('user.index') }}"
               class="nav-item nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                <i class="fa fa-user me-2"></i>
                User
            </a>

        </div>

    </nav>
</div>
