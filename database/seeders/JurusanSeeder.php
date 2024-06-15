<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create([
            'kode_jurusan' => 'TKJ',
            'nama_jurusan' => 'Teknik Komputer Jaringan',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'TM',
            'nama_jurusan' => 'Teknik Mesin',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'TE',
            'nama_jurusan' => 'Teknik Elektronika',
        ]);
    }
}