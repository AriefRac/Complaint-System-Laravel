{{-- resources/views/admin/dashboard.blade.php --}}
<x-admin-layout>
    <x-slot name="title">Dashboard Admin - Sistem Pengaduan Fasilitas</x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2 lg:grid-cols-4">
        <x-stat-card title="Total Pengaduan" value="{{$stats['total']}}" icon="clipboard-list" color="blue" />
        <x-stat-card title="Menunggu Verifikasi" value="{{$stats['pending']}}" icon="clock" color="yellow" />
        <x-stat-card title="Dalam Proses" value="{{$stats['process']}}" icon="cog" color="indigo" />
        <x-stat-card title="Selesai" value="{{$stats['done']}}" icon="check-circle" color="green" />
    </div>

    <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-3">
        <!-- Recent Complaints -->
        <div class="lg:col-span-2">
            <x-card title="Pengaduan Terbaru">

                <div class="space-y-4">
                    @foreach ($recentComplaints as $complaint)
                        <x-complaint-item 
                            :id="'ADU-' . $complaint->id" 
                            :title="$complaint->title"
                            :category="$complaint->category->name ?? 'Tanpa Kategori'"
                            :user="$complaint->user->name ?? 'User Terhapus'"
                            :status="$complaint->status" 
                            :priority="$complaint->priority ?? 'medium'" />
                    @endforeach

                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('admin.complaints.index') }}"
                        class="inline-flex items-center text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline">
                        Lihat Semua Pengaduan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </x-card>
        </div>

        <!-- Category Stats & Quick Actions -->
        <div class="space-y-6">
            <x-card title="Kategori Pengaduan">
                <div class="space-y-3">
                    @foreach($categories as $category)

                        @php
                            $colors = ['blue', 'green', 'purple', 'yellow', 'red', 'gray'];
                            $color = $colors[$loop->index % count($colors)];
                        @endphp
                        
                        <x-category-stat 
                            :name="$category->name" 
                            :count="$category->complaints_count" 
                            :color="$color" 
                        />
                    @endforeach
                </div>
            </x-card>

            <x-card title="Statistik Pengguna">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Total Pengguna</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $userStats['total'] }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Admin</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $userStats['admin'] }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Mahasiswa</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $userStats['mahasiswa'] }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Staff</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $userStats['staff'] }}</span>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-admin-layout>