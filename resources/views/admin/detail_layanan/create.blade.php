@extends('layouts.admin.app')

@section('title', 'Tambah Kategori Layanan - MUA Ulva')

@section('content')

<div class="container-fluid">
    <h1 class="page-title">Tambah Kategori Layanan</h1>
    <p class="page-description">Tambahkan kategori layanan makeup.</p>

    <div class="card">
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('detail-layanan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori"
                        class="form-control"
                        value="{{ old('nama_kategori') }}"
                        placeholder="Contoh: Pernikahan, Wisuda, Birthday"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"
                        rows="4">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama File Gambar</label>
                    <input type="text" name="gambar"
                        class="form-control"
                        value="{{ old('gambar') }}"
                        placeholder="Contoh: makeup.jpg">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_aktif" class="form-control" required>
                        <option value="1" {{ old('is_aktif', '1') == '1' ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="0" {{ old('is_aktif') == '0' ? 'selected' : '' }}>
                            Tidak Aktif
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('detail-layanan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>
</div>

@endsection
