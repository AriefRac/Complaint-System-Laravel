<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Database\Seeder;

class ComplaintSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = User::where('role', 'mahasiswa')->pluck('id');

        $categories = Category::all();

        if ($students->isEmpty() || $categories->isEmpty()) {
            $this->command->warn('SKIP: Harap jalankan UserSeeder dan CategorySeeder terlebih dahulu.');
            return;
        }

        $samples = [
            [
                'title' => 'AC Ruang Kelas A301 Bocor',
                'description' => 'Air AC menetes deras ke lantai, sangat mengganggu perkuliahan dan licin bagi mahasiswa yang lewat.',
                'location' => 'Gedung A, Lantai 3, Ruang 301',
                'category_name' => 'Fasilitas Ruangan',
                'priority' => 'high',
                'status' => 'pending',
                'admin_note' => null,
            ],
            [
                'title' => 'Lampu Koridor Gedung B Mati Total',
                'description' => 'Sepanjang lorong lantai 2 gelap gulita saat malam hari, berpotensi bahaya keamanan.',
                'location' => 'Gedung B, Lorong Lantai 2',
                'category_name' => 'Listrik',
                'priority' => 'medium',
                'status' => 'verified',
                'admin_note' => 'Sudah diverifikasi oleh petugas jaga malam.',
            ],
            [
                'title' => 'Keran Air Toilet Pria Patah',
                'description' => 'Keran wastafel patah dan air muncrat terus menerus, tolong segera dimatikan sentralnya.',
                'location' => 'Toilet Pria, Gedung C Lantai 1',
                'category_name' => 'Sanitasi',
                'priority' => 'urgent',
                'status' => 'in_progress',
                'admin_note' => 'Sedang menunggu teknisi membawa suku cadang pengganti.',
            ],
            [
                'title' => 'Proyektor Lab Komputer Buram',
                'description' => 'Tampilan proyektor berbintik-bintik dan warnanya pudar, sulit membaca slide dosen.',
                'location' => 'Lab Komputer 2',
                'category_name' => 'Elektronik',
                'priority' => 'medium',
                'status' => 'resolved',
                'admin_note' => 'Lensa sudah dibersihkan dan kabel VGA diganti dengan HDMI baru.',
            ],
            [
                'title' => 'Tembok Kelas Retak',
                'description' => 'Ada retakan panjang di dinding belakang kelas, khawatir makin parah.',
                'location' => 'Gedung A, Ruang 102',
                'category_name' => 'Bangunan',
                'priority' => 'low',
                'status' => 'verified',
                'admin_note' => 'Akan dijadwalkan pengecekan struktur minggu depan.',
            ],
            [
                'title' => 'Kursi Taman Rusak Diduduki',
                'description' => 'Kaki kursi besi bengkok karena diduduki 3 orang sekaligus.',
                'location' => 'Taman Depan Perpustakaan',
                'category_name' => 'Fasilitas Ruangan',
                'priority' => 'low',
                'status' => 'rejected',
                'admin_note' => 'Kerusakan akibat kelalaian penggunaan (over capacity) bukan prioritas perbaikan saat ini.',
            ],
            [
                'title' => 'WiFi Perpustakaan Tidak Connect',
                'description' => 'Sudah 2 hari wifi id tidak bisa connect di area baca lantai 3.',
                'location' => 'Perpustakaan Lantai 3',
                'category_name' => 'Lainnya', 
                'priority' => 'high',
                'status' => 'pending',
                'admin_note' => null,
            ],
        ];

        foreach ($samples as $data) {
            $category = $categories->firstWhere('name', $data['category_name']);
            $categoryId = $category ? $category->id : $categories->random()->id;

            Complaint::create([
                'user_id' => $students->random(),
                'category_id' => $categoryId,
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => null,
                'location' => $data['location'],
                'priority' => $data['priority'],
                'status' => $data['status'], 
                'admin_note' => $data['admin_note'],
                'created_at' => now()->subDays(rand(0, 14))->subHours(rand(1, 12)),
                'updated_at' => now(),
            ]);
        }
    }
}
