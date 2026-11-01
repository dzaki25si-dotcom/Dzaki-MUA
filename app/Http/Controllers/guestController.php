<?php

namespace App\Http\Controllers;

use App\Models\DetailLayanan;

class guestController extends Controller
{
    public function index()
    {
        $kategori = DetailLayanan::with(['paket' => function ($query) {
            $query->where('is_aktif', 1);
        }])
        ->where('is_aktif', 1)
        ->get();

        return view('guest.dashboard', compact('kategori'));
    }
}
