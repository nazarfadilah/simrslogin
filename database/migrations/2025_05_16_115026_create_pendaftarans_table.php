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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->char('no_registrasi', 20)->primary(); // Set no_registrasi sebagai primary key, length 20 (adjust as needed)
            $table->string('rekam_medis');
            $table->integer('id_poli'); // Make sure this matches the type and length in polis migration
            $table->dateTime('tgl_kunjungan');
            $table->enum ('status', ['menunggu', 'dilayani', 'selesai'])->default('menunggu'); // Status pendaftaran
            $table->smallInteger('no_antrian');
            $table->timestamps();

            // Foreign key ke tabel pasiens
            $table->foreign('rekam_medis')->references('rekam_medis')->on('pasiens')->onDelete('cascade');

            // Foreign key ke tabel polis
            $table->foreign('id_poli')->references('id_poli')->on('polis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
