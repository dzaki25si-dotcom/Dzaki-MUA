@extends('admin.layout')

@section('title', 'Tambah Reservasi')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0">Tambah Reservasi</h5>

            <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data yang kamu masukkan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservasi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="pelanggan_id" class="form-label">
                    Nama Pelanggan
                </label>

                <select name="pelanggan_id" id="pelanggan_id"
                        class="form-select" required>
                    <option value="">-- Pilih Pelanggan --</option>

                    @foreach ($pelanggan as $p)
                        <option value="{{ $p->id }}"
                            {{ old('pelanggan_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="paket_id" class="form-label">
                    Paket Makeup
                </label>

                <select name="paket_id" id="paket_id"
                        class="form-select" required>
                    <option value="">-- Pilih Paket Makeup --</option>

                    @foreach ($paket as $pk)
                        <option value="{{ $pk->id }}"
                            {{ old('paket_id') == $pk->id ? 'selected' : '' }}>
                            {{ $pk->nama_paket }} -
                            Rp{{ number_format($pk->harga, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_reservasi" class="form-label">
                    Tanggal Reservasi
                </label>

                <input type="date"
                       name="tanggal_reservasi"
                       id="tanggal_reservasi"
                       class="form-control"
                       value="{{ old('tanggal_reservasi') }}"
                       min="{{ date('Y-m-d') }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="jam_reservasi" class="form-label">
                    Jam Reservasi
                </label>

                <input type="time"
                       name="jam_reservasi"
                       id="jam_reservasi"
                       class="form-control"
                       value="{{ old('jam_reservasi') }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">
                    Status Reservasi
                </label>

                <select name="status" id="status"
                        class="form-select" required>
                    <option value="menunggu"
                        {{ old('status', 'menunggu') == 'menunggu' ? 'selected' : '' }}>
                        Menunggu
                    </option>

                    <option value="dikonfirmasi"
                        {{ old('status') == 'dikonfirmasi' ? 'selected' : '' }}>
                        Dikonfirmasi
                    </option>

                    <option value="selesai"
                        {{ old('status') == 'selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>

                    <option value="dibatalkan"
                        {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>
                        Dibatalkan
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Reservasi
            </button>

            <a href="{{ route('reservasi.index') }}"
               class="btn btn-secondary">
                Batal
            </a>
        </form>

    </div>
</div>
@endsection
