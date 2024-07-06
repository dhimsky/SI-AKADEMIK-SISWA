<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mapel::create([
            'kode_mapel' => 'PABP',
            'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'jurusan_kode' => null,
        ]);
        Mapel::create([
            'kode_mapel' => 'PKN',
            'nama_mapel' => 'Pendidikan Pancasila',
            'jurusan_kode' => null,
        ]);
        Mapel::create([
            'kode_mapel' => 'BIN',
            'nama_mapel' => 'Bahasa Indonesia',
            'jurusan_kode' => null,
        ]);
        Mapel::create([
            'kode_mapel' => 'SI',
            'nama_mapel' => 'Sejarah Indonesia',
            'jurusan_kode' => null,
        ]);
        Mapel::create([
            'kode_mapel' => 'PJOK',
            'nama_mapel' => 'Pendidikan Jasmani, Olahraga dan Kesehatan',
            'jurusan_kode' => null,
        ]);
        Mapel::create([
            'kode_mapel' => 'BJ',
            'nama_mapel' => 'Bahasa Jawa',
            'jurusan_kode' => null,
        ]);
        Mapel::create([
            'kode_mapel' => 'MTK',
            'nama_mapel' => 'Matematika',
            'jurusan_kode' => null,
        ]);
        Mapel::create([
            'kode_mapel' => 'BING',
            'nama_mapel' => 'Bahasa Inggris',
            'jurusan_kode' => null,
        ]);

        Mapel::create([
            'kode_mapel' => 'MP',
            'nama_mapel' => 'Manajemen Perkantoran',
            'jurusan_kode' => 'MPLB',
        ]);
        Mapel::create([
            'kode_mapel' => 'FO',
            'nama_mapel' => 'Front Office',
            'jurusan_kode' => 'MPLB',
        ]);
        Mapel::create([
            'kode_mapel' => 'PKK',
            'nama_mapel' => 'Projek Kreatif dan Kewirausahaan',
            'jurusan_kode' => 'MPLB',
        ]);
        Mapel::create([
            'kode_mapel' => 'OTKH',
            'nama_mapel' => 'Otomatisasi Tata Kelola Humas',
            'jurusan_kode' => 'MPLB',
        ]);
        Mapel::create([
            'kode_mapel' => 'AT',
            'nama_mapel' => 'Administrasi Transaksi',
            'jurusan_kode' => 'MPLB',
        ]);
        
        Mapel::create([
            'kode_mapel' => 'ASJ',
            'nama_mapel' => 'Administrasi Sistem Jaringan',
            'jurusan_kode' => 'TJKT',
        ]);
        Mapel::create([
            'kode_mapel' => 'TJKN',
            'nama_mapel' => 'Tek Jaringan Kabel dan Nirkabel',
            'jurusan_kode' => 'TJKT',
        ]);
        Mapel::create([
            'kode_mapel' => 'KJ',
            'nama_mapel' => 'Keamanan Jaringan',
            'jurusan_kode' => 'TJKT',
        ]);

        Mapel::create([
            'kode_mapel' => 'AK',
            'nama_mapel' => 'Akuntansi Keuangan',
            'jurusan_kode' => 'AKL',
        ]);
        Mapel::create([
            'kode_mapel' => 'KA',
            'nama_mapel' => 'Komputerisasi Akuntansi',
            'jurusan_kode' => 'AKL',
        ]);
        Mapel::create([
            'kode_mapel' => 'AP',
            'nama_mapel' => 'Administrasi Pajak',
            'jurusan_kode' => 'AKL',
        ]);

        Mapel::create([
            'kode_mapel' => 'PPB',
            'nama_mapel' => 'Produk Pastry dan Bakery',
            'jurusan_kode' => 'KU',
        ]);
        Mapel::create([
            'kode_mapel' => 'KL',
            'nama_mapel' => 'Kuliner',
            'jurusan_kode' => 'KU',
        ]);
        Mapel::create([
            'kode_mapel' => 'PCKI',
            'nama_mapel' => 'Produk Cake dan Kue Indonesia',
            'jurusan_kode' => 'KU',
        ]);
    }
}