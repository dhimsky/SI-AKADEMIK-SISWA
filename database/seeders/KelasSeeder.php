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
            'nama_kelas' => '10-TJKT-1',
            'jurusan_kode' => 'TJKT',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-TJKT-2',
            'jurusan_kode' => 'TJKT',
            'rombel_kode' => '2',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-TJKT-3',
            'jurusan_kode' => 'TJKT',
            'rombel_kode' => '3',
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
            'rombel_kode' => '2',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-MPLB-3',
            'jurusan_kode' => 'MPLB',
            'rombel_kode' => '3',
            'tingkat' => '10',
        ]);

        Kelas::create([
            'nama_kelas' => '10-AKL-1',
            'jurusan_kode' => 'AKL',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-AKL-2',
            'jurusan_kode' => 'AKL',
            'rombel_kode' => '2',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-AKL-3',
            'jurusan_kode' => 'AKL',
            'rombel_kode' => '3',
            'tingkat' => '10',
        ]);

        Kelas::create([
            'nama_kelas' => '10-KU-1',
            'jurusan_kode' => 'KU',
            'rombel_kode' => '1',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-KU-2',
            'jurusan_kode' => 'KU',
            'rombel_kode' => '2',
            'tingkat' => '10',
        ]);
        Kelas::create([
            'nama_kelas' => '10-KU-3',
            'jurusan_kode' => 'KU',
            'rombel_kode' => '3',
            'tingkat' => '10',
        ]);
    }
}