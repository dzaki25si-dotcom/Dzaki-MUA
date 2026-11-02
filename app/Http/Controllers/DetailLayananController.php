<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailLayananController extends Controller
{
    // Menampilkan data kategori layanan
    public function index()
    {
        $detailLayanan = DB::table('detail_layanan')->get();

        return view('admin.detail_layanan.index', compact('detailLayanan'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('admin.detail_layanan.create');
    }

    // Menyimpan kategori
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'is_aktif' => 'required|boolean',
        ]);

        DB::table('detail_layanan')->insert([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'is_aktif' => $request->is_aktif,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('detail-layanan.index')
            ->with('success', 'Kategori layanan berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $detailLayanan = DB::table('detail_layanan')
            ->where('id', $id)
            ->first();

        return view('admin.detail_layanan.edit', compact('detailLayanan'));
    }

    // Mengubah kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'is_aktif' => 'required|boolean',
        ]);

        DB::table('detail_layanan')->where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'is_aktif' => $request->is_aktif,
            'updated_at' => now(),
        ]);

        return redirect()->route('detail-layanan.index')
            ->with('success', 'Kategori layanan berhasil diperbarui');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        DB::table('detail_layanan')->where('id', $id)->delete();

        return redirect()->route('detail-layanan.index')
            ->with('success', 'Kategori layanan berhasil dihapus');
    }
}
