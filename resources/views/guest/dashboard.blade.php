<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Salone - Beauty Salon')</title>
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <meta name="description" content="@yield('meta_description', '')">

    <!-- Favicon -->
    <link href="{{ asset('guestassets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display:wght@500&family=Work+Sans&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('guestassets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('guestassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('guestassets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('guestassets/css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    @php
        $services = [
            ['haircut',   'Haircut',   '0.1s', 'border-bottom border-end', ''],
            ['makeup',    'Makeup',    '0.3s', 'border-bottom border-lg-end', ''],
            ['manicure',  'Manicure',  '0.5s', 'border-bottom border-end border-lg-end-0', 'my-2'],
            ['pedicure',  'Pedicure',  '0.1s', 'border-bottom border-lg-bottom-0 border-lg-end', ''],
            ['massage',   'Massage',   '0.3s', 'border-end', ''],
            ['skin-care', 'Skin Care', '0.5s', '', ''],
        ];
        $team = [
            ['Hair Specialist',   'Lily Taylor',  '0.1s'],
            ['Nail Designer',     'Olivia Smith', '0.3s'],
            ['Beauty Specialist', 'Ava Brown',    '0.5s'],
            ['Spa Specialist',    'Amelia Jones', '0.7s'],
        ];
    @endphp

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-light sticky-top p-0">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <a href="{{ url('/') }}" class="navbar-brand bg-primary py-4 px-5 me-0">
                <h1 class="mb-0"><img src="guestassets/img/logoprojectbg1.png" alt="" width="60px">MUA Ulva</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="#" class="nav-item nav-link">About</a>
                    <a href="#" class="nav-item nav-link">Service</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light mt-2">
                            <a href="#" class="dropdown-item">Our Team</a>
                            <a href="#" class="dropdown-item">Testimonial</a>
                            <a href="#" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link">Contact</a>
                </div>
                {{-- Tombol "Buy Pro Version" milik template dihapus --}}
                <a class="btn btn-sm btn-primary" href="#">Booking</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid p-0 hero-header bg-light mb-5">
        <div class="container p-0">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 hero-header-text py-5">
                    <div class="py-5 px-3 ps-lg-0">
                        <h1 class="font-dancing-script text-primary animated slideInLeft">Welcome</h1>
                        <h1 class="display-1 mb-4 animated slideInLeft">Beauty Salon Fashion for Women</h1>
                        <div class="row g-4 animated slideInLeft">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square btn btn-primary flex-shrink-0">
                                        <i class="fa fa-phone text-dark"></i>
                                    </div>
                                    <div class="px-3">
                                        <h5 class="text-primary mb-0">Call Us</h5>
                                        <p class="fs-5 text-dark mb-0">+123456789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square btn btn-primary flex-shrink-0">
                                        <i class="fa fa-envelope text-dark"></i>
                                    </div>
                                    <div class="px-3">
                                        <h5 class="text-primary mb-0">Mail Us</h5>
                                        <p class="fs-5 text-dark mb-0">info@domain.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="owl-carousel header-carousel animated fadeIn">
                        @for ($i = 1; $i <= 3; $i++)
                            <img class="img-fluid" src="{{ asset('guestassets/img/hero-slider-' . $i . '.jpg') }}" alt="Slide {{ $i }}">
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <img class="img-fluid mb-3" src="{{ asset('guestassets/img/about.jpg') }}" alt="Tentang kami">
                    <div class="d-flex align-items-center bg-light">
                        <div class="btn-square flex-shrink-0 bg-primary" style="width: 100px; height: 100px;">
                            <i class="fa fa-phone fa-2x text-dark"></i>
                        </div>
                        <div class="px-3">
                            <h3>+0123456789</h3>
                            <span>Call us direct 24/7 for get a free consultation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="font-dancing-script text-primary">About Us</h1>
                    <h1 class="mb-5">Why People Choose Us!</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget libero lobortis, auctor nisi quis, aliquet nunc. Nam dapibus interdum lacus, suscipit tempor odio viverra aliquam. Etiam non ex ex.</p>
                    <div class="row g-3 mb-5">
                        <div class="col-sm-6">
                            <div class="bg-light text-center p-4">
                                <i class="fas fa-calendar-alt fa-4x text-primary"></i>
                                <h1 class="display-5" data-toggle="counter-up">25</h1>
                                <p class="text-dark text-uppercase mb-0">Years experience</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-light text-center p-4">
                                <i class="fas fa-users fa-4x text-primary"></i>
                                <h1 class="display-5" data-toggle="counter-up">999</h1>
                                <p class="text-dark text-uppercase mb-0">Happy Customers</p>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary text-uppercase px-5 py-3" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="font-dancing-script text-primary">Our Services</h1>
                <h1 class="mb-5">Explore Our Services</h1>
            </div>
            <div class="row g-4 g-md-0 text-center">
                @foreach ($services as [$img, $name, $delay, $border, $btnExtra])
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item h-100 p-4 {{ $border }} wow fadeIn" data-wow-delay="{{ $delay }}">
                            <img class="img-fluid" src="{{ asset('guestassets/img/' . $img . '.png') }}" alt="{{ $name }}">
                            <h3 class="mb-3">{{ $name }}</h3>
                            <p class="mb-3">Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo et tempor eirmod magna dolore erat amet</p>
                            <a class="btn btn-sm btn-primary text-uppercase {{ $btnExtra }}" href="#">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Team Start -->
    <div class="container-fluid overflow-hidden py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.2s">
                <h1 class="font-dancing-script text-primary">Team Members</h1>
                <h1 class="mb-5">Our Experienced Specialists</h1>
            </div>
            <div class="row g-4 team">
                @foreach ($team as $i => [$role, $name, $delay])
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="{{ $delay }}">
                        <div class="team-item position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('guestassets/img/team-' . ($i + 1) . '.jpg') }}" alt="{{ $name }}">
                            <div class="team-overlay">
                                <p class="text-primary mb-1">{{ $role }}</p>
                                <h4>{{ $name }}</h4>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-dark btn-sm-square border-2 me-3" href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-dark btn-sm-square border-2 me-3" href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-dark btn-sm-square border-2" href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.2s">
                <h1 class="font-dancing-script text-primary">Testimonial</h1>
                <h1 class="mb-5">What Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="text-center bg-light p-4">
                        <i class="fa fa-quote-left fa-3x mb-3"></i>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                        <img class="img-fluid mx-auto border p-1 mb-3" src="{{ asset('guestassets/img/testimonial-' . $i . '.jpg') }}" alt="Client">
                        <h4 class="mb-1">Client Name</h4>
                        <span>Profession</span>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid footer position-relative bg-dark text-white-50 py-5 mt-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 pe-lg-5">
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <h1 class="display-5 text-primary mb-0"><i class="bi bi-scissors"></i>Salone</h1>
                    </a>
                    <p>Aliquyam sed elitr elitr erat sed diam ipsum eirmod eos lorem nonumy. Tempor sea ipsum diam sed clita dolore eos dolores magna erat dolore sed stet justo et dolor.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-2"></i>info@example.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="btn btn-sm-square btn-primary me-3" href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-primary me-3" href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-primary me-3" href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-sm-square btn-primary me-3" href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <h5 class="text-primary mb-4">Quick Links</h5>
                            <a class="btn btn-link" href="#">About Us</a>
                            <a class="btn btn-link" href="#">Contact Us</a>
                            <a class="btn btn-link" href="#">Our Services</a>
                            <a class="btn btn-link" href="#">Terms &amp; Condition</a>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-primary mb-4">Popular Links</h5>
                            <a class="btn btn-link" href="#">About Us</a>
                            <a class="btn btn-link" href="#">Contact Us</a>
                            <a class="btn btn-link" href="#">Our Services</a>
                            <a class="btn btn-link" href="#">Terms &amp; Condition</a>
                        </div>
                        <div class="col-sm-12">
                            <h5 class="text-primary mb-4">Newsletter</h5>
                            <form action="#" method="POST">
                                @csrf
                                <div class="position-relative w-100 mb-2">
                                    <input class="form-control bg-secondary border-0 w-100 ps-4 pe-5" type="email" name="email"
                                        placeholder="Masukkan email Anda" required style="height: 60px;">
                                    <button type="submit" class="btn shadow-none position-absolute top-0 end-0 mt-2 me-2" aria-label="Berlangganan">
                                        <i class="fa fa-paper-plane text-primary fs-4"></i>
                                    </button>
                                </div>
                            </form>
                            <p class="mb-0">Diam sed sed dolor stet amet eirmod</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-dark text-white border-top border-secondary py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Nama Situs Anda</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    {{-- Credit template harus tetap ada kecuali membeli Pro Version --}}
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('guestassets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('guestassets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('guestassets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('guestassets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('guestassets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('guestassets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
