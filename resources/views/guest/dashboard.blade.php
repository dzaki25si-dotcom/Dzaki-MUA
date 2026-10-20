
@extends('layouts.guest.app')

@section('title', 'Home - MUA Ulva')

@section('content')

<section class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="text-primary">Welcome to MUA Ulva</h1>

                <h2 class="display-5 mb-4">
                    Tampil Cantik di Hari Spesialmu
                </h2>

                <p>
                    MUA Ulva menyediakan layanan makeup
                    untuk berbagai acara spesial kamu.
                </p>

                <a href="{{ url('/contact') }}"
                   class="btn btn-primary py-3 px-4">
                    Hubungi Kami
                </a>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">
                <img src="{{ asset('guestassets/img/hero-slider-1.jpg') }}"
                     class="img-fluid rounded"
                     alt="Layanan makeup MUA Ulva">
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <div class="text-center">
        <h2 class="text-primary">Layanan Kami</h2>

        <p>
            Kami siap membantu kamu tampil percaya diri
            dengan makeup terbaik.
        </p>
    </div>

    <div class="row g-4 mt-3">
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <h4>Makeup Wisuda</h4>
                <p>Makeup untuk momen wisuda yang spesial.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <h4>Makeup Party</h4>
                <p>Tampil menarik untuk pesta dan acara.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <h4>Makeup Wedding</h4>
                <p>Layanan makeup untuk hari pernikahan.</p>
            </div>
        </div>
    </div>
</section>

@endsection
