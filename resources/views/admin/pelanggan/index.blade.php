@extends('admin.layout')

@section('title', 'Data Pelanggan - MUA Ulva')

@push('styles')
<style>
    .pelanggan-page {
        padding: 25px;
        color: #3E2C23;
    }

    .page-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .page-description {
        color: #806B5D;
        margin-bottom: 25px;
    }

    .pelanggan-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(62, 44, 35, 0.08);
    }

    .pelanggan-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .pelanggan-header h2 {
        font-size: 22px;
        font-weight: bold;
        margin: 0;
    }

    .btn-pelanggan {
        display: inline-block;
        background: #A47551;
        color: #fff;
        padding: 10px 16px;
        text-decoration: none;
        border: none;
        border-radius: 7px;
    }

    .btn-pelanggan:hover {
        background: #8A5F3F;
        color: #fff;
    }

    .pelanggan-table {
        width: 100%;
        border-collapse: collapse;
    }

    .pelanggan-table th {
        background: #F5EBE0;
        color: #3E2C23;
        padding: 14px;
        text-align: left;
    }

    .pelanggan-table td {
        padding: 14px;
        border-bottom: 1px solid #EEE5DD;
        vertical-align: middle;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-edit {
        display: inline-block;
        background: #E9D5C3;
        color: #5B3925;
        padding: 7px 12px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 13px;
    }

    .btn-edit:hover {
        background: #D9BFA8;
        color: #3E2C23;
    }

    .btn-delete {
        background: #B94A48;
        color: #fff;
        padding: 7px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 13px;
    }

    .btn-delete:hover {
        background: #963936;
    }

    .empty-data {
        text-align: center;
        padding: 25px !important;
        color: #806B5D;
    }

    .alert-pelanggan {
        padding: 13px 16px;
        border-radius: 7px;
        margin-bottom: 20px;
    }

    .alert-success-custom {
        background: #E4F3E7;
        color: #28643A;
        border: 1px solid #B9DFC1;
    }

    .alert-error-custom {
        background: #FBE8E7;
        color: #963936;
        border: 1px solid #F0C3C0;
    }

    @media (max-width: 600px) {
        .pelanggan-page {
            padding: 15px;
        }

        .pelanggan-card {
            padding: 15px;
        }

        .pelanggan-table th,
        .pelanggan-table td {
            padding: 10px;
        }
    }
</style>
@endpush

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
