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
            'nip' => 196502061989032000,
            'nama_guru' => 'Dra. Lulu Churiyati',
            'kelas_id' => '10-TJKT-1',
            'mapel_kode' => 'MTK'
        ]);
        Guru::create([
            'nip' => 196708082007011016,
            'nama_guru' => 'Drs. Waris',
            'kelas_id' => '10-MPLB-1',
            'mapel_kode' => 'BIN',
        ]);
        Guru::create([
            'nip' => 196710131997032000,
            'nama_guru' => 'Dra. Zuhrotun Nisa',
            'kelas_id' => null,
            'mapel_kode' => 'PABP',
        ]);
        Guru::create([
            'nip' => 196712022014062000,
            'nama_guru' => 'Dra. Maria Maryati',
            'kelas_id' => null,
            'mapel_kode' => 'BJ',
        ]);
        Guru::create([
            'nip' => 196804152006041011,
            'nama_guru' => 'Teguh Vitno Kristianto, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'PJOK',
        ]);
        Guru::create([
            'nip' => 196902252006042005,
            'nama_guru' => 'Eko Sulistyowati, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'SI',
        ]);
        Guru::create([
            'nip' => 197309232008012006,
            'nama_guru' => 'Widodo Lestari, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'BING',
        ]);
        Guru::create([
            'nip' => 196602032008012005,
            'nama_guru' => 'Dra. Sari Prihjantini',
            'kelas_id' => null,
            'mapel_kode' => 'AK',
        ]);
        Guru::create([
            'nip' => 197408032005012010,
            'nama_guru' => 'Failasufah, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'KA',
        ]);
        Guru::create([
            'nip' => 198204282023212008,
            'nama_guru' => 'Erny Wulandari, S.E.',
            'kelas_id' => null,
            'mapel_kode' => 'AP',
        ]);
        Guru::create([
            'nip' => 199105082022211004,
            'nama_guru' => 'Gilang Sunu Aditya Putra, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'OTKH',
        ]);
        Guru::create([
            'nip' => 199502092023212012,
            'nama_guru' => 'Eli Rohmawati, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'AT',
        ]);
        Guru::create([
            'nip' => 199702052020121000,
            'nama_guru' => 'Rangga Iip Pramujito, S.Par.',
            'kelas_id' => null,
            'mapel_kode' => 'FO',
        ]);
        Guru::create([
            'nip' => 198710192022211005,
            'nama_guru' => 'Achmad Didik Ali Yahya, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'PPB',
        ]);
        Guru::create([
            'nip' => 198610202022212010,
            'nama_guru' => 'Dwi Asih Sunarwati, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'KL',
        ]);
        Guru::create([
            'nip' => 199210192022212006,
            'nama_guru' => 'Cahyaning Nana Prativi, S.Pd.',
            'kelas_id' => null,
            'mapel_kode' => 'PCKI',
        ]);
    }
}