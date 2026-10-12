@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        <h4 class="mb-4">Edit Paket Makeup</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('paket.update', $paket->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Paket</label>
                <input type="text" name="nama_paket"
                    class="form-control"
                    value="{{ old('nama_paket', $paket->nama_paket) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"
                    rows="3">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="harga"
                    class="form-control" min="0" step="0.01"
                    value="{{ old('harga', $paket->harga) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Durasi (Jam)</label>
                <input type="number" name="durasi_jam"
                    class="form-control" min="0.1" step="0.1"
                    value="{{ old('durasi_jam', $paket->durasi_jam) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Wisuda" {{ old('kategori', $paket->kategori) == 'Wisuda' ? 'selected' : '' }}>Wisuda</option>
                    <option value="Pernikahan" {{ old('kategori', $paket->kategori) == 'Pernikahan' ? 'selected' : '' }}>Pernikahan</option>
                    <option value="Pesta" {{ old('kategori', $paket->kategori) == 'Pesta' ? 'selected' : '' }}>Pesta</option>
                    <option value="Prewedding" {{ old('kategori', $paket->kategori) == 'Prewedding' ? 'selected' : '' }}>Prewedding</option>
                    <option value="Lainnya" {{ old('kategori', $paket->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">DP (%)</label>
                <input type="number" name="dp_persen"
                    class="form-control" min="0" max="100"
                    value="{{ old('dp_persen', $paket->dp_persen) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Paket</label>
                <select name="is_aktif" class="form-select" required>
                    <option value="1" {{ (string) old('is_aktif', (int) $paket->is_aktif) === '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ (string) old('is_aktif', (int) $paket->is_aktif) === '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('paket.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>

    </div>
</div>
@endsection
