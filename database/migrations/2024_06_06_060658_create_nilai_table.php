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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->string('nisn_id');
            $table->string('mapel_kode');
            $table->integer('semester');
            $table->string('tahun_pelajaran', 15);
            $table->string('kelas', 10);
            $table->integer('value');
            $table->timestamps();
            $table->foreign('nisn_id')->references('nisn')->on('siswa');
            $table->foreign('mapel_kode')->references('kode_mapel')->on('mapel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};