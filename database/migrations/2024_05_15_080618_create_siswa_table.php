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
            $table->string('nama_siswa');
            $table->string('jenis_kelamin');
            $table->string('kelas_id');
            $table->string('status_siswa');
            $table->string('pas_foto')->nullable();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('kewarganegaraan');
            $table->string('no_tlp');
            $table->string('golongan_drh')->nullable();
            $table->string('riwayat_penyakit')->nullable();
            $table->string('kelainan_jasmani')->nullable();
            $table->integer('tinggi');
            $table->integer('berat_bdn');
            $table->string('lulusan_dari');
            $table->date('tanggal_lulusan');
            $table->integer('anak_ke');
            $table->integer('jml_saudara_kandung')->nullable();
            $table->integer('jml_saudara_tiri')->nullable();
            $table->integer('jml_saudara_angkat')->nullable();
            $table->string('status_anak');
            $table->string('tinggal_dng');
            $table->integer('jarak_kesekolah');
            $table->string('nama_ayah_kandung');
            $table->date('tgl_lhr_ayah');
            $table->string('agama_ayah');
            $table->string('kewarganegaraan_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->integer('penghasilan_bln_ayah');
            $table->string('alamat_ayah');
            $table->string('tlp_ayah');
            $table->string('nama_ibu_kandung');
            $table->date('tgl_lhr_ibu');
            $table->string('agama_ibu');
            $table->string('kewarganegaraan_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->integer('penghasilan_bln_ibu');
            $table->string('alamat_ibu');
            $table->string('tlp_ibu');
            $table->string('nama_wali');
            $table->date('tgl_lhr_wali');
            $table->string('agama_wali');
            $table->string('kewarganegaraan_wali');
            $table->string('pendidikan_wali');
            $table->string('pekerjaan_wali');
            $table->integer('penghasilan_bln_wali');
            $table->string('alamat_wali');
            $table->string('tlp_wali');
            $table->timestamps();
            $table->foreign('kelas_id')->references('nama_kelas')->on('kelas');
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
