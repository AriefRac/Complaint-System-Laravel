{{-- resources/views/components/complaint-detail-modal.blade.php --}}
<div x-data="{ 
    modalOpen: false, 
    complaint: {}, 
    activeTab: 'detail',
    statusUpdate: '',
    priorityUpdate: '',
    note: '',
    
    statusConfig: {
        'pending': { class: 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300', label: 'Menunggu' },
        'verified': { class: 'bg-cyan-100 text-cyan-800 dark:bg-cyan-900 dark:text-cyan-300', label: 'Diverifikasi' },
        'in_progress': { class: 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300', label: 'Proses' },
        'resolved': { class: 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300', label: 'Selesai' },
        'rejected': { class: 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300', label: 'Ditolak' }
    },

    priorityConfig: {
        'low': { class: 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300', label: 'Rendah' },
        'medium': { class: 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300', label: 'Sedang' },
        'high': { class: 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300', label: 'Tinggi' },
        'urgent': { class: 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300', label: 'Urgent' }
    },

    formatDate(dateString) {
        if(!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
    }
}" 
@open-complaint-detail.window="
    complaint = $event.detail; 
    statusUpdate = complaint.status; 
    priorityUpdate = complaint.priority;
    note = ''; 
    modalOpen = true;
    activeTab = 'detail';
"
@keydown.escape.window="modalOpen = false">

    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="modalOpen" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75" @click="modalOpen = false"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <div class="inline-block w-full max-w-5xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-gray-800 shadow-xl rounded-2xl">
                
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Pengaduan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1" x-text="'ADU-' + complaint.id"></p>
                    </div>
                    <button @click="modalOpen = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="mb-6 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex space-x-8">
                        <button @click="activeTab = 'detail'" :class="activeTab === 'detail' ? 'border-primary-600 text-primary-600 dark:border-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400'" class="py-4 px-1 border-b-2 font-medium text-sm transition-colors">Detail Pengaduan</button>
                        <button @click="activeTab = 'action'" :class="activeTab === 'action' ? 'border-primary-600 text-primary-600 dark:border-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400'" class="py-4 px-1 border-b-2 font-medium text-sm transition-colors">Kelola Pengaduan</button>
                    </nav>
                </div>

                <div x-show="activeTab === 'detail'" class="space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2" x-text="complaint.title"></h4>
                                <div class="flex items-center space-x-4 text-sm text-gray-600 dark:text-gray-400 mb-4">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                        <span x-text="complaint.category?.name || 'Tanpa Kategori'"></span>
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span x-text="formatDate(complaint.created_at)"></span>
                                    </span>
                                </div>
                                
                                <div class="flex items-center space-x-2">
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full"
                                          :class="statusConfig[complaint.status]?.class || 'bg-gray-100 text-gray-800'"
                                          x-text="statusConfig[complaint.status]?.label || complaint.status">
                                    </span>
                                    
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full"
                                          :class="priorityConfig[complaint.priority]?.class || 'bg-gray-100 text-gray-800'"
                                          x-text="priorityConfig[complaint.priority]?.label || complaint.priority">
                                    </span>
                                </div>
                            </div>

                            <div>
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Deskripsi</h5>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed" x-text="complaint.description || 'Tidak ada deskripsi'"></p>
                            </div>

                            <div>
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Lokasi</h5>
                                <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                                    <span class="text-gray-900 dark:text-white" x-text="complaint.location || 'Lokasi tidak spesifik'"></span>
                                </div>
                            </div>
                            
                            <div x-show="complaint.image">
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Foto Bukti</h5>
                                <div class="aspect-video bg-gray-100 rounded-lg overflow-hidden">
                                     <img :src="'/storage/' + complaint.image" class="w-full h-full object-contain" alt="Bukti Pengaduan">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Pelapor</h5>
                                <div class="flex items-center space-x-3">
                                    <img class="w-12 h-12 rounded-full" :src="'https://ui-avatars.com/api/?name=' + (complaint.user?.name || 'User')" alt="Avatar">
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white" x-text="complaint.user?.name || 'Pengguna Terhapus'"></p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400" x-text="complaint.user?.email"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="activeTab === 'action'">
                    <form method="POST" :action="`/admin/complaints/${complaint.id}`" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Update Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status" x-model="statusUpdate"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                    <option value="pending">Menunggu</option>
                                    <option value="verified">Diverifikasi</option>
                                    <option value="in_progress">Proses</option>
                                    <option value="resolved">Selesai</option>
                                    <option value="rejected">Ditolak</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Update Prioritas <span class="text-red-500">*</span>
                                </label>
                                <select name="priority" x-model="priorityUpdate"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                    <option value="low">Rendah</option>
                                    <option value="medium">Sedang</option>
                                    <option value="high">Tinggi</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Catatan Admin
                            </label>
                            <textarea name="admin_note" x-model="note" rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                      placeholder="Tambahkan catatan..."></textarea>
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <button type="button" @click="modalOpen = false"
                                    class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                Batal
                            </button>
                            <button type="submit"
                                    class="px-6 py-2.5 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>