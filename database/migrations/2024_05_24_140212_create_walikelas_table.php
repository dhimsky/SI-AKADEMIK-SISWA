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
        Schema::create('walikelas', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->string('nama_walikelas');
            $table->string('jenis_kelamin');
            $table->string('kelas_id');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->foreign('kelas_id')->references('nama_kelas')->on('kelas');
            $table->foreign('nip')->references('kode_identitas')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walikelas');
    }
};
