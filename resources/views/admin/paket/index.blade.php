@extends('layouts.admin.app')

@section('title', 'Data Paket Makeup')

@section('content')
<div class="container-fluid pt-4 px-4"
     style="background-color: #FFF9F3; min-height: 100vh;">

    <h2 style="color: #493020; font-weight: 700;">
        Data Paket Makeup MUA Ulva
    </h2>

    <p style="color: #96745B;">
        Kelola paket makeup MUA Ulva dengan mudah.
    </p>

    <div class="bg-white p-4 mt-4"
         style="border: 1px solid #F0E2D7; border-radius: 18px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 style="color: #493020;">Daftar Paket Makeup</h4>

            <a href="{{ route('paket.create') }}"
               class="btn"
               style="background-color: #A97852; color: white; padding: 12px 20px; border-radius: 10px;">
                <i class="fa fa-plus me-2"></i>Tambah Paket
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr style="background-color: #F3E8DA; color: #493020;">
                        <th style="background-color: #F3E8DA;">No.</th>
                        <th style="background-color: #F3E8DA;">Nama Paket</th>
                        <th style="background-color: #F3E8DA;">Harga</th>
                        <th style="background-color: #F3E8DA;">Durasi</th>
                        <th style="background-color: #F3E8DA;">Kategori</th>
                        <th style="background-color: #F3E8DA;">Status</th>
                        <th style="background-color: #F3E8DA;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($paket as $item)
                        <tr style="border-bottom: 1px solid #F0E2D7;">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $item->nama_paket }}</strong>
                                @if($item->deskripsi)
                                    <br>
                                    <small style="color: #96745B;">
                                        {{ $item->deskripsi }}
                                    </small>
                                @endif
                            </td>
                            <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->durasi_jam }} jam</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                @if($item->is_aktif)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('paket.edit', $item->id) }}"
                                       class="btn btn-sm"
                                       style="background-color: #EBD6C2; color: #493020;">
                                        Edit
                                    </a>

                                    <form action="{{ route('paket.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm"
                                                style="background-color: #BD4848; color: white;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                Belum ada data paket makeup.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
