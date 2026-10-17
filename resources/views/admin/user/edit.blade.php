@extends('layouts.admin.app')

@section('title', 'Edit User - MUA Ulva')

@section('content')
<div class="container-fluid pt-4 px-4">

    <div class="mb-4">
        <h1 class="h3 mb-2">Edit User</h1>
        <p class="text-muted">Ubah informasi akun pengguna MUA Ulva.</p>
    </div>

    <div class="bg-light rounded p-4">
        <h5 class="mb-4">Form Edit User</h5>

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

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name) }}"
                    maxlength="100"
                    placeholder="Masukkan nama user"
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email) }}"
                    placeholder="Masukkan email"
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password baru --}}
            <div class="mb-3">
                <label for="password" class="form-label">
                    Password Baru
                </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Kosongkan jika tidak ingin mengganti password"
                    minlength="8"
                >
                <small class="text-muted">
                    Isi hanya jika ingin mengganti password.
                </small>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Konfirmasi password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">
                    Confirm Password
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                    placeholder="Ulangi password baru"
                    minlength="8"
                >
            </div>

            {{-- Tombol --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-2"></i>Simpan Perubahan
                </button>

                <a href="{{ route('user.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
