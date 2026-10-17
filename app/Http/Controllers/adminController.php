<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Paket;
use App\Models\Reservasi;

class adminController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();

        $totalPaket = Paket::where('is_aktif', true)->count();

        $totalReservasi = Reservasi::count();

        $reservasiTerbaru = Reservasi::with([
            'pelanggan',
            'paket'
        ])->latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'totalPelanggan',
            'totalPaket',
            'totalReservasi',
            'reservasiTerbaru'
        ));
    }
}
