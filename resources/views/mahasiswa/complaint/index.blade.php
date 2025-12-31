<x-mahasiswa-layout>
    <x-slot name="title">Pengaduan Saya - FasKampus</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Pengaduan Saya</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola dan pantau status pengaduan fasilitas Anda
                    </p>
                </div>
                <a href="{{ route('complaints.create') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Pengaduan Baru
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <!-- Total -->
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium mb-1">Total Pengaduan</p>
                        <p class="text-3xl font-bold">{{ $stats['total'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending -->
            <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-amber-100 text-sm font-medium mb-1">Menunggu</p>
                        <p class="text-3xl font-bold">{{ $stats['pending'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- In Progress -->
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium mb-1">Dalam Proses</p>
                        <p class="text-3xl font-bold">{{ $stats['in_progress'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium mb-1">Selesai</p>
                        <p class="text-3xl font-bold">{{ $stats['done'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 mb-6">
    {{-- FORM GET --}}
    <form method="GET" action="{{ route('complaints.index') }}">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            
            <div class="md:col-span-2">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="Cari pengaduan..."
                        class="w-full pl-10 pr-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    
                    {{-- Icon Search (Klik untuk submit) --}}
                    <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div>
                <select name="status" onchange="this.form.submit()"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <option value="all">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                    <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Ditinjau</option>
                    <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>Dalam Proses</option>
                    <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Selesai</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div>
                <select name="category" onchange="this.form.submit()"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <option value="all">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>

        <!-- Complaints List -->
        <div class="space-y-4">

            <!-- Complaint Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($complaints as $complaint)
                    <x-mahasiswa.complaint-card :complaint="$complaint" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">Belum ada pengaduan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Empty State -->
            <div x-show="complaints.length === 0"
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                <svg class="w-24 h-24 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Pengaduan</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Anda belum membuat pengaduan. Mulai laporkan masalah
                    fasilitas kampus Anda.</p>
                <a href="/student/complaints/create"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Pengaduan Pertama
                </a>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Menampilkan
                <span class="font-medium">{{ $complaints->firstItem() ?? 0 }}</span>
                sampai
                <span class="font-medium">{{ $complaints->lastItem() ?? 0 }}</span>
                dari
                <span class="font-medium">{{ $complaints->total() }}</span>
                pengaduan
            </div>

            <div class="flex items-center space-x-2">

                {{-- TOMBOL PREVIOUS --}}
                @if ($complaints->onFirstPage())
                    {{-- Tampilan Disabled (Jika di Halaman 1) --}}
                    <button disabled
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-400 dark:text-gray-600 cursor-not-allowed bg-gray-50 dark:bg-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                @else
                    {{-- Tampilan Aktif (Bisa diklik) --}}
                    <a href="{{ $complaints->previousPageUrl() }}"
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                @endif

                {{-- TOMBOL NOMOR HALAMAN (LOOPING) --}}
                {{-- Kita batasi link agar tidak terlalu panjang jika halaman banyak --}}
                @foreach ($complaints->getUrlRange(max(1, $complaints->currentPage() - 2), min($complaints->lastPage(), $complaints->currentPage() + 2)) as $page => $url)
                    @if ($page == $complaints->currentPage())
                        {{-- Style Halaman Aktif (Gradient Biru-Ungu) --}}
                        <span
                            class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium shadow-md">
                            {{ $page }}
                        </span>
                    @else
                        {{-- Style Halaman Tidak Aktif --}}
                        <a href="{{ $url }}"
                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                {{-- TOMBOL NEXT --}}
                @if ($complaints->hasMorePages())
                    {{-- Tampilan Aktif (Bisa diklik) --}}
                    <a href="{{ $complaints->nextPageUrl() }}"
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    {{-- Tampilan Disabled (Jika di Halaman Terakhir) --}}
                    <button disabled
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-400 dark:text-gray-600 cursor-not-allowed bg-gray-50 dark:bg-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @endif

            </div>
        </div>
    </div>
    </x-student-layout>