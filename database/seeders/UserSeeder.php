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
            'password' => Hash::make('123'),
            'role_id' => 1, 
        ]);
        User::create([
            'kode_identitas' => 4,
            'nama_lengkap' => 'Kepala Sekolah',
            'password' => Hash::make('123'),
            'role_id' => 4,
        ]);
        
    }
}