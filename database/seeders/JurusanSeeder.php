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
            'kode_jurusan' => 'TJKT',
            'nama_jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'PM',
            'nama_jurusan' => 'Pemasaran',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'MPLB',
            'nama_jurusan' => 'Manajemen Perkantoran dan Layanan Bisnis',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'AKL',
            'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'ULP',
            'nama_jurusan' => 'Usaha Layanan Pariwisata',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'PH',
            'nama_jurusan' => 'Perhotelan',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'KU',
            'nama_jurusan' => 'Kuliner',
        ]);
        Jurusan::create([
            'kode_jurusan' => 'DKV',
            'nama_jurusan' => 'Desain Komunikasi Visual',
        ]);
    }
}