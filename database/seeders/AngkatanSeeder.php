<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Angkatan::create([
            'kode_angkatan' => '18',
            'tahun_angkatan' => '2018',
        ]);
        Angkatan::create([
            'kode_angkatan' => '19',
            'tahun_angkatan' => '2019',
        ]);
        Angkatan::create([
            'kode_angkatan' => '20',
            'tahun_angkatan' => '2020',
        ]);
    }
}