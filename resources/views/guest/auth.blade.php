@extends('layouts.guest.app')

@section('title', 'Login - MUA Ulva')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Login</h3>
                    <p class="text-center text-muted">
                        Silakan login ke akun MUA Ulva
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                    <p class="text-center mt-4 mb-2">
                        Belum punya akun?
                        <a href="{{ route('register') }}">Register di sini</a>
                    </p>

                    <p class="text-center mb-0">
                        <a href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
