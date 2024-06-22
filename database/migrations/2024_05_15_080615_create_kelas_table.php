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
        Schema::create('kelas', function (Blueprint $table) {
            $table->string('nama_kelas')->primary();
            $table->string('jurusan_kode');
            $table->string('rombel_kode');
            $table->string('tingkat', 5);
            $table->timestamps();
            $table->foreign('jurusan_kode')->references('kode_jurusan')->on('jurusan')->onDelete('cascade');
            $table->foreign('rombel_kode')->references('kode_rombel')->on('rombel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};