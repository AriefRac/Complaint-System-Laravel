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
            'email' => 'staff@kampus.ac.id',
            'role' => 'staff',
            'password' => Hash::make('staff123'),
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Muhamad Arief Rachmatullah',
            'email' => 'mahasiswa@kampus.ac.id',
            'role' => 'mahasiswa',
            'password' => Hash::make('mahasiswa123'),
        ]);
    }
}
