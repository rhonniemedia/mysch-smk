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
        Schema::create('data_pengumuman_pelajars', function (Blueprint $table) {
            // Hapus baris $table->uuid('id')->primary();
            $table->foreignUuid('pengumuman_id')->constrained('data_pengumumans')->onDelete('cascade');
            $table->foreignUuid('pelajar_id')->constrained('data_pelajars')->onDelete('cascade');
            $table->timestamp('dibaca_pada')->nullable();
            $table->timestamps();

            // Opsional: Jadikan kombinasi kedua ID sebagai primary key
            $table->primary(['pengumuman_id', 'pelajar_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengumuman_pelajars');
    }
};
