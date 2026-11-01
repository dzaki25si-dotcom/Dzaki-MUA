<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\DetailLayanan;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    // Menampilkan semua paket
    public function index()
    {
        $paket = Paket::with('detailLayanan')->get();

        return view('admin.paket.index', compact('paket'));
    }

    // Form tambah paket
    public function create()
    {
        $kategori = DetailLayanan::where('is_aktif', 1)->get();

        return view('admin.paket.create', compact('kategori'));
    }

    // Menyimpan paket
    public function store(Request $request)
    {
        $request->validate([
            'detail_layanan_id' => 'required|exists:detail_layanan,id',
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'durasi_jam' => 'required|numeric|min:0.1',
            'kategori' => 'required|string',
            'dp_persen' => 'required|integer|min:0|max:100',
            'is_aktif' => 'required|boolean',
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    // Form edit paket
    public function edit(Paket $paket)
    {
        $kategori = DetailLayanan::where('is_aktif', 1)->get();

        return view('admin.paket.edit', compact('paket', 'kategori'));
    }

    // Mengubah paket
    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'detail_layanan_id' => 'required|exists:detail_layanan,id',
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'durasi_jam' => 'required|numeric|min:0.1',
            'kategori' => 'required|string',
            'dp_persen' => 'required|integer|min:0|max:100',
            'is_aktif' => 'required|boolean',
        ]);

        $paket->update($request->all());

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    // Menghapus paket
    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}
