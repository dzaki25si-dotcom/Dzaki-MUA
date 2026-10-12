<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\Paket;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::with(['pelanggan', 'paket'])->get();

        return view('admin.reservasi.index', compact('reservasi'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $paket = Paket::where('is_aktif', true)->get();

        return view('admin.reservasi.create', compact('pelanggan', 'paket'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'paket_id' => 'required|exists:paket,id',
            'tanggal_reservasi' => 'required|date',
            'jam_reservasi' => 'required',
            'status' => 'required|in:menunggu,dikonfirmasi,selesai,dibatalkan',
        ]);

        Reservasi::create($data);

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil ditambahkan!');
    }

    public function edit(Reservasi $reservasi)
    {
        $pelanggan = Pelanggan::all();
        $paket = Paket::where('is_aktif', true)->get();

        return view('admin.reservasi.edit', compact(
            'reservasi',
            'pelanggan',
            'paket'
        ));
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $data = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'paket_id' => 'required|exists:paket,id',
            'tanggal_reservasi' => 'required|date',
            'jam_reservasi' => 'required',
            'status' => 'required|in:menunggu,dikonfirmasi,selesai,dibatalkan',
        ]);

        $reservasi->update($data);

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil diperbarui!');
    }

    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil dihapus!');
    }
}
