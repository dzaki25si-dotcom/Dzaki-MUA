<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailLayanan extends Model
{
    protected $table = 'detail_layanan';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'gambar',
        'is_aktif',
    ];

    // Satu kategori memiliki banyak paket makeup
    public function paket(): HasMany
    {
        return $this->hasMany(Paket::class, 'detail_layanan_id');
    }
}
