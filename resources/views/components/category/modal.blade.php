<div x-data="{ 
    modalOpen: false, 
    modalType: 'create',
    modalAction: '',
    baseUrl: '{{ route('admin.categories.index') }}',
    formData: {
        name: '',
        description: '',
    },
    resetForm() {
        this.formData = {
            name: '',
            description: '',
        }
    },
    initModal(payload) {
        if (payload === 'create') {
            this.modalType = 'create';
            this.modalAction = '{{ route('admin.categories.store') }}';
            this.resetForm();
        } else {
            this.modalType = payload.type;
            this.modalAction = this.baseUrl + '/' + payload.id; 
            
            if (payload.type === 'edit') {
                this.formData.name = payload.name;
                this.formData.description = payload.description;
            }
        }
        
        this.modalOpen = true;
    }
}" @open-modal.window="initModal($event.detail)" @keydown.escape.window="modalOpen = false">

    <!-- Create/Edit Modal -->
    <div x-show="modalOpen && (modalType === 'create' || modalType === 'edit')" x-cloak
        class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75"
                @click="modalOpen = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-2xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-gray-800 shadow-xl rounded-2xl">

                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white"
                        x-text="modalType === 'create' ? 'Tambah Kategori Baru' : 'Edit Kategori'"></h3>
                    <button @click="modalOpen = false"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form method="POST" :action="modalAction" class="space-y-6">
                    @csrf

                    <template x-if="modalType === 'edit'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" x-model="formData.name" required
                            placeholder="Masukkan nama kategori"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" x-model="formData.description" required rows="4"
                            placeholder="Masukkan deskripsi kategori"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
                    </div>

                    <div
                        class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <button type="button" @click="modalOpen = false"
                            class="px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition-colors duration-200">
                            <span x-text="modalType === 'create' ? 'Simpan' : 'Update'"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    {{-- <div x-show="modalOpen && modalType === 'view'" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75"
                @click="modalOpen = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-2xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-gray-800 shadow-xl rounded-2xl">

                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Kategori</h3>
                    <button @click="modalOpen = false"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div>
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Fasilitas Ruangan</h4>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Deskripsi</label>
                        <p class="text-gray-900 dark:text-white">Pengaduan terkait fasilitas di dalam ruangan seperti
                            AC, kursi, meja, dan peralatan lainnya</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Total
                                Pengaduan</label>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">42</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Dibuat
                                Pada</label>
                            <p class="text-gray-900 dark:text-white">15 Januari 2025</p>
                        </div>
                    </div>
                </div>

                <div
                    class="flex items-center justify-end space-x-3 pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                    <button type="button" @click="modalOpen = false"
                        class="px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Delete Modal -->
    <div x-show="modalOpen && modalType === 'delete'" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75"
                @click="modalOpen = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-gray-800 shadow-xl rounded-2xl">

                <div
                    class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-red-100 dark:bg-red-900 rounded-full">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <h3 class="mb-2 text-xl font-bold text-center text-gray-900 dark:text-white">Hapus Kategori?</h3>
                <p class="mb-6 text-sm text-center text-gray-600 dark:text-gray-400">
                    Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.
                </p>

                <form :action="modalAction" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex items-center justify-center space-x-3">
                        <button type="button" @click="modalOpen = false"
                            class="px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                            Batal
                        </button>
                        <input type="text">
                        <button type="submit" @click="handleSubmit()"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors duration-200">
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>