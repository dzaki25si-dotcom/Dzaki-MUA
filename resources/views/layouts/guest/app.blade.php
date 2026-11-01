<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'MUA Ulva')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="MUA Ulva - Layanan makeup untuk hari spesialmu">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.guest.css')

    @stack('styles')
</head>

<body>

    @include('layouts.guest.navbar')

    @yield('content')

    @include('layouts.guest.footer')

    @stack('scripts')

</body>
</html>
