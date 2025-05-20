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
        Schema::create('dokters', function (Blueprint $table) {
            $table->tinyInteger('id_dokter')->primary(); // Set id_dokter sebagai primary key
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama_dokter', 50);
            $table->char('no_hp_dokter', 15)->nullable();
            $table->string('email_dokter', 20)->nullable();
            $table->string('spesialisasi')->nullable();            
            $table->timestamps();
            
            // Foreign key ke tabel users
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
