@props(['user'])

@php
    $roleConfig = [
        'admin' => [
            'label' => 'Admin',
            'class' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
        ],
        'mahasiswa' => [
            'label' => 'Mahasiswa',
            'class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
        ],
        'dosen' => [
            'label' => 'Dosen',
            'class' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
        ],
        'staff' => [
            'label' => 'Staff',
            'class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
        ],
    ];

    $currentRole = $roleConfig[$user->role] ?? ['label' => ucfirst($user->role), 'class' => 'bg-gray-100 text-gray-800'];
@endphp

<tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50">
    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
        {{ $user->name }}
    </td>
    
    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
        {{ $user->email }}
    </td>

    <td class="px-6 py-4 text-center">
        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full {{ $currentRole['class'] }}">
            {{ $currentRole['label'] }}
        </span>
    </td>

    <td class="px-6 py-4">
        {{-- PERBAIKAN DISINI: Tambahkan 'justify-center' --}}
        <div class="flex items-center justify-center space-x-2">
            
            {{-- Tombol Detail --}}
            <button @click="$dispatch('open-user-modal', { type: 'view', id: {{ $user->id }} })"
                class="p-2 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors duration-200"
                title="Detail">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>

            {{-- Tombol Edit --}}
            <button @click="$dispatch('open-user-modal', { type: 'edit', user: {{ $user }} })"
                class="p-2 text-yellow-600 dark:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 rounded-lg transition-colors duration-200"
                title="Edit">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>

            {{-- Tombol Hapus --}}
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors duration-200"
                    title="Hapus">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>

        </div>
    </td>
</tr>