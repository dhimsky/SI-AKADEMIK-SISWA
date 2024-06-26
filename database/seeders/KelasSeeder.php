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
            'nama_kelas' => '11-DKV-1',
            'jurusan_kode' => 'DKV',
            'rombel_kode' => '1',
            'tingkat' => '11',
        ]);
    }
}