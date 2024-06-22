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
            $table->string('kelas_id')->nullable();
            $table->integer('semester');
            $table->string('angkatan_id')->nullable();
            $table->unsignedBigInteger('tahunpelajaran_id')->nullable();
            $table->string('status_siswa', 15);
            $table->timestamps();
            $table->foreign('angkatan_id')->references('kode_angkatan')->on('angkatan')->onDelete('cascade');
            $table->foreign('kelas_id')->references('nama_kelas')->on('kelas')->onDelete('cascade');
            $table->foreign('tahunpelajaran_id')->references('id')->on('tahunpelajaran')->onDelete('cascade');
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