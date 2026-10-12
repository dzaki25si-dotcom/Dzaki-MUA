@extends('admin.layout')

@section('title', 'Data Reservasi')

@section('content')
<div class="container-fluid pt-4 px-4"
     style="background-color: #FFF9F3; min-height: 100vh;">

    <h2 style="color: #493020; font-weight: 700;">
        Data Reservasi MUA Ulva
    </h2>

    <p style="color: #96745B;">
        Kelola reservasi makeup pelanggan dengan mudah.
    </p>

    <div class="bg-white p-4 mt-4"
         style="border: 1px solid #F0E2D7; border-radius: 18px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 style="color: #493020;">Daftar Reservasi</h4>

            <a href="{{ route('reservasi.create') }}"
               class="btn"
               style="background-color: #A97852; color: white; padding: 12px 20px; border-radius: 10px;">
                <i class="fa fa-plus me-2"></i>Tambah Reservasi
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
                    <tr>
                        <th style="background-color: #F3E8DA; color: #493020;">No.</th>
                        <th style="background-color: #F3E8DA; color: #493020;">Pelanggan</th>
                        <th style="background-color: #F3E8DA; color: #493020;">Paket Makeup</th>
                        <th style="background-color: #F3E8DA; color: #493020;">Tanggal</th>
                        <th style="background-color: #F3E8DA; color: #493020;">Jam</th>
                        <th style="background-color: #F3E8DA; color: #493020;">Status</th>
                        <th style="background-color: #F3E8DA; color: #493020;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reservasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->pelanggan->nama ?? '-' }}</td>

                            <td>{{ $item->paket->nama_paket ?? '-' }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_reservasi)->format('d-m-Y') }}
                            </td>

                            <td>{{ substr($item->jam_reservasi, 0, 5) }}</td>

                            <td>
                                @if($item->status == 'menunggu')
                                    <span class="badge"
                                          style="background-color: #F3E8DA; color: #79552F;">
                                        Menunggu
                                    </span>
                                @elseif($item->status == 'dikonfirmasi')
                                    <span class="badge"
                                          style="background-color: #A97852; color: white;">
                                        Dikonfirmasi
                                    </span>
                                @elseif($item->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge"
                                          style="background-color: #BD4848; color: white;">
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('reservasi.edit', $item->id) }}"
                                       class="btn btn-sm"
                                       style="background-color: #EBD6C2; color: #493020;">
                                        Edit
                                    </a>

                                    <form action="{{ route('reservasi.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus reservasi ini?')">
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
                                Belum ada data reservasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
