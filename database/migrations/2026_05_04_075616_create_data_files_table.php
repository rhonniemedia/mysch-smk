<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_files', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Relasi ke pelajar (1 file 1 pelajar)
            $table->foreignUuid('pelajar_id')
                ->constrained('data_pelajars')
                ->onDelete('cascade');

            // Informasi File
            $table->string('nama_file'); // Nama asli file (misal: SKL_Abizar.pdf)
            $table->string('path_file'); // Path penyimpanan (encrypted path atau hash)
            $table->string('kategori')->default('SKL'); // Untuk pengembangan fitur dokumen lain

            // Metadata untuk validasi
            $table->string('ekstensi', 10); // pdf, jpg, dll

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_files');
    }
};
