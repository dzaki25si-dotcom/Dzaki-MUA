@extends('admin.layout')

@section('title', 'Tambah Pelanggan - MUA Ulva')

@push('styles')
<style>
    .pelanggan-page {
        padding: 25px;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: #3E2C23;
        margin-bottom: 8px;
    }

    .page-description {
        color: #806B5D;
        margin-bottom: 0;
    }

    .form-card {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(62, 44, 35, 0.08);
    }

    .form-card h5 {
        font-weight: 700;
        color: #3E2C23;
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 600;
        color: #3E2C23;
    }

    .form-control {
        border-radius: 7px;
        padding: 11px 13px;
        border-color: #D8C6B6;
    }

    .form-control:focus {
        border-color: #A47551;
        box-shadow: 0 0 0 3px rgba(164, 117, 81, 0.15);
    }

    .btn-save {
        background: #A47551;
        color: #fff;
        border: none;
        border-radius: 7px;
        padding: 10px 20px;
    }

    .btn-save:hover {
        background: #8A5F3F;
        color: #fff;
    }

    .btn-cancel {
        background: #F5EBE0;
        color: #3E2C23;
        border-radius: 7px;
        padding: 10px 20px;
        text-decoration: none;
    }

    .btn-cancel:hover {
        background: #E9D8C7;
        color: #3E2C23;
    }

    @media (max-width: 576px) {
        .pelanggan-page {
            padding: 15px;
        }

        .form-card {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="pelanggan-page">

    <div class="page-header">
        <h1 class="page-title">Tambah Pelanggan</h1>
        <p class="page-description">
            Tambahkan data pelanggan baru MUA Ulva.
        </p>
    </div>

    <div class="form-card">
        <h5>Formulir Pelanggan</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Data belum bisa disimpan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pelanggan</label>
                <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama pelanggan"
                    maxlength="255"
                    required
                >
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input
                    type="tel"
                    class="form-control"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    placeholder="Contoh: 081234567890"
                    maxlength="20"
                    required
                >
                @error('no_hp')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea
                    class="form-control"
                    id="alamat"
                    name="alamat"
                    rows="4"
                    placeholder="Masukkan alamat pelanggan"
                    required
                >{{ old('alamat') }}</textarea>
                @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-save">
                    Simpan Data
                </button>

                <a href="{{ route('pelanggan.index') }}" class="btn-cancel">
                    Kembali
                </a>
            </div>
        </form>
    </div>

</div>
@endsection
