<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelatihan');
            $table->text('deskripsi');
            $table->string('instruktur');
            $table->integer('durasi_jam');
            $table->decimal('harga', 10, 2);
            $table->integer('kuota');
            $table->integer('peserta_terdaftar')->default(0);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('waktu'); // contoh: "09:00 - 12:00"
            $table->enum('status', ['aktif', 'penuh', 'selesai'])->default('aktif');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
