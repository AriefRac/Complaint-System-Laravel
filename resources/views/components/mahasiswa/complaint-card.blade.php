@props(['complaint'])

@php
    $statusConfig = [
        'pending' => [
            'label' => 'Menunggu',
            'class' => 'bg-amber-100 text-amber-800 border-amber-200 dark:bg-amber-900/30 dark:text-amber-300 dark:border-amber-800',
            'icon'  => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'verified' => [ 
            'label' => 'Diverifikasi',
            'class' => 'bg-cyan-100 text-cyan-800 border-cyan-200 dark:bg-cyan-900/30 dark:text-cyan-300 dark:border-cyan-800',
            'icon'  => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'in_progress' => [ 
            'label' => 'Diproses',
            'class' => 'bg-blue-100 text-blue-800 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800',
            'icon'  => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z',
        ],
        'resolved' => [
            'label' => 'Selesai',
            'class' => 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800',
            'icon'  => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'rejected' => [
            'label' => 'Ditolak',
            'class' => 'bg-red-100 text-red-800 border-red-200 dark:bg-red-900/30 dark:text-red-300 dark:border-red-800',
            'icon'  => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
    ];

    $currentStatus = $statusConfig[$complaint->status] ?? $statusConfig['pending'];
@endphp

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-300 overflow-hidden group">
    <div class="p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex-1">
                <div class="flex items-center space-x-3 mb-2">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white line-clamp-1">
                        {{ $complaint->title }}
                    </h3>
                </div>
                
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $currentStatus['class'] }}">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $currentStatus['icon'] }}"/>
                        </svg>
                        {{ $currentStatus['label'] }}
                    </span>

                    <span class="text-xs text-gray-400 font-mono">
                        ADU-{{ $complaint->id }}
                    </span>
                </div>
            </div>

            {{-- BAGIAN MENU DROPDOWN (EDIT & HAPUS) --}}
            {{-- Hanya tampilkan jika status masih pending --}}
            @if($complaint->status === 'pending')
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            @click.away="open = false"
                            class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>

                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 z-10"
                         style="display: none;">
                        
                        <a href="{{ route('complaints.edit', $complaint->id) }}" 
                           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 w-full text-left">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>

                        <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 w-full text-left">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>

        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2 min-h-[40px]">
            {{ $complaint->description }}
        </p>

        <div class="flex items-center space-x-4 text-xs text-gray-500 dark:text-gray-400 mb-4 border-b border-gray-100 dark:border-gray-700 pb-4">
            <div class="flex items-center space-x-1">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="truncate max-w-[150px]">{{ $complaint->location }}</span>
            </div>
            
            @if($complaint->image)
            <div class="flex items-center space-x-1 text-blue-600 dark:text-blue-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>Ada Foto</span>
            </div>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <span class="text-xs text-gray-400">
                {{ $complaint->created_at->diffForHumans() }}
            </span>
            <a href="{{ route('complaints.show', $complaint->id) }}" class="group inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
                Lihat Detail
                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</div>