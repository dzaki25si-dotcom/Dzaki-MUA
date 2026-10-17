@extends('layouts.admin.app')

@section('title', 'Edit Pelanggan - MUA Ulva')

@section('content')
<div class="pelanggan-page">

    <div class="page-header">
        <h1 class="page-title">Edit Pelanggan</h1>
        <p class="page-description">
            Perbarui informasi pelanggan MUA Ulva.
        </p>
    </div>

    <div class="form-card">
        <h5>Formulir Edit Pelanggan</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Data belum bisa diperbarui:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pelanggan</label>
                <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $pelanggan->nama) }}"
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
                    value="{{ old('no_hp', $pelanggan->no_hp) }}"
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
                >{{ old('alamat', $pelanggan->alamat) }}</textarea>
                @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-save">
                    Simpan Perubahan
                </button>

                <a href="{{ route('pelanggan.index') }}" class="btn-cancel">
                    Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection
