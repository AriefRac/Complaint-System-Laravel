<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Fasilitas Ruangan',
            'description' => 'Pengaduan terkait fasilitas di dalam ruangan',
        ]);

        Category::create([
            'name' => 'Sanitasi',
            'description' => 'Pengaduan terkait kebersihan dan sanitasi',
        ]);

        Category::create([
            'name' => 'Elektronik',
            'description' => 'Pengaduan terkait perangkat elektronik',
        ]);

        Category::create([
            'name' => 'Listrik',
            'description' => 'Pengaduan terkait instalasi listrik',
        ]);
        
        Category::create([
            'name' => 'Bangunan',
            'description' => 'Pengaduan terkait struktur bangunan',
        ]);
        
        Category::create([
            'name' => 'Lainnya',
            'description' => 'Pengaduan kategori lainnya',
        ]);
    }
}
