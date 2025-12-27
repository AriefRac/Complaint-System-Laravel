{{-- resources/views/admin/categories/index.blade.php --}}
<x-admin-layout>
    <x-slot name="title">Manajemen Kategori</x-slot>

    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Kategori Pengaduan</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola kategori pengaduan fasilitas kampus</p>
            </div>
            <button @click="$dispatch('open-modal', 'create')" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Kategori
            </button>
        </div>
    </div>

    <x-card title="Daftar Kategori">
        <x-slot name="action">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <input type="text" placeholder="Cari kategori..." class="w-64 px-4 py-2 pl-10 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </x-slot>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 dark:text-gray-400 uppercase bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Nama Kategori</th>
                        <th class="px-6 py-3">Deskripsi</th>
                        <th class="px-6 py-3">Jumlah Pengaduan</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    foreach ($categories as $category) :
                    @endphp
                        <x-category.table-row 
                            name="{{ $category->name }}"
                            description="{{ $category->description }}"
                            count="-"
                            id="{{ $category->id }}"
                        /> 
                    @php
                    endforeach
                    @endphp
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Menampilkan <span class="font-medium">1-6</span> dari <span class="font-medium">6</span> kategori
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50" disabled>
                    Sebelumnya
                </button>
                <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50" disabled>
                    Selanjutnya
                </button>
            </div>
        </div>
    </x-card>

    <x-category.modal />
</x-admin-layout>