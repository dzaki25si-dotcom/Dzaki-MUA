@extends('layouts.admin.app')

@section('title', 'Tambah Paket Makeup - MUA Ulva')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        <h4 class="mb-4">Tambah Paket Makeup</h4>

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('paket.store') }}" method="POST">
            @csrf

            {{-- Nama Paket --}}
            <div class="mb-3">
                <label class="form-label">Nama Paket</label>
                <input type="text"
                       name="nama_paket"
                       class="form-control"
                       value="{{ old('nama_paket') }}"
                       required>
            </div>

            {{-- Kategori dari database --}}
            <div class="mb-3">
                <label class="form-label">Kategori Layanan</label>

                <select name="detail_layanan_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>

                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ old('detail_layanan_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="3">{{ old('deskripsi') }}</textarea>
            </div>

            {{-- Harga --}}
            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number"
                       name="harga"
                       class="form-control"
                       min="0"
                       step="0.01"
                       value="{{ old('harga') }}"
                       required>
            </div>

            {{-- Durasi --}}
            <div class="mb-3">
                <label class="form-label">Durasi (Jam)</label>
                <input type="number"
                       name="durasi_jam"
                       class="form-control"
                       min="0.1"
                       step="0.1"
                       value="{{ old('durasi_jam') }}"
                       required>
            </div>

            {{-- DP --}}
            <div class="mb-3">
                <label class="form-label">DP (%)</label>
                <input type="number"
                       name="dp_persen"
                       class="form-control"
                       min="0"
                       max="100"
                       value="{{ old('dp_persen', 30) }}"
                       required>
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label class="form-label">Status Paket</label>

                <select name="is_aktif" class="form-select" required>
                    <option value="1"
                        {{ old('is_aktif', '1') == '1' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="0"
                        {{ old('is_aktif') === '0' ? 'selected' : '' }}>
                        Nonaktif
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('paket.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection
