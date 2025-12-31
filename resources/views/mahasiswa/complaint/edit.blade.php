<x-mahasiswa-layout>
    <x-slot name="title">Edit Laporan #{{ $complaint->id }} - FasKampus</x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <div class="flex items-center space-x-3 mb-4">
                <a href="{{ route('complaints.index') }}"
                    class="p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Laporan Pengaduan</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Perbarui informasi laporan Anda</p>
                </div>
            </div>
        </div>

        {{-- Perhatikan Action Route ke Update dan Method PUT --}}
        <form method="POST" action="{{ route('complaints.update', $complaint->id) }}" enctype="multipart/form-data" 
        x-data="{
            // Jika ada gambar lama, masukkan ke array preview agar tampil
            previewImages: {{ $complaint->image ? json_encode([asset('storage/' . $complaint->image)]) : '[]' }},
            
            handleFileUpload(event) {
                const files = Array.from(event.target.files);
                const maxSize = 2 * 1024 * 1024;
                
                // Reset preview karena kita hanya support 1 gambar (replace)
                this.previewImages = [];

                files.forEach(file => {
                    if (file.size > maxSize) {
                        alert('Ukuran file terlalu besar! Maksimal 2MB.');
                        event.target.value = ''; 
                        return; 
                    }

                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previewImages.push(e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            },
            removeImage(index) {
                this.previewImages.splice(index, 1);
                // Reset input file agar saat disubmit tidak mengirim gambar kosong/error
                document.getElementById('fileInput').value = '';
            },
        }" class="space-y-6">
            @csrf
            @method('PUT') {{-- PENTING: Method Spoofing untuk Update --}}

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 space-y-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Informasi Pengaduan</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Judul Pengaduan <span class="text-red-500">*</span>
                            </label>
                            {{-- Gunakan old('field', default_value) --}}
                            <input name="title" type="text" value="{{ old('title', $complaint->title) }}" required
                                placeholder="Contoh: AC Rusak di Ruang Kelas A301"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="category_id" required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ old('category_id', $complaint->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Deskripsi Masalah <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" required rows="5"
                                placeholder="Jelaskan masalah yang Anda temukan secara detail..."
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">{{ old('description', $complaint->description) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Lokasi Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input name="location" type="text" required value="{{ old('location', $complaint->location) }}"
                                placeholder="Contoh: Gedung A, Lantai 3, Ruang A301"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Update Foto Bukti <span class="text-gray-500">(Biarkan kosong jika tidak ingin mengubah)</span>
                            </label>
                            <div
                                class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-8 text-center hover:border-primary-500 dark:hover:border-primary-400 transition-colors duration-200">
                                <input name="image" type="file" id="fileInput" accept="image/*"
                                    @change="handleFileUpload($event)" class="hidden">
                                <label for="fileInput" class="cursor-pointer">
                                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-gray-700 dark:text-gray-300 font-medium mb-1">Klik untuk ganti foto atau drag & drop</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">PNG, JPG, JPEG hingga 2MB</p>
                                </label>
                            </div>
                        </div>

                        <div x-show="previewImages.length > 0" class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <template x-for="(image, index) in previewImages" :key="index">
                                <div class="relative group">
                                    <img :src="image"
                                        class="w-full h-48 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-700">
                                    
                                    {{-- Badge Info jika ini gambar lama --}}
                                    <span x-show="image.includes('storage')" class="absolute bottom-2 left-2 px-2 py-1 bg-black/50 text-white text-xs rounded">Foto Saat Ini</span>

                                    <button type="button" @click="removeImage(index)"
                                        class="absolute top-2 right-2 p-2 bg-red-500 text-white rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:bg-red-600" title="Hapus Foto">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('complaints.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </div>

        </form>
        
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const dropZone = document.querySelector('[for="fileInput"]').parentElement;

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropZone.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    dropZone.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    dropZone.addEventListener(eventName, unhighlight, false);
                });

                function highlight(e) {
                    dropZone.classList.add('border-primary-500', 'bg-primary-50', 'dark:bg-primary-900/20');
                }

                function unhighlight(e) {
                    dropZone.classList.remove('border-primary-500', 'bg-primary-50', 'dark:bg-primary-900/20');
                }

                dropZone.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    const fileInput = document.getElementById('fileInput');
                    fileInput.files = files;
                    fileInput.dispatchEvent(new Event('change'));
                }
            });
        </script>
    @endpush
</x-mahasiswa-layout>