<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'detail_layanan_id',
        'nama_paket',
        'deskripsi',
        'harga',
        'durasi_jam',
        'kategori',
        'dp_persen',
        'is_aktif',
    ];

    // Satu paket dimiliki oleh satu kategori layanan
    public function detailLayanan(): BelongsTo
    {
        return $this->belongsTo(DetailLayanan::class, 'detail_layanan_id');
    }
}
