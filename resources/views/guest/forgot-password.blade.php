@extends('layouts.guest.app')

@section('title', 'Lupa Password - MUA Ulva')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h3 class="text-center mb-3">Lupa Password?</h3>

                    <p class="text-muted text-center">
                        Masukkan email dan password baru akun Anda.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email akun"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Minimal 8 karakter"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Ulangi password baru"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Simpan Password Baru
                        </button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        <a href="{{ route('auth.index') }}">Kembali ke Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
