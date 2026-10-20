
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MUA Ulva')</title>

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
