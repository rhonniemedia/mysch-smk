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
        Schema::create('data_pengumumans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori'); // e.g., 'Kelulusan', 'Yudisium'
            $table->string('template_blade'); // Nama file blade di resources/views
            $table->dateTime('jadwal_tayang'); // Sesuai jam server
            $table->json('konten_dinamis')->nullable(); // Metadata: No SK, Predikat, dll
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengumumans');
    }
};
