
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Ubah nama_layanan menjadi nama_kategori
        Schema::table('detail_layanan', function (Blueprint $table) {
            $table->renameColumn('nama_layanan', 'nama_kategori');
        });

        // 2. Ubah nama data kategori lama
        DB::table('detail_layanan')
            ->where('id', 1)
            ->update(['nama_kategori' => 'Pernikahan']);

        DB::table('detail_layanan')
            ->where('id', 3)
            ->update(['nama_kategori' => 'Wisuda']);

        // 3. Tambahkan foreign key kategori pada tabel paket
        Schema::table('paket', function (Blueprint $table) {
            $table->foreignId('detail_layanan_id')
                ->nullable()
                ->after('id')
                ->constrained('detail_layanan')
                ->nullOnDelete();
        });

        // 4. Hubungkan paket lama dengan kategorinya
        DB::table('paket')
            ->where('kategori', 'Pernikahan')
            ->update(['detail_layanan_id' => 1]);

        DB::table('paket')
            ->where('kategori', 'Wisuda')
            ->update(['detail_layanan_id' => 3]);

        // 5. Hapus relasi lama dari detail_layanan ke paket
        Schema::table('detail_layanan', function (Blueprint $table) {
            $table->dropForeign(['paket_id']);
            $table->dropColumn('paket_id');
        });
    }

    public function down(): void
    {
        // Mengembalikan struktur relasi sebelumnya
        Schema::table('detail_layanan', function (Blueprint $table) {
            $table->renameColumn('nama_kategori', 'nama_layanan');
            $table->foreignId('paket_id')
                ->nullable()
                ->constrained('paket')
                ->nullOnDelete();
        });

        Schema::table('paket', function (Blueprint $table) {
            $table->dropForeign(['detail_layanan_id']);
            $table->dropColumn('detail_layanan_id');
        });
    }
};

