@extends('layouts.admin.app')

@section('title', 'Tambah User - MUA Ulva')

@section('content')
<div class="container-fluid pt-4 px-4">

    @php
        $role = request('role', 'Pelanggan');
    @endphp

    <div class="mb-4">
        <h1 class="h3 mb-2">Tambah {{ $role }}</h1>
        <p class="text-muted">Tambahkan akun {{ strtolower($role) }} MUA Ulva.</p>
    </div>

    <div class="bg-light rounded p-4">
        <h5 class="mb-4">Form Tambah {{ $role }}</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <input type="hidden" name="role" value="{{ $role }}">

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="contoh@email.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password"
                    class="form-control"
                    placeholder="Minimal 8 karakter" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="form-control"
                    placeholder="Ulangi password" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Role / Hak Akses</label>
                <input type="text" class="form-control"
                    value="{{ $role }}" disabled>
            </div>

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
