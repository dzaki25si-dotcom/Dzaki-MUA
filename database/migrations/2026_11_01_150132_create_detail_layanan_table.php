<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_layanan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('paket_id')
                ->constrained('paket')
                ->cascadeOnDelete();

            $table->string('nama_layanan');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('is_aktif')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_layanan');
    }
};
