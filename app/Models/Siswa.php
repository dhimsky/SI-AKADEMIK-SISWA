<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'jurusan_id',
        'nip_id',
        'nama_siswa',
        'pas_foto',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'kewarganegaraan',
        'no_tlp',
        'golongan_drh',
        'riwayat_penyakit',
        'kelainan_jasmani',
        'tinggi',
        'berat_bdn',
        'lulusan_dari',
        'tanggal_lulusan',
        'anak_ke',
        'jml_saudara_kandung',
        'jml_saudara_tiri',
        'jml_saudara_angkat',
        'status_anak',
        'tinggal_dng',
        'jarak_kesekolah',
        'status_anak',
        'status_anak',
        'nama_ayah_kandung',
        'tgl_lhr_ayah',
        'agama_ayah',
        'kewarganegaraan_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_bln_ayah',
        'alamat_ayah',
        'tlp_ayah',
        'penghasilan_bln_ayah',
        'nama_ibu_kandung',
        'tgl_lhr_ibu',
        'agama_ibu',
        'kewarganegaraan_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_bln_ibu',
        'alamat_ibu',
        'tlp_ibu',
        'penghasilan_bln_ibu',
        'nama_wali',
        'tgl_lhr_wali',
        'agama_wali',
        'kewarganegaraan_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'penghasilan_bln_wali',
        'alamat_wali',
        'tlp_wali',
        'penghasilan_bln_wali',
        'status_siswa',
    ];
}