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
            'email' => 'macan@gmail.com',
            'nama_lengkap' => 'Macan Tutul',
            'password' => Hash::make('macan'),
            'role_id' => 1, 
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'kode_identitas' => 2,
            'email' => 'harun@gmail.com',
            'nama_lengkap' => 'Harun Worker',
            'password' => Hash::make('harun'),
            'role_id' => 2,
            'remember_token' => Str::random(60),
        ]);
        
    }
}
