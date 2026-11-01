
@extends('layouts.guest.app')

@section('title', 'Home - MUA Ulva')

@section('content')

<!-- Hero Section -->
<div class="container-fluid hero-header bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">

            <div class="col-lg-6 hero-header-text">

                <h1 class="font-dancing-script text-primary">
                    Welcome to MUA Ulva
                </h1>

                <h2 class="display-5 mb-4 font-playfair-display">
                    Tampil Cantik di Hari Spesialmu
                </h2>

                <p class="font-work-sans mb-4">
                    MUA Ulva menyediakan layanan makeup
                    untuk berbagai acara spesial kamu.
                </p>

                <a href="{{ url('/contact') }}"
                   class="btn btn-primary py-3 px-4">
                    Hubungi Kami
                </a>

            </div>

            <div class="col-lg-6">

                <img
                    src="{{ asset('guestassets/img/hero-slider-1.jpg') }}"
                    class="img-fluid w-100"
                    alt="Layanan Makeup MUA Ulva">

            </div>

        </div>
    </div>
</div>

<!-- Services Section -->
<section class="container py-5">

    <div class="text-center mb-5">

        <h1 class="font-dancing-script text-primary">
            Our Services
        </h1>

        <h2 class="display-5 font-playfair-display">
            Layanan Kami
        </h2>

        <p>
            Kami siap membantu kamu tampil percaya diri
            dengan makeup terbaik.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <img src="{{ asset('guestassets/img/makeup.png') }}"
                     class="mx-auto mb-3"
                     style="width:70px"
                     alt="Makeup Wisuda">

                <h4>Makeup Wisuda</h4>
                <p>Makeup untuk momen wisuda yang spesial.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <img src="{{ asset('guestassets/img/manicure.png') }}"
                     class="mx-auto mb-3"
                     style="width:70px"
                     alt="Makeup Party">

                <h4>Makeup Party</h4>
                <p>Tampil menarik untuk pesta dan acara.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <img src="{{ asset('guestassets/img/pedicure.png') }}"
                     class="mx-auto mb-3"
                     style="width:70px"
                     alt="Makeup Wedding">

                <h4>Makeup Wedding</h4>
                <p>Layanan makeup untuk hari pernikahan.</p>
            </div>
        </div>

    </div>

</section>

@endsection
