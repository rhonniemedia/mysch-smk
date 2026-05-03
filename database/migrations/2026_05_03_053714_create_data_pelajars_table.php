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
        Schema::create('data_pelajars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('kelas');
            $table->string('rombel');
            $table->foreignUuid('keahlian_id')->constrained('data_kons_keahlians');

            /* 
       KOLOM TERENKRIPSI (Data Rahasia) 
       Disimpan sebagai TEXT karena hasil enkripsi Laravel sangat panjang.
    */
            $table->text('nis');
            $table->text('nisn');
            $table->text('tempat_lahir');
            $table->text('tanggal_lahir'); // Format default: DDMMYYYY[cite: 1]
            $table->text('nama_ayah')->nullable();

            /* 
       KOLOM INDEKS (Untuk Login & Pencarian)
       Berisi SHA-256 Hash dari data asli. 
       Memungkinkan 'Exact Match Search' pada data terenkripsi.
    */
            $table->string('nis_index')->unique();
            $table->string('nisn_index')->unique(); // Username login utama

            /* 
       AUTENTIKASI
       Password akan berisi bcrypt(tanggal_lahir) secara default 
       sampai user mengubahnya sendiri[cite: 1, 2].
    */
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pelajars');
    }
};
