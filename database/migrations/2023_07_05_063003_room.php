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
        Schema::create('Rooms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kamar');
            $table->foreignId('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
            $table->string('harga');
            $table->enum('status_kamar', ['cekin','cekout'])->default('cekin');
            $table->enum('status', ['pending','active'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Rooms');
    }
};
