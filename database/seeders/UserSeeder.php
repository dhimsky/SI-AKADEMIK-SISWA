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
            'nisn' => 1,
            'nama_lengkap' => 'macan putih',
            'role_id' => 1,
            'email' => 'macan@gmail.com',
            'password' => Hash::make('macan'),
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'nisn' => 2,
            'nama_lengkap' => 'Pak abdau',
            'role_id' => 2,
            'email' => 'abdau@gmail.com',
            'password' => Hash::make('macan'),
            'remember_token' => Str::random(60),
        ]);
        
    }
}
