<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'MUA Ulva Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('layouts.admin.css')
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">

        <!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary"
         style="width: 3rem; height: 3rem;"
         role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

        {{-- Sidebar --}}
        @include('layouts.admin.sidebar')

        {{-- Konten Utama --}}
        <div class="content">

            {{-- Navbar Atas --}}
            @include('layouts.admin.header')

            {{-- Isi Halaman --}}
            @yield('content')

            {{-- Footer --}}
            @include('layouts.admin.footer')

        </div>

        {{-- Tombol Kembali ke Atas --}}
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
            <i class="bi bi-arrow-up"></i>
        </a>

    </div>

    {{-- JavaScript --}}
    @include('layouts.admin.js')
</body>

</html>
