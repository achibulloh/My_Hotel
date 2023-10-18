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
            $table->id();
            $table->string('username');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L','P']);
            $table->string('alamat');
            $table->string('nomor_tlp');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status_akun', ['pending','active','blokir'])->default('pending');
            $table->enum('role',['admin','manager','karyawan','user'])->default('user');
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_seen')->nullable();
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
