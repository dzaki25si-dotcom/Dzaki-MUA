@extends('layouts.admin.app')

@section('title', 'Kategori Layanan - MUA Ulva')

@section('content')

<div class="container-fluid pt-4 px-4">
    <h1 class="page-title">Kategori Layanan</h1>
    <p class="page-description">Kelola kategori layanan MUA Ulva.</p>

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol tambah --}}
    <a href="{{ route('detail-layanan.create') }}" class="btn btn-primary mb-3">
        Tambah Kategori Layanan
    </a>

    {{-- Tabel kategori --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($detailLayanan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nama_kategori }}</td>

                                <td>{{ $item->deskripsi }}</td>

                                <td>
                                    @if($item->is_aktif)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('detail-layanan.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('detail-layanan.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    Belum ada data kategori layanan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
