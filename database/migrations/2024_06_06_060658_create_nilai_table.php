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
            $table->string('nis_id');
            $table->string('mapel_kode');
            $table->integer('semester');
            $table->string('tahun_pelajaran', 15);
            $table->string('kelas', 10);
            $table->integer('ulangan_harian')->nullable();
            $table->integer('uts')->nullable();
            $table->integer('uas')->nullable();
            $table->integer('nilai_akhir')->nullable();
            $table->integer('psaj')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->foreign('nis_id')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('mapel_kode')->references('kode_mapel')->on('mapel')->onDelete('cascade');
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