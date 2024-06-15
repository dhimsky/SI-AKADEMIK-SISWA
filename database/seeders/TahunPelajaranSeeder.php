<?php

namespace Database\Seeders;

use App\Models\TahunPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TahunPelajaran::create([
            'tahun_pelajaran' => '2021/2022',
        ]);
        TahunPelajaran::create([
            'tahun_pelajaran' => '2022/2023',
        ]);
        TahunPelajaran::create([
            'tahun_pelajaran' => '2023/2024',
        ]);
    }
}