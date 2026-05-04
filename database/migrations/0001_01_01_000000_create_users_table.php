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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');

            // Nilai asli terenkripsi (disimpan sebagai teks panjang)
            $table->text('nip')->nullable();
            $table->text('email')->nullable();
            $table->text('no_hp')->nullable();

            // Hash untuk keperluan query/login (tidak bisa query kolom encrypted langsung)
            $table->string('nip_hash', 64)->unique()->nullable();
            $table->string('email_hash', 64)->unique()->nullable();

            $table->string('password');
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
