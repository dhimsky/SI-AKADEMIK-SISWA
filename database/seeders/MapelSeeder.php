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
            'kode_mapel' => 'MTK',
            'nama_mapel' => 'Matematika',
            'jurusan_kode' => 'TM',
        ]);
        Mapel::create([
            'kode_mapel' => 'IPA',
            'nama_mapel' => 'Ilmu Pengetahuan Alam',
            'jurusan_kode' => 'TE',
        ]);
        Mapel::create([
            'kode_mapel' => 'IPS',
            'nama_mapel' => 'Ilmu Pengetahuan Sosial',
            'jurusan_kode' => 'TKJ',
        ]);
    }
}