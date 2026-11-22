@extends('layouts.admin.app')

@section('title', 'Edit User - MUA Ulva')

@section('content')
<div class="container-fluid pt-4 px-4">

    <div class="mb-4">
        <h1 class="h3 mb-2">Edit User</h1>
        <p class="text-muted">Ubah informasi dan hak akses akun MUA Ulva.</p>
    </div>

    <div class="bg-light rounded p-4">
        <h5 class="mb-4">Form Edit User</h5>

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

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    maxlength="100" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            {{-- Role --}}
            <div class="mb-3">
                <label for="role" class="form-label">Role / Hak Akses</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="Admin"
                        {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>
                        Admin
                    </option>
                    <option value="Pelanggan"
                        {{ old('role', $user->role) == 'Pelanggan' ? 'selected' : '' }}>
                        Pelanggan
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" name="password" id="password"
                    class="form-control"
                    placeholder="Kosongkan jika tidak ingin mengganti password"
                    minlength="8">
                <small class="text-muted">
                    Isi hanya jika ingin mengganti password.
                </small>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">
                    Konfirmasi Password
                </label>
                <input type="password" name="password_confirmation"
                    id="password_confirmation" class="form-control"
                    placeholder="Ulangi password baru" minlength="8">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-2"></i>Simpan Perubahan
                </button>

                <a href="{{ route('user.index') }}"
                    class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
