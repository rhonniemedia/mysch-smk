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
        Schema::create('data_tracer_studies', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Relasi ke data_pelajars
            $table->foreignUuid('data_pelajar_id')
                ->constrained('data_pelajars')
                ->onDelete('cascade');

            // Kolom nama_lengkap dan nisn dihapus karena sudah ada di relasi

            $table->text('no_hp'); // Terenkripsi

            $table->enum('status_pasca_lulus', [
                'Bekerja',
                'Wirausaha',
                'Melanjutkan Kuliah',
                'Mencari Kerja'
            ]);

            $table->string('instansi')->nullable();
            $table->text('kesan_sekolah');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tracer_studies');
    }
};
