<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@kampus.ac.id',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Staff
        User::create([
            'name' => 'Petugas Fasilitas',
            'email' => 'staff1@kampus.ac.id',
            'role' => 'staff',
            'password' => Hash::make('staff123'),
        ]);

        User::create([
            'name' => 'Petugas Fasilitas',
            'email' => 'staff2@kampus.ac.id',
            'role' => 'staff',
            'password' => Hash::make('staff123'),
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Muhamad Arief Rachmatullah',
            'email' => 'arief@kampus.ac.id',
            'role' => 'mahasiswa',
            'password' => Hash::make('mahasiswa123'),
        ]);
        
        $faker = \Faker\Factory::create('id_ID'); 
        // 3. GENERATE MAHASISWA (50 Orang)
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => $faker->name,
                // Email unik: mhs1@..., mhs2@...
                'email' => 'mhs' . $i . '@kampus.ac.id', 
                'role' => 'mahasiswa',
                'password' => Hash::make('password'),
            ]);
        }

    }
}
