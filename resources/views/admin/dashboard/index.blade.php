@extends('layouts.admin.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid pt-4 px-4">

    <h4 class="mb-4">Dashboard Admin</h4>

    {{-- Statistik --}}
    <div class="row g-4 mb-4">

        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Pelanggan</p>
                    <h4 class="mb-0">{{ $totalPelanggan }}</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa fa-magic fa-3x text-success"></i>
                <div class="ms-3">
                    <p class="mb-2">Paket Makeup Aktif</p>
                    <h4 class="mb-0">{{ $totalPaket }}</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa fa-calendar fa-3x text-warning"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Reservasi</p>
                    <h4 class="mb-0">{{ $totalReservasi }}</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa fa-users fa-3x text-danger"></i>
                <div class="ms-3">
                    <p class="mb-2">Total User</p>
                    <h4 class="mb-0">{{ $dataUser }}</h4>
                </div>
            </div>
        </div>

    </div>

    {{-- Tabel Reservasi Terbaru --}}
    <div class="bg-light rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Reservasi Terbaru</h5>

            <a href="{{ route('reservasi.index') }}"
               class="btn btn-primary btn-sm">
                Lihat Semua
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead style="background-color: #8B5E3C; color: white;">
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Paket Makeup</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($reservasiTerbaru as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                            <td>{{ $item->paket->nama_paket ?? '-' }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_reservasi)->format('d-m-Y') }}
                            </td>
                            <td>{{ substr($item->jam_reservasi, 0, 5) }}</td>
                            <td>
                                @if ($item->status == 'menunggu')
                                    <span class="badge bg-warning text-dark">
                                        Menunggu
                                    </span>
                                @elseif ($item->status == 'dikonfirmasi')
                                    <span class="badge bg-primary">
                                        Dikonfirmasi
                                    </span>
                                @elseif ($item->status == 'selesai')
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Belum ada reservasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
