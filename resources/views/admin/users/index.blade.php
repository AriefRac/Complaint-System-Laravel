<x-admin-layout>
    <x-slot name="title">Manajemen Pengguna</x-slot>

    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Pengguna</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola data pengguna sistem pengaduan</p>
            </div>
            {{-- Tombol Tambah --}}
            <button @click="$dispatch('open-user-modal', { type: 'create' })" 
                class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Pengguna
            </button>
        </div>
    </div>

    <x-card title="Daftar Pengguna">
        <x-slot name="action">
            {{-- Form Filter --}}
            <form method="GET" action="{{ route('admin.users.index') }}" class="flex items-center space-x-3">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/email..." 
                        class="w-64 px-4 py-2 pl-10 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                
                <select name="role" onchange="this.form.submit()" 
                    class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">Semua Role</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="mahasiswa" {{ request('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    <option value="dosen" {{ request('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                    <option value="staff" {{ request('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
                
                <select name="status" onchange="this.form.submit()" 
                    class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">Semua Status</option>
                    <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ request('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </form>
        </x-slot>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 dark:text-gray-400 uppercase bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Pengguna</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3 text-center">Role</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($users as $user)
                        <x-user.table-row :user="$user" />
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-10 h-10 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    <p>Data pengguna tidak ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 px-4 py-2 border-t border-gray-200 dark:border-gray-700">
            {{ $users->links() }}
        </div>
    </x-card>

    <x-user.modal />
</x-admin-layout>