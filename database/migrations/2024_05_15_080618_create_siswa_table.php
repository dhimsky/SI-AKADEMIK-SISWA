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
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn')->primary();
            $table->string('nama_siswa', 45);
            $table->string('kelas_id');
            $table->integer('semester');
            $table->string('angkatan_id');
            $table->unsignedBigInteger('tahunpelajaran_id');
            $table->string('status_siswa', 15);
            $table->timestamps();
            $table->foreign('angkatan_id')->references('kode_angkatan')->on('angkatan');
            $table->foreign('kelas_id')->references('nama_kelas')->on('kelas');
            $table->foreign('tahunpelajaran_id')->references('id')->on('tahunpelajaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};