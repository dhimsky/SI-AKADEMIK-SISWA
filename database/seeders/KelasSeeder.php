<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'nama_kelas' => '10-TKJ-1',
            'jurusan_kode' => 'TKJ',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-TKJ-2',
            'jurusan_kode' => 'TKJ',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-TKJ-3',
            'jurusan_kode' => 'TKJ',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);

        Kelas::create([
            'nama_kelas' => '10-MPLB-1',
            'jurusan_kode' => 'MPLB',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-MPLB-2',
            'jurusan_kode' => 'MPLB',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-MPLB-3',
            'jurusan_kode' => 'MPLB',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);
    }
}