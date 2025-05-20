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
        Schema::create('polis', function (Blueprint $table) {
            $table->integer('id_poli')->primary(); // Set id_poli sebagai primary key
            $table->tinyInteger('id_perawat')->nullable(); // Foreign key ke tabel perawats
            $table->tinyInteger('id_dokter');  // Foreign key ke tabel dokters
            $table->string('nama_poli', 10);
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            // Foreign key ke tabel dokters
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polis');
    }
};
