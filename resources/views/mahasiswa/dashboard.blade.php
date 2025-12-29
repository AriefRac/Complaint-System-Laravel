{{-- resources/views/student/dashboard.blade.php --}}
<x-mahasiswa-layout>
    <x-slot name="title">Dashboard - FasKampus</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <div
                class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-xl p-8 text-white overflow-hidden relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }} 👋</h1>
                    <p class="text-blue-100 mb-6">Pantau dan kelola pengaduan fasilitas kampus Anda dengan mudah</p>
                    <a href="{{ route('complaints.create') }}"
                        class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-all duration-300 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Buat Laporan Baru
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <x-stat-card title="Total Laporan" value="{{ $stats['total'] }}" icon="clipboard-list" color="blue-gradient" />
            <x-stat-card title="Dalam Proses" value="{{ $stats['process'] }}" icon="clock" color="yellow-gradient" />
            <x-stat-card title="Selesai" value="{{ $stats['done'] }}" icon="check-circle" color="green-gradient" />
            <x-stat-card title="Tingkat Selesai" value="{{ $statPersen }}%" icon="trend" color="indigo-gradient" />
        </div>

        
            <!-- Recent Complaints -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div
                        class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pengaduan Terakhir</h3>
                        <a href="{{ route('complaints.index') }}"
                            class="text-sm text-primary-600 dark:text-primary-400 hover:underline font-medium">Lihat Semua</a>
                    </div>
                    <div class="p-6 space-y-4">
                        @forelse($complaints as $complaint)
                            <x-mahasiswa.complaint-card :complaint="$complaint" />
                        @empty
                            <div class="col-span-full text-center py-12">
                                <p class="text-gray-500">Belum ada pengaduan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Info -->
            
        
        <!-- FAQ Section -->
        <div class="mt-8">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Pertanyaan Umum</h3>
            <div class="space-y-3" x-data="{ openFaq: null }">
                <!-- FAQ 1 -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <button @click="openFaq = openFaq === 1 ? null : 1"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <span class="font-medium text-gray-900 dark:text-white">Berapa lama waktu yang dibutuhkan untuk
                            menindaklanjuti laporan?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200"
                            :class="openFaq === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openFaq === 1" x-collapse class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Tim kami akan merespons laporan Anda dalam
                            1x24 jam. Untuk masalah urgent, kami akan segera menindaklanjuti dalam waktu kurang dari 6
                            jam.</p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <button @click="openFaq = openFaq === 2 ? null : 2"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <span class="font-medium text-gray-900 dark:text-white">Apakah saya akan mendapat notifikasi
                            tentang status laporan?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200"
                            :class="openFaq === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openFaq === 2" x-collapse class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Ya, Anda akan menerima notifikasi email dan
                            notifikasi di aplikasi setiap kali ada pembaruan status pada laporan Anda.</p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <button @click="openFaq = openFaq === 3 ? null : 3"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <span class="font-medium text-gray-900 dark:text-white">Apakah laporan saya bersifat
                            anonim?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200"
                            :class="openFaq === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openFaq === 3" x-collapse class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Tidak, laporan Anda tidak anonim karena kami
                            perlu menghubungi Anda untuk informasi lebih lanjut. Namun, identitas Anda akan dijaga
                            kerahasiaannya dan hanya diakses oleh pihak yang berwenang.</p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <button @click="openFaq = openFaq === 4 ? null : 4"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <span class="font-medium text-gray-900 dark:text-white">Bagaimana jika saya ingin membatalkan
                            laporan?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200"
                            :class="openFaq === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openFaq === 4" x-collapse class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Anda dapat membatalkan laporan yang masih
                            berstatus "Pending" atau "Dalam Review" melalui halaman detail laporan. Laporan yang sudah
                            diproses tidak dapat dibatalkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-mahasiswa-layout>