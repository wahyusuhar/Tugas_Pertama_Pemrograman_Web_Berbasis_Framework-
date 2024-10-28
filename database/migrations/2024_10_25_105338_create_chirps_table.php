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
        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->timestamps();
        });

        // Migrasi ini membuat tabel chirps yang akan menyimpan chirp dari pengguna dengan kolom id, body untuk teks, dan timestamps untuk mencatat waktu pembuatan dan perubahan.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};
