
@extends('layouts.admin.app')

@section('title', 'Data User - MUA Ulva')

@section('content')
<div class="container-fluid pt-4 px-4">

    <div class="mb-4">
        <h1 class="h3 mb-2">Data User</h1>
        <p class="text-muted">Kelola data akun pengguna MUA Ulva.</p>
    </div>

    {{-- Notifikasi berhasil --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Notifikasi validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Periksa kembali input kamu:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-light rounded p-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <h5 class="mb-0">Daftar Akun User</h5>

            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Tambah User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($dataUser as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->created_at?->format('d-m-Y') ?? '-' }}
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('user.edit', $user->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('user.destroy', $user->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                Belum ada data user.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
