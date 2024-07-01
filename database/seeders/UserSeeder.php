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
            'kode_identitas' => 1,
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
            'kode_identitas' => 196905021993031004,
            'nama_lengkap' => 'Sukirno, S.Pd., M.Pd.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196712121990032006,
            'nama_lengkap' => 'Yuliatmoko, S.Kom.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196712121990032007,
            'nama_lengkap' => 'Prayit, S.Kom.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196712121990032008,
            'nama_lengkap' => 'Agus, S.Kom.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196712121990032009,
            'nama_lengkap' => 'Surya, S.Kom.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196712121990032010,
            'nama_lengkap' => 'Wiyati, S.Kom.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196712121990032011,
            'nama_lengkap' => 'Yuli, S.Kom.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
        User::create([
            'kode_identitas' => 196712121990032012,
            'nama_lengkap' => 'Satrio, S.Kom.',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
        ]);
    }
}