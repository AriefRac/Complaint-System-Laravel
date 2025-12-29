{{-- resources/views/admin/users/index.blade.php --}}
<x-admin-layout>
    <x-slot name="title">Manajemen Pengguna</x-slot>

    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Pengguna</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola data pengguna sistem pengaduan</p>
            </div>
            <button @click="$dispatch('open-user-modal', 'create')" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Pengguna
            </button>
        </div>
    </div>

    <x-card title="Daftar Pengguna">
        <x-slot name="action">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <input type="text" placeholder="Cari pengguna..." class="w-64 px-4 py-2 pl-10 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <select class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option>Semua Role</option>
                    <option>Admin</option>
                    <option>Mahasiswa</option>
                    <option>Dosen</option>
                    <option>Staff</option>
                </select>
                <select class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Nonaktif</option>
                </select>
            </div>
        </x-slot>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 dark:text-gray-400 uppercase bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Pengguna</th>
                        <th class="px-6 py-3">NIM/NIP</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Pengaduan</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <x-user.table-row 
                        name="Ahmad Rifai"
                        nim="2021010001"
                        email="ahmad.rifai@kampus.ac.id"
                        role="mahasiswa"
                        complaints="5"
                        avatar="AR"
                        id="1"
                    />
                    <x-user.table-row 
                        name="Siti Nurhaliza"
                        nim="2021010002"
                        email="siti.nurhaliza@kampus.ac.id"
                        role="mahasiswa"
                        complaints="8"
                        avatar="SN"
                        id="2"
                    />
                    <x-user.table-row 
                        name="Budi Santoso"
                        nim="2021010003"
                        email="budi.santoso@kampus.ac.id"
                        role="mahasiswa"
                        complaints="3"
                        avatar="BS"
                        id="3"
                    />
                    <x-user.table-row 
                        name="Dr. Eko Prasetyo"
                        nim="198503122010121001"
                        email="eko.prasetyo@kampus.ac.id"
                        role="dosen"
                        complaints="12"
                        avatar="EP"
                        id="4"
                    />
                    <x-user.table-row 
                        name="Dewi Lestari"
                        nim="198907152012032001"
                        email="dewi.lestari@kampus.ac.id"
                        role="staff"
                        complaints="2"
                        avatar="DL"
                        id="5"
                    />
                    <x-user.table-row 
                        name="Andi Wijaya"
                        nim="2021010004"
                        email="andi.wijaya@kampus.ac.id"
                        role="mahasiswa"
                        complaints="0"
                        avatar="AW"
                        id="6"
                    />
                    <x-user.table-row 
                        name="Prof. Nurul Hidayah"
                        nim="197801052003122001"
                        email="nurul.hidayah@kampus.ac.id"
                        role="dosen"
                        complaints="6"
                        avatar="NH"
                        id="7"
                    />
                    <x-user.table-row 
                        name="Fitri Rahmawati"
                        nim="2021010005"
                        email="fitri.rahmawati@kampus.ac.id"
                        role="mahasiswa"
                        complaints="4"
                        avatar="FR"
                        id="8"
                    />
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Menampilkan <span class="font-medium">1-8</span> dari <span class="font-medium">342</span> pengguna
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50" disabled>
                    Sebelumnya
                </button>
                <button class="px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-primary-600 rounded-lg">
                    1
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                    2
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                    3
                </button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                    Selanjutnya
                </button>
            </div>
        </div>
    </x-card>

    <x-user.modal />
</x-admin-layout>