<!-- Footer Start -->
<div id="contact" class="container-fluid footer position-relative bg-dark text-white-50 py-5 mt-5">

    <div class="container py-5">

        <div class="row g-5">

            <div class="col-lg-6 pe-lg-5">

                <a href="{{ url('/') }}" class="navbar-brand">

                    <h1 class="display-5 text-primary mb-0">
                        <i class="bi bi-scissors"></i> MUA Ulva
                    </h1>

                </a>

                <p>
                    MUA Ulva menyediakan layanan makeup profesional
                    untuk membantu kamu tampil cantik dan percaya diri
                    di setiap momen spesial.
                </p>

                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-2"></i>
                    Indonesia
                </p>

                <p class="mb-2">
                    <i class="fa fa-phone-alt me-2"></i>
                    +62 812 3456 7890
                </p>

                <p>
                    <i class="fa fa-envelope me-2"></i>
                    info@muaulva.com
                </p>

                <div class="d-flex justify-content-start mt-4">

                    <a class="btn btn-sm-square btn-primary me-3" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a class="btn btn-sm-square btn-primary me-3" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a class="btn btn-sm-square btn-primary me-3" href="#">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                </div>

            </div>


            <div class="col-lg-6 ps-lg-5">

                <div class="row g-4">

                    <div class="col-sm-6">

                        <h5 class="text-primary mb-4">
                            Quick Links
                        </h5>

                        <a class="btn btn-link" href="{{ url('/') }}">
                            Home
                        </a>

                        <a class="btn btn-link" href="{{ url('/#about') }}">
                            About Us
                        </a>

                        <a class="btn btn-link" href="{{ url('/#service') }}">
                            Our Services
                        </a>

                        <a class="btn btn-link" href="{{ url('/contact') }}">
                            Contact Us
                        </a>

                    </div>


                    <div class="col-sm-6">

                        <h5 class="text-primary mb-4">
                            Our Services
                        </h5>

                        <a class="btn btn-link" href="{{ url('/#service') }}">
                            Makeup Wisuda
                        </a>

                        <a class="btn btn-link" href="{{ url('/#service') }}">
                            Makeup Party
                        </a>

                        <a class="btn btn-link" href="{{ url('/#service') }}">
                            Makeup Wedding
                        </a>

                        <a class="btn btn-link" href="{{ url('/contact') }}">
                            Booking Makeup
                        </a>

                    </div>


                    <div class="col-sm-12">

                        <h5 class="text-primary mb-4">
                            MUA Ulva
                        </h5>

                        <p>
                            Tampil cantik dan percaya diri bersama
                            layanan makeup dari MUA Ulva.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid bg-dark text-white border-top border-secondary py-4 wow fadeIn"
    data-wow-delay="0.1s">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center">

                &copy; {{ date('Y') }}
                <a class="border-bottom" href="{{ url('/') }}">
                    MUA Ulva
                </a>, All Right Reserved.

                <br>

                <span class="small">
                    Template Design by
                    <a class="border-bottom" href="https://htmlcodex.com">
                        HTML Codex
                    </a>
                </span>

            </div>

        </div>

    </div>

</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>


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
