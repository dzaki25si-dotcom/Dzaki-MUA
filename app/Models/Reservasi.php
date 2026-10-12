<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';

    protected $fillable = [
        'pelanggan_id',
        'paket_id',
        'tanggal_reservasi',
        'jam_reservasi',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
