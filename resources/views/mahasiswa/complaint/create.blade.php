{{-- resources/views/student/complaints/create.blade.php --}}
<x-mahasiswa-layout>
    <x-slot name="title">Buat Laporan Baru - FasKampus</x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center space-x-3 mb-4">
                <a href="{{ route('dashboard') }}"
                    class="p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Buat Laporan Pengaduan</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Laporkan masalah fasilitas kampus Anda</p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data" x-data="{
            previewImages: [],
            handleFileUpload(event) {
                const files = Array.from(event.target.files);
                files.forEach(file => {
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
            },
        }"  class="space-y-6">
        @csrf

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 space-y-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Masukkan Informasi Kerusakan</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Judul Pengaduan <span class="text-red-500">*</span>
                            </label>
                            <input name="title" type="text" value="{{ old('title') }}" required
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
                                    <option value="{{ $category->id }}" {{old('category') === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Deskripsi Masalah <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" required rows="5"
                                placeholder="Jelaskan masalah yang Anda temukan secara detail..."
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Lokasi Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input name="location" type="text" required
                                placeholder="Contoh: Gedung A, Lantai 3, Ruang A301"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Upload Foto Bukti <span class="text-gray-500">(Opsional)</span>
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
                                    <p class="text-gray-700 dark:text-gray-300 font-medium mb-1">Klik untuk upload atau
                                        drag & drop</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">PNG, JPG, JPEG hingga 2MB
                                        (Masukkan 1 foto)</p>
                                </label>
                            </div>
                        </div>

                        <!-- Preview Images -->
                        <div x-show="previewImages.length > 0" class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <template x-for="(image, index) in previewImages" :key="index">
                                <div class="relative group">
                                    <img :src="image"
                                        class="w-full h-48 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-700">
                                    <button type="button" @click="removeImage(index)"
                                        class="absolute top-2 right-2 p-2 bg-red-500 text-white rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:bg-red-600">
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

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-8 py-3 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white font-semibold rounded-lg shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Kirim Pengaduan
                    </button>
                </div>
            </div>

        </form>

        <!-- Help Section -->
        <div
            class="mt-8 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-xl border border-blue-200 dark:border-blue-800 p-6">
            <div class="flex items-start space-x-4">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Butuh Bantuan?</h4>
                    <p class="text-gray-700 dark:text-gray-300 mb-3">Jika Anda mengalami kesulitan dalam membuat
                        laporan, hubungi kami melalui:</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="mailto:support@kampus.ac.id"
                            class="inline-flex items-center space-x-2 px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg hover:shadow-md transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm">Email</span>
                        </a>
                        <a href="tel:+6212345678"
                            class="inline-flex items-center space-x-2 px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg hover:shadow-md transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-sm">Telepon</span>
                        </a>
                        <a href="https://wa.me/6212345678"
                            class="inline-flex items-center space-x-2 px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg hover:shadow-md transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-sm">WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            // Additional JavaScript for drag & drop functionality
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
    </x-student-layout>