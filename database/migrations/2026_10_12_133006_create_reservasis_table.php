<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggan')
                ->cascadeOnDelete();

            $table->foreignId('paket_id')
                ->constrained('paket')
                ->restrictOnDelete();

            $table->date('tanggal_reservasi');
            $table->time('jam_reservasi');

            $table->enum('status', [
                'menunggu',
                'dikonfirmasi',
                'selesai',
                'dibatalkan'
            ])->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
