<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AngkatanSeeder::class,
            JurusanSeeder::class,
            TahunPelajaranSeeder::class,
            MapelSeeder::class,
            RombelSeeder::class,
            KelasSeeder::class,
            GuruSeeder::class,
        ]);
    }
}