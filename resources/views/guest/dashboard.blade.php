
@extends('layouts.guest.app')

@section('title', 'Home - MUA Ulva')

@section('content')

<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary"
        style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Hero Start -->
<div class="container-fluid p-0 hero-header bg-light mb-5">
    <div class="container p-0">
        <div class="row g-0 align-items-center">

            <div class="col-lg-6 hero-header-text py-5">
                <div class="py-5 px-3 ps-lg-0">

                    <h1 class="font-dancing-script text-primary animated slideInLeft">
                        Welcome
                    </h1>

                    <h1 class="display-1 mb-4 animated slideInLeft">
                        Beauty and Makeup for Your Special Day
                    </h1>

                    <div class="row g-4 animated slideInLeft">

                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square btn btn-primary flex-shrink-0">
                                    <i class="fa fa-phone text-dark"></i>
                                </div>

                                <div class="px-3">
                                    <h5 class="text-primary mb-0">Call Us</h5>
                                    <p class="fs-5 text-dark mb-0">
                                        +62 812 3456 7890
                                    </p>
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
                                    <p class="fs-5 text-dark mb-0">
                                        info@muaulva.com
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="owl-carousel header-carousel animated fadeIn">

                    <img class="img-fluid"
                        src="{{ asset('guestassets/img/hero-slider-1.jpg') }}"
                        alt="Makeup MUA Ulva">

                    <img class="img-fluid"
                        src="{{ asset('guestassets/img/hero-slider-2.jpg') }}"
                        alt="Layanan Makeup MUA Ulva">

                    <img class="img-fluid"
                        src="{{ asset('guestassets/img/hero-slider-3.jpg') }}"
                        alt="Hasil Makeup MUA Ulva">

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Hero End -->


<!-- About Start -->
<div class="container-fluid py-5" id="about">
    <div class="container-fluid px-5">
        <div class="row g-5 align-items-center">

            <!-- Bagian Kiri: Gambar dan Kontak -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">

                <img class="img-fluid w-100 mb-3"
                    src="{{ asset('guestassets/img/about.jpg') }}"
                    alt="Tentang MUA Ulva">



            </div>

            <!-- Bagian Kanan: Tentang MUA Ulva -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">

                <h1 class="font-dancing-script text-primary">
                    About Us
                </h1>

                <h1 class="mb-4">
                    Kenapa Memilih MUA Ulva?
                </h1>

                <p class="mb-4">
                    MUA Ulva menyediakan layanan makeup profesional
                    untuk membantu setiap pelanggan tampil cantik,
                    percaya diri, dan istimewa di berbagai acara.
                    Kami mengutamakan kualitas hasil makeup dan
                    kenyamanan pelanggan.
                </p>

                <!-- Statistik -->
                <div class="row g-3">

                    <div class="col-sm-6">
                        <div class="bg-light text-center p-4 h-100">
                            <i class="fas fa-calendar-alt fa-3x text-primary mb-3"></i>

                            <h1 class="display-5 mb-2" data-toggle="counter-up">
                                5
                            </h1>

                            <p class="text-dark text-uppercase mb-0">
                                Years Experience
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="bg-light text-center p-4 h-100">
                            <i class="fas fa-users fa-3x text-primary mb-3"></i>

                            <h1 class="display-5 mb-2" data-toggle="counter-up">
                                100
                            </h1>

                            <p class="text-dark text-uppercase mb-0">
                                Happy Customers
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- About End -->



<!-- Service Start -->
<div class="container-fluid service py-5" id="service">
    <div class="container">

        <div class="text-center wow fadeIn" data-wow-delay="0.1s">
            <h1 class="font-dancing-script text-primary">
                Our Services
            </h1>

            <h1 class="mb-5">
                Pilihan Layanan Makeup Kami
            </h1>
        </div>

        @forelse($kategori as $item)

            <div class="mb-5">

                <!-- Nama Kategori -->
                <div class="text-center mb-4">
                    <h2 class="text-primary">
                        {{ $item->nama_kategori }}
                    </h2>

                    <p>{{ $item->deskripsi }}</p>
                </div>

                <div class="row g-4">

                    @forelse($item->paket as $paket)

                        <div class="col-md-6 col-lg-4">
                            <div class="service-item h-100 p-4 border text-center wow fadeIn">

                                <img class="img-fluid mb-3"
                                    src="{{ $item->gambar
                                        ? asset('guestassets/img/' . $item->gambar)
                                        : asset('guestassets/img/makeup.png') }}"
                                    alt="{{ $paket->nama_paket }}">

                                <h3 class="mb-3">
                                    {{ $paket->nama_paket }}
                                </h3>

                                <p class="mb-2">
                                    {{ $paket->deskripsi }}
                                </p>

                                <h4 class="text-primary mb-3">
                                    Rp {{ number_format($paket->harga, 0, ',', '.') }}
                                </h4>

                                <p>
                                    Durasi: {{ $paket->durasi_jam }} Jam
                                </p>

                                <p>
                                    DP: {{ $paket->dp_persen }}%
                                </p>

                                <a class="btn btn-sm btn-primary text-uppercase"
                                    href="{{ url('/contact') }}">
                                    Read More
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>
                        </div>

                    @empty

                        <div class="col-12 text-center">
                            <p>Belum ada paket untuk kategori ini.</p>
                        </div>

                    @endforelse

                </div>

            </div>

        @empty

            <div class="text-center">
                <p>Belum ada layanan yang tersedia.</p>
            </div>

        @endforelse

    </div>
</div>
<!-- Service End -->



<!-- Team Start -->
<div class="container-fluid overflow-hidden py-5" id="team">
    <div class="container">

        <div class="text-center wow fadeIn" data-wow-delay="0.2s">
            <h1 class="font-dancing-script text-primary">
                Our Team
            </h1>

            <h1 class="mb-5">
                Tim MUA Ulva
            </h1>
        </div>

        <div class="row g-4 team">

            <div class="col-md-6 col-lg-3 wow fadeIn"
                data-wow-delay="0.1s">

                <div class="team-item position-relative overflow-hidden">

                    <img class="img-fluid w-100"
                        src="{{ asset('guestassets/img/team-1.jpg') }}"
                        alt="Tim MUA Ulva">

                    <div class="team-overlay">

                        <p class="text-primary mb-1">
                            Makeup Artist
                        </p>

                        <h4>MUA Ulva</h4>

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-dark btn-sm-square border-2 me-3"
                                href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <a class="btn btn-dark btn-sm-square border-2"
                                href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 wow fadeIn"
                data-wow-delay="0.3s">

                <div class="team-item position-relative overflow-hidden">

                    <img class="img-fluid w-100"
                        src="{{ asset('guestassets/img/team-2.jpg') }}"
                        alt="Tim MUA Ulva">

                    <div class="team-overlay">
                        <p class="text-primary mb-1">
                            Makeup Assistant
                        </p>

                        <h4>Makeup Assistant</h4>
                    </div>

                </div>
            </div>

            <div class="col-md-6 col-lg-3 wow fadeIn"
                data-wow-delay="0.5s">

                <div class="team-item position-relative overflow-hidden">

                    <img class="img-fluid w-100"
                        src="{{ asset('guestassets/img/team-3.jpg') }}"
                        alt="Tim MUA Ulva">

                    <div class="team-overlay">
                        <p class="text-primary mb-1">
                            Beauty Specialist
                        </p>

                        <h4>Beauty Specialist</h4>
                    </div>

                </div>
            </div>

            <div class="col-md-6 col-lg-3 wow fadeIn"
                data-wow-delay="0.7s">

                <div class="team-item position-relative overflow-hidden">

                    <img class="img-fluid w-100"
                        src="{{ asset('guestassets/img/team-4.jpg') }}"
                        alt="Tim MUA Ulva">

                    <div class="team-overlay">
                        <p class="text-primary mb-1">
                            Makeup Team
                        </p>

                        <h4>MUA Team</h4>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-fluid py-5" id="testimonial">
    <div class="container">

        <div class="text-center wow fadeIn" data-wow-delay="0.2s">
            <h1 class="font-dancing-script text-primary">
                Testimonial
            </h1>

            <h1 class="mb-5">
                Apa Kata Pelanggan Kami?
            </h1>
        </div>

        <div class="owl-carousel testimonial-carousel wow fadeIn"
            data-wow-delay="0.3s">

            <div class="text-center bg-light p-4">
                <i class="fa fa-quote-left fa-3x mb-3"></i>

                <p>
                    Hasil makeup-nya bagus banget dan sesuai dengan
                    yang saya inginkan. Terima kasih MUA Ulva!
                </p>

                <img class="img-fluid mx-auto border p-1 mb-3"
                    src="{{ asset('guestassets/img/testimonial-1.jpg') }}"
                    alt="Pelanggan MUA Ulva">

                <h4 class="mb-1">Pelanggan 1</h4>
                <span>Customer</span>
            </div>

            <div class="text-center bg-light p-4">
                <i class="fa fa-quote-left fa-3x mb-3"></i>

                <p>
                    Pelayanannya ramah dan hasil makeup membuat
                    saya semakin percaya diri.
                </p>

                <img class="img-fluid mx-auto border p-1 mb-3"
                    src="{{ asset('guestassets/img/testimonial-2.jpg') }}"
                    alt="Pelanggan MUA Ulva">

                <h4 class="mb-1">Pelanggan 2</h4>
                <span>Customer</span>
            </div>

            <div class="text-center bg-light p-4">
                <i class="fa fa-quote-left fa-3x mb-3"></i>

                <p>
                    Makeup-nya tahan lama dan hasilnya sangat
                    memuaskan. Recommended!
                </p>

                <img class="img-fluid mx-auto border p-1 mb-3"
                    src="{{ asset('guestassets/img/testimonial-3.jpg') }}"
                    alt="Pelanggan MUA Ulva">

                <h4 class="mb-1">Pelanggan 3</h4>
                <span>Customer</span>
            </div>

            <div class="text-center bg-light p-4">
                <i class="fa fa-quote-left fa-3x mb-3"></i>

                <p>
                    Sangat puas dengan hasil makeup dan pelayanannya.
                    Pasti akan menggunakan jasa MUA Ulva lagi.
                </p>

                <img class="img-fluid mx-auto border p-1 mb-3"
                    src="{{ asset('guestassets/img/testimonial-4.jpg') }}"
                    alt="Pelanggan MUA Ulva">

                <h4 class="mb-1">Pelanggan 4</h4>
                <span>Customer</span>
            </div>

        </div>
    </div>
</div>
<!-- Testimonial End -->

@endsection
