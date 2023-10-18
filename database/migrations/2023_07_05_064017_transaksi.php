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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_kamar')->references('id')->on('Rooms')->onDelete('cascade');
            // $table->foreignId('harga_kamar')->references('harga')->on('room')->onDelete('cascade');
            $table->string('nama_pelangan');
            $table->enum('jenis_kelamin', ['L','P','N'])->default('N');
            $table->string('cekin');
            $table->string('cekout');
            $table->enum('metode_pembayaran',['Cash','Transfer','Credit/Debit','Qris']);
            $table->enum('status_pembayaran',['Sudah-Bayar','Belum-Bayar']);
            $table->enum('status',['pending','success','cencel'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
