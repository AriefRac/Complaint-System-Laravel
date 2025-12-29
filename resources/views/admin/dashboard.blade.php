{{-- resources/views/admin/dashboard.blade.php --}}
<x-admin-layout>
    <x-slot name="title">Dashboard Admin - Sistem Pengaduan Fasilitas</x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2 lg:grid-cols-4">
        <x-stat-card 
            title="Total Pengaduan" 
            value="156" 
            icon="clipboard-list"
            color="blue"
            trend="+12%"
            trendUp="true"
        />
        <x-stat-card 
            title="Menunggu Verifikasi" 
            value="28" 
            icon="clock"
            color="yellow"
            trend="+5"
            trendUp="true"
        />
        <x-stat-card 
            title="Dalam Proses" 
            value="45" 
            icon="cog"
            color="indigo"
            trend="-3"
            trendUp="false"
        />
        <x-stat-card 
            title="Selesai" 
            value="83" 
            icon="check-circle"
            color="green"
            trend="+15%"
            trendUp="true"
        />
    </div>

    <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-3">
        <!-- Recent Complaints -->
        <div class="lg:col-span-2">
            <x-card title="Pengaduan Terbaru">
                <x-slot name="action">
                    <select class="px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option>Semua Status</option>
                        <option>Menunggu</option>
                        <option>Proses</option>
                        <option>Selesai</option>
                    </select>
                </x-slot>

                <div class="space-y-4">
                    <x-complaint-item 
                        id="ADU-2025-001"
                        title="AC Rusak di Ruang Kelas A301"
                        category="Fasilitas Ruangan"
                        user="Ahmad Rifai"
                        time="2 jam yang lalu"
                        status="pending"
                        priority="high"
                    />
                    <x-complaint-item 
                        id="ADU-2025-002"
                        title="Toilet Lantai 3 Mampet"
                        category="Sanitasi"
                        user="Siti Nurhaliza"
                        time="5 jam yang lalu"
                        status="in-progress"
                        priority="urgent"
                    />
                    <x-complaint-item 
                        id="ADU-2025-003"
                        title="Proyektor Lab Komputer Error"
                        category="Elektronik"
                        user="Budi Santoso"
                        time="1 hari yang lalu"
                        status="resolved"
                        priority="medium"
                    />
                    <x-complaint-item 
                        id="ADU-2025-004"
                        title="Lampu Koridor Gedung B Mati"
                        category="Listrik"
                        user="Dewi Lestari"
                        time="1 hari yang lalu"
                        status="pending"
                        priority="medium"
                    />
                    <x-complaint-item 
                        id="ADU-2025-005"
                        title="Pintu Perpustakaan Rusak"
                        category="Bangunan"
                        user="Eko Prasetyo"
                        time="2 hari yang lalu"
                        status="in-progress"
                        priority="high"
                    />
                </div>

                <div class="mt-6 text-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline">
                        Lihat Semua Pengaduan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </x-card>
        </div>

        <!-- Category Stats & Quick Actions -->
        <div class="space-y-6">
            <x-card title="Kategori Pengaduan">
                <div class="space-y-3">
                    <x-category-stat name="Fasilitas Ruangan" count="42" color="blue" />
                    <x-category-stat name="Sanitasi" count="28" color="green" />
                    <x-category-stat name="Elektronik" count="35" color="purple" />
                    <x-category-stat name="Listrik" count="24" color="yellow" />
                    <x-category-stat name="Bangunan" count="18" color="red" />
                    <x-category-stat name="Lainnya" count="9" color="gray" />
                </div>
            </x-card>

            <x-card title="Statistik Pengguna">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Total Pengguna</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">342</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Mahasiswa</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">298</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Dosen</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">38</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Staff</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">6</span>
                    </div>
                </div>
            </x-card>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <x-card title="Trend Pengaduan Bulanan">
            <div class="h-64 flex items-center justify-center text-gray-400 dark:text-gray-500">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <p class="text-sm">Grafik Statistik</p>
                </div>
            </div>
        </x-card>

        <x-card title="Status Penyelesaian">
            <div class="h-64 flex items-center justify-center text-gray-400 dark:text-gray-500">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                    </svg>
                    <p class="text-sm">Diagram Pie</p>
                </div>
            </div>
        </x-card>
    </div>
</x-admin-layout>