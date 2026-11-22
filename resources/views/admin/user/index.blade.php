@extends('layouts.admin.app')

@section('title', 'Data User - MUA Ulva')

@section('content')
<div class="container-fluid pt-4 px-4">

    <div class="mb-4">
        <h1 class="h3 mb-2">Data User</h1>
        <p class="text-muted">Kelola akun Admin dan Pelanggan MUA Ulva.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- DAFTAR ADMIN --}}
    <div class="bg-light rounded p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-1">Daftar Admin</h5>
                <small class="text-muted">Total: {{ $dataAdmin->count() }}</small>
            </div>

            <a href="{{ route('user.create', ['role' => 'Admin']) }}"
               class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Tambah Admin
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataAdmin as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('user.edit', $user->id) }}"
                                       class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('user.destroy', $user->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">
                                Belum ada akun Admin.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- DAFTAR PELANGGAN --}}
    <div class="bg-light rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-1">Daftar Pelanggan</h5>
                <small class="text-muted">Total: {{ $dataPelanggan->count() }}</small>
            </div>

            <a href="{{ route('user.create', ['role' => 'Pelanggan']) }}"
               class="btn btn-success">
                <i class="fa fa-plus me-2"></i>Tambah Pelanggan
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataPelanggan as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('user.edit', $user->id) }}"
                                       class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('user.destroy', $user->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">
                                Belum ada akun Pelanggan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
