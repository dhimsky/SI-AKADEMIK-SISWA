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
            // 'email' => 'staff@gmail.com',
            'nama_lengkap' => 'Staff TU',
            'password' => Hash::make('123'),
            'role_id' => 1, 
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'kode_identitas' => 2,
            // 'email' => 'guru@gmail.com',
            'nama_lengkap' => 'Guru Mapel',
            'password' => Hash::make('123'),
            'role_id' => 2,
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'kode_identitas' => 3,
            // 'email' => 'siswa@gmail.com',
            'nama_lengkap' => 'Siswa',
            'password' => Hash::make('123'),
            'role_id' => 3,
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'kode_identitas' => 4,
            // 'email' => 'kepsek@gmail.com',
            'nama_lengkap' => 'Kepala Sekolah',
            'password' => Hash::make('123'),
            'role_id' => 4,
            'remember_token' => Str::random(60),
        ]);
        
    }
}