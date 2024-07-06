<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'kode_identitas' => 123,
            'nama_lengkap' => 'Staff TU',
            'password' => Hash::make('abcd1234'),
            'role_id' => 1, 
        ]);

        User::create([
            'kode_identitas' => 196712121990032000,
            'nama_lengkap' => 'Navy Hardiati, S.Pd., M.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 4,
        ]);

        User::create([
            'kode_identitas' => 196502061989032000,
            'nama_lengkap' => 'Dra. Lulu Churiyati',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196708082007011016,
            'nama_lengkap' => 'Drs. Waris',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196710131997032000,
            'nama_lengkap' => 'Dra. Zuhrotun Nisa',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196712022014062000,
            'nama_lengkap' => 'Dra. Maria Maryati',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196804152006041011,
            'nama_lengkap' => 'Teguh Vitno Kristianto, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196902252006042005,
            'nama_lengkap' => 'Eko Sulistyowati, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 197309232008012006,
            'nama_lengkap' => 'Widodo Lestari, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196602032008012005,
            'nama_lengkap' => 'Dra. Sari Prihjantini',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 197408032005012010,
            'nama_lengkap' => 'Failasufah, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 198204282023212008,
            'nama_lengkap' => 'Erny Wulandari, S.E.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 199105082022211004,
            'nama_lengkap' => 'Gilang Sunu Aditya Putra, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 199502092023212012,
            'nama_lengkap' => 'Eli Rohmawati, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 199702052020121000,
            'nama_lengkap' => 'Rangga Iip Pramujito, S.Par.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 198710192022211005,
            'nama_lengkap' => 'Achmad Didik Ali Yahya, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 198610202022212010,
            'nama_lengkap' => 'Dwi Asih Sunarwati, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 199210192022212006,
            'nama_lengkap' => 'Cahyaning Nana Prativi, S.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
    }
}