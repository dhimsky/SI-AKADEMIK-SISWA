<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => '1',
            'level' => 'admin',
        ]);
        Role::create([
            'id' => '2',
            'level' => 'Guru',
        ]);
        Role::create([
            'id' => '3',
            'level' => 'siswa',
        ]);
        Role::create([
            'id' => '4',
            'level' => 'Kepala Sekolah',
        ]);
    }
}
