{{-- resources/views/admin/complaints/index.blade.php --}}
<x-admin-layout>
    <x-slot name="title">Manajemen Pengaduan</x-slot>

    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Pengaduan</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola semua pengaduan fasilitas kampus</p>
            </div>
            <div class="flex items-center space-x-3">
                <button class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm font-medium border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Export Data
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">156</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Menunggu</p>
                    <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">28</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Proses</p>
                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">45</p>
                </div>
                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Selesai</p>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">83</p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <x-card title="Daftar Pengaduan">
        <x-slot name="action">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <input type="text" placeholder="Cari pengaduan..." class="w-64 px-4 py-2 pl-10 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <select class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option>Semua Status</option>
                    <option>Menunggu</option>
                    <option>Diverifikasi</option>
                    <option>Proses</option>
                    <option>Selesai</option>
                    <option>Ditolak</option>
                </select>
                <select class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option>Semua Prioritas</option>
                    <option>Urgent</option>
                    <option>Tinggi</option>
                    <option>Sedang</option>
                    <option>Rendah</option>
                </select>
                <select class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option>Semua Kategori</option>
                    <option>Fasilitas Ruangan</option>
                    <option>Sanitasi</option>
                    <option>Elektronik</option>
                    <option>Listrik</option>
                    <option>Bangunan</option>
                </select>
            </div>
        </x-slot>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 dark:text-gray-400 uppercase bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">ID Pengaduan</th>
                        <th class="px-6 py-3">Judul & Kategori</th>
                        <th class="px-6 py-3">Pelapor</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Prioritas</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <x-complaint-table-row 
                        id="ADU-2025-001"
                        title="AC Rusak di Ruang Kelas A301"
                        category="Fasilitas Ruangan"
                        reporter="Ahmad Rifai"
                        date="28 Des 2024"
                        priority="high"
                        status="pending"
                        detailId="1"
                    />
                    <x-complaint-table-row 
                        id="ADU-2025-002"
                        title="Toilet Lantai 3 Mampet"
                        category="Sanitasi"
                        reporter="Siti Nurhaliza"
                        date="28 Des 2024"
                        priority="urgent"
                        status="in-progress"
                        detailId="2"
                    />
                    <x-complaint-table-row 
                        id="ADU-2025-003"
                        title="Proyektor Lab Komputer Error"
                        category="Elektronik"
                        reporter="Budi Santoso"
                        date="27 Des 2024"
                        priority="medium"
                        status="verified"
                        detailId="3"
                    />
                    <x-complaint-table-row 
                        id="ADU-2025-004"
                        title="Lampu Koridor Gedung B Mati"
                        category="Listrik"
                        reporter="Dewi Lestari"
                        date="27 Des 2024"
                        priority="high"
                        status="pending"
                        detailId="4"
                    />
                    <x-complaint-table-row 
                        id="ADU-2025-005"
                        title="Pintu Perpustakaan Rusak"
                        category="Bangunan"
                        reporter="Eko Prasetyo"
                        date="26 Des 2024"
                        priority="medium"
                        status="resolved"
                        detailId="5"
                    />
                    <x-complaint-table-row 
                        id="ADU-2025-006"
                        title="Kursi Patah di Aula"
                        category="Fasilitas Ruangan"
                        reporter="Fitri Rahmawati"
                        date="26 Des 2024"
                        priority="low"
                        status="rejected"
                        detailId="6"
                    />
                    <x-complaint-table-row 
                        id="ADU-2025-007"
                        title="WiFi Lemot di Gedung C"
                        category="Elektronik"
                        reporter="Andi Wijaya"
                        date="25 Des 2024"
                        priority="medium"
                        status="in-progress"
                        detailId="7"
                    />
                    <x-complaint-table-row 
                        id="ADU-2025-008"
                        title="Keran Air Rusak"
                        category="Sanitasi"
                        reporter="Nurul Hidayah"
                        date="25 Des 2024"
                        priority="high"
                        status="resolved"
                        detailId="8"
                    />
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Menampilkan <span class="font-medium">1-8</span> dari <span class="font-medium">156</span> pengaduan
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50" disabled>
                    Sebelumnya
                </button>
                <button class="px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-primary-600 rounded-lg">1</button>
                <button class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">2</button>
                <button class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">3</button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                    Selanjutnya
                </button>
            </div>
        </div>
    </x-card>

    <x-complaint-detail-modal />
</x-admin-layout>