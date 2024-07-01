<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nip' => 196905021993031004,
            'nama_guru' => 'Sukirno, S.Pd., M.Pd.',
            'kelas_id' => '10-TKJ-1',
            'mapel_kode' => 'PABP'
        ]);
        Guru::create([
            'nip' => 196712121990032006,
            'nama_guru' => 'Yuliatmoko, S.Kom.',
            'kelas_id' => '10-MPLB-1',
            'mapel_kode' => 'PKN',
        ]);
        Guru::create([
            'nip' => 196712121990032007,
            'nama_guru' => 'Prayit, S.Kom.',
            'kelas_id' => null,
            'mapel_kode' => 'BIN',
        ]);
        Guru::create([
            'nip' => 196712121990032008,
            'nama_guru' => 'Agus, S.Kom.',
            'kelas_id' => null,
            'mapel_kode' => 'SJ',
        ]);
        Guru::create([
            'nip' => 196712121990032009,
            'nama_guru' => 'Surya, S.Kom.',
            'kelas_id' => null,
            'mapel_kode' => 'PJOK',
        ]);
        Guru::create([
            'nip' => 196712121990032010,
            'nama_guru' => 'Wiyati, S.Kom.',
            'kelas_id' => null,
            'mapel_kode' => 'BJ',
        ]);
        Guru::create([
            'nip' => 196712121990032011,
            'nama_guru' => 'Yuli, S.Kom.',
            'kelas_id' => null,
            'mapel_kode' => 'MTK',
        ]);
        Guru::create([
            'nip' => 196712121990032012,
            'nama_guru' => 'Satrio, S.Kom.',
            'kelas_id' => null,
            'mapel_kode' => 'BI',
        ]);
    }
}