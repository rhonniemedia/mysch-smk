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
        Schema::create('data_kons_keahlians', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('keahlian');
            $table->string('kode_keahlian')->unique();
            $table->string('alias_keahlian');
            $table->foreignUuid('prog_keahlian_id')->constrained('data_prog_keahlians')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kons_keahlians');
    }
};
