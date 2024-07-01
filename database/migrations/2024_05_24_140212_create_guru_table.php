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
        Schema::create('guru', function (Blueprint $table) {
            $table->string('nip', 25)->primary();
            $table->string('nama_guru', 50);
            $table->string('kelas_id', 10)->nullable();
            $table->string('mapel_kode', 10)->nullable();
            // $table->string('email', 35);
            $table->timestamps();
            $table->foreign('kelas_id')->references('nama_kelas')->on('kelas')->onDelete('cascade');
            $table->foreign('mapel_kode')->references('kode_mapel')->on('mapel')->onDelete('cascade');
            $table->foreign('nip')->references('kode_identitas')->on('users')->onDelete('cascade');
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