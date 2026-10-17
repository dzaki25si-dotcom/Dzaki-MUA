@extends('layouts.admin.app')

@section('title', 'Data Pelanggan - MUA Ulva')

@section('content')

<div class="pelanggan-page">

    <h1 class="page-title">Data Pelanggan MUA Ulva</h1>

    <p class="page-description">
        Kelola data pelanggan MUA Ulva dengan mudah.
    </p>

    {{-- Pesan berhasil --}}
    @if (session('success'))
        <div class="alert-pelanggan alert-success-custom">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan kesalahan validasi --}}
    @if ($errors->any())
        <div class="alert-pelanggan alert-error-custom">
            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="pelanggan-card">

        <div class="pelanggan-header">
            <h2>Daftar Pelanggan</h2>

            <a href="{{ route('pelanggan.create') }}"
               class="btn-pelanggan">
                <i class="fa fa-plus me-1"></i>
                Tambah Pelanggan
            </a>
        </div>

        <div class="table-responsive">

            <table class="pelanggan-table">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($dataPelanggan as $pelanggan)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelanggan->nama }}</td>
                            <td>{{ $pelanggan->no_hp }}</td>
                            <td>{{ $pelanggan->alamat }}</td>

                            <td>
                                <div class="action-buttons">

                                    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                                       class="btn-edit">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data pelanggan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="empty-data">
                                Belum ada data pelanggan.
                                Silakan klik tombol Tambah Pelanggan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
