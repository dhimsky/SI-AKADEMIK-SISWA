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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('nis_id');
            $table->date('tanggal_absensi');
            $table->string('status_absensi');
            $table->integer('semester');
            $table->string('tahun_pelajaran', 15);
            $table->string('kelas', 15);
            $table->timestamps();
            $table->foreign('nis_id')->references('nis')->on('siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};