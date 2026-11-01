<!-- Navbar Start -->
<div class="container-fluid bg-light sticky-top p-0">
    <nav class="navbar navbar-expand-lg navbar-light p-0">

        <a href="{{ url('/') }}" class="navbar-brand bg-primary py-4 px-5 me-0">
            <h1 class="mb-0">
                <i class="bi bi-scissors"></i> MUA Ulva
            </h1>
        </a>

        <button type="button" class="navbar-toggler me-4"
            data-bs-toggle="collapse" data-bs-target="#navbarCollapse">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse p-3" id="navbarCollapse">

            <div class="navbar-nav mx-auto">

                <a href="{{ url('/') }}"
                    class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ url('/#about') }}" class="nav-item nav-link">
                    About
                </a>

                <a href="{{ url('/#service') }}" class="nav-item nav-link">
                    Service
                </a>

                <a href="{{ url('/#team') }}" class="nav-item nav-link">
                    Team
                </a>

                <a href="{{ url('/#testimonial') }}" class="nav-item nav-link">
                    Testimonial
                </a>

                <a href="{{ url('/#contact') }}" class="nav-item nav-link">
    Contact Us
</a>

                <a href="{{ url('/auth') }}"
                    class="nav-item nav-link {{ request()->is('auth') ? 'active' : '' }}">
                    Login
                </a>

            </div>

            <a href="{{ url('/contact') }}" class="btn btn-primary">
    Hubungi Kami
</a>

        </div>

    </nav>
</div>
<!-- Navbar End -->
