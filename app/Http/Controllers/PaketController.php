<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();

        return view('admin.paket.index', compact('paket'));
    }

    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|min:0',
            'durasi_jam' => 'required|numeric|min:0',
            'kategori' => 'required',
            'dp_persen' => 'required|integer|min:0|max:100',
            'is_aktif' => 'required|boolean',
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Paket $paket)
{
    return view('admin.paket.edit', compact('paket'));
}

public function update(Request $request, Paket $paket)
{
    $request->validate([
        'nama_paket' => 'required',
        'deskripsi' => 'nullable',
        'harga' => 'required|numeric|min:0',
        'durasi_jam' => 'required|numeric|min:0.1',
        'kategori' => 'required',
        'dp_persen' => 'required|integer|min:0|max:100',
        'is_aktif' => 'required|boolean',
    ]);

    $paket->update($request->all());

    return redirect()->route('paket.index')
        ->with('success', 'Paket berhasil diperbarui.');
}

    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}

