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
            'kode_mapel' => 'SJ',
            'nama_mapel' => 'Sejarah',
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
            'kode_mapel' => 'BI',
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
            'kode_mapel' => 'ASJ',
            'nama_mapel' => 'Administrasi Sistem Jaringan',
            'jurusan_kode' => 'TKJ',
        ]);
        Mapel::create([
            'kode_mapel' => 'TJKN',
            'nama_mapel' => 'Tek Jaringan Kabel dan Nirkabel',
            'jurusan_kode' => 'TKJ',
        ]);
        Mapel::create([
            'kode_mapel' => 'KJ',
            'nama_mapel' => 'Keamanan Jaringan',
            'jurusan_kode' => 'TKJ',
        ]);
    }
}