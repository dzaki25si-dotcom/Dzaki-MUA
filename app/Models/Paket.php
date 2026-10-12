<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'durasi_jam',
        'kategori',
        'dp_persen',
        'is_aktif',
    ];
}
