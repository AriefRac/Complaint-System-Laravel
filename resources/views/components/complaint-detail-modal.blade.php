{{-- resources/views/components/complaint-detail-modal.blade.php --}}
<div x-data="{ 
    modalOpen: false, 
    complaintId: null,
    activeTab: 'detail',
    statusUpdate: 'pending',
    priorityUpdate: 'medium',
    note: '',
    handleStatusUpdate() {
        console.log('Status update:', this.statusUpdate, this.note);
        this.modalOpen = false;
    }
}" 
@open-complaint-detail.window="
    complaintId = $event.detail; 
    modalOpen = true;
    activeTab = 'detail';
"
@keydown.escape.window="modalOpen = false">

    <div x-show="modalOpen" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="modalOpen" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75" 
                 @click="modalOpen = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <div x-show="modalOpen" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block w-full max-w-5xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-gray-800 shadow-xl rounded-2xl">
                
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Pengaduan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">ADU-2025-001</p>
                    </div>
                    <button @click="modalOpen = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Tabs -->
                <div class="mb-6 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex space-x-8">
                        <button @click="activeTab = 'detail'" 
                                :class="activeTab === 'detail' ? 'border-primary-600 text-primary-600 dark:border-primary-400 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300'"
                                class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                            Detail Pengaduan
                        </button>
                        <button @click="activeTab = 'timeline'" 
                                :class="activeTab === 'timeline' ? 'border-primary-600 text-primary-600 dark:border-primary-400 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300'"
                                class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                            Timeline
                        </button>
                        <button @click="activeTab = 'action'" 
                                :class="activeTab === 'action' ? 'border-primary-600 text-primary-600 dark:border-primary-400 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300'"
                                class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                            Kelola Pengaduan
                        </button>
                    </nav>
                </div>

                <!-- Detail Tab -->
                <div x-show="activeTab === 'detail'" class="space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Main Info -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">AC Rusak di Ruang Kelas A301</h4>
                                <div class="flex items-center space-x-4 text-sm text-gray-600 dark:text-gray-400 mb-4">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                        Fasilitas Ruangan
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        28 Des 2024, 10:30
                                    </span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                        Menunggu
                                    </span>
                                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300">
                                        Prioritas Tinggi
                                    </span>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Deskripsi</h5>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                    AC di ruang kelas A301 tidak berfungsi sejak kemarin. Suhu ruangan sangat panas dan mengganggu proses pembelajaran. Mohon segera diperbaiki karena ada jadwal kuliah intensif minggu ini.
                                </p>
                            </div>

                            <!-- Location -->
                            <div>
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Lokasi</h5>
                                <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/>
                                    </svg>
                                    <span class="text-gray-900 dark:text-white">Gedung A, Lantai 3, Ruang A301</span>
                                </div>
                            </div>

                            <!-- Images -->
                            <div>
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Foto Bukti</h5>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="aspect-square bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden">
                                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="aspect-square bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden">
                                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-6">
                            <!-- Reporter Info -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Pelapor</h5>
                                <div class="flex items-center space-x-3">
                                    <img class="w-12 h-12 rounded-full" src="https://ui-avatars.com/api/?name=Ahmad+Rifai&background=3b82f6&color=fff" alt="Ahmad Rifai">
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Ahmad Rifai</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">2021010001</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">ahmad.rifai@kampus.ac.id</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Kontak</h5>
                                <div class="space-y-2">
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        081234567890
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        ahmad.rifai@kampus.ac.id
                                    </div>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Statistik</h5>
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">Total Pengaduan</span>
                                        <span class="font-medium text-gray-900 dark:text-white">5</span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">Selesai</span>
                                        <span class="font-medium text-green-600 dark:text-green-400">3</span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">Proses</span>
                                        <span class="font-medium text-blue-600 dark:text-blue-400">2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Tab -->
                <div x-show="activeTab === 'timeline'" class="space-y-4">
                    <div class="flex">
                        <div class="flex flex-col items-center mr-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                            <div class="w-0.5 h-full bg-gray-300 dark:bg-gray-600"></div>
                        </div>
                        <div class="pb-8 flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Pengaduan Dibuat</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">28 Des 2024, 10:30 WIB</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Pengaduan berhasil dibuat oleh Ahmad Rifai</p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex flex-col items-center mr-4">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="w-0.5 h-full bg-gray-300 dark:bg-gray-600"></div>
                        </div>
                        <div class="pb-8 flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Menunggu Verifikasi</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">28 Des 2024, 10:30 WIB</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Pengaduan menunggu verifikasi dari admin</p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex flex-col items-center mr-4">
                            <div class="w-8 h-8 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-400 dark:text-gray-500">Menunggu Tindakan</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Belum ada update</p>
                        </div>
                    </div>
                </div>

                <!-- Action Tab -->
                <div x-show="activeTab === 'action'">
                    <form @submit.prevent="handleStatusUpdate" class="space-y-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Update Status <span class="text-red-500">*</span>
                                </label>
                                <select x-model="statusUpdate"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    <option value="pending">Menunggu</option>
                                    <option value="verified">Verifikasi</option>
                                    <option value="in-progress">Proses</option>
                                    <option value="resolved">Selesai</option>
                                    <option value="rejected">Tolak</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Update Prioritas <span class="text-red-500">*</span>
                                </label>
                                <select x-model="priorityUpdate"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    <option value="low">Rendah</option>
                                    <option value="medium">Sedang</option>
                                    <option value="high">Tinggi</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Catatan/Komentar <span class="text-red-500">*</span>
                            </label>
                            <textarea x-model="note"
                                      required
                                      rows="4"
                                      placeholder="Tambahkan catatan atau komentar terkait pengaduan..."
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <button type="button" 
                                    @click="modalOpen = false"
                                    class="px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                                Batal
                            </button>
                            <button type="submit"
                                    class="px-6 py-2.5 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition-colors duration-200">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</div>