@extends('layouts.admin.app')

@section('title', 'Tambah User - MUA Ulva')

@section('content')
<div class="container-fluid pt-4 px-4">

    <div class="mb-4">
        <h1 class="h3 mb-2">Tambah User</h1>
        <p class="text-muted">Tambahkan akun pengguna baru MUA Ulva.</p>
    </div>

    <div class="bg-light rounded p-4">
        <h5 class="mb-4">Form Tambah User</h5>

        {{-- Flash data sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Flash data error --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    maxlength="100"
                    placeholder="Masukkan nama user" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    placeholder="contoh@email.com" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Minimal 8 karakter"
                    minlength="8" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">
                    Confirm Password
                </label>
                <input type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                    placeholder="Ulangi password"
                    minlength="8" required>
            </div>

            {{-- Tombol --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-2"></i>Simpan
                </button>

                <a href="{{ route('user.index') }}"
                    class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
