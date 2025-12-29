<x-mahasiswa-layout>
    <x-slot name="title">Detail Pengaduan #{{ $complaint->id }}</x-slot>

    @php
        $statusConfig = [
            'pending' => ['class' => 'bg-amber-100 text-amber-800 border-amber-200 dark:bg-amber-900/30 dark:text-amber-300', 'label' => 'Menunggu'],
            'process' => ['class' => 'bg-blue-100 text-blue-800 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300', 'label' => 'Diproses'],
            'done' => ['class' => 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300', 'label' => 'Selesai'],
            'rejected' => ['class' => 'bg-red-100 text-red-800 border-red-200 dark:bg-red-900/30 dark:text-red-300', 'label' => 'Ditolak'],
        ];
        $currentStatus = $statusConfig[$complaint->status] ?? $statusConfig['pending'];
        
        $priorityConfig = [
            'high' => 'text-red-600 bg-red-50 border-red-200',
            'medium' => 'text-amber-600 bg-amber-50 border-amber-200',
            'low' => 'text-green-600 bg-green-50 border-green-200',
        ];
        $currentPriority = $priorityConfig[$complaint->priority] ?? 'text-gray-600';
    @endphp

    <div class="max-w-4xl mx-auto px-4 py-8">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 mb-6 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Dashboard
        </a>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            
            <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $currentStatus['class'] }}">
                            {{ $currentStatus['label'] }}
                        </span>
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-mono">
                            #{{ str_pad($complaint->id, 4, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white leading-tight">
                        {{ $complaint->title }}
                    </h1>
                </div>
                <div class="text-right">
                    <span class="text-sm text-gray-500 dark:text-gray-400 block">Tanggal Laporan</span>
                    <span class="font-medium text-gray-900 dark:text-white">
                        {{ $complaint->created_at->format('d F Y, H:i') }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-gray-50/50 dark:bg-gray-700/30">
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg text-blue-600 dark:text-blue-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider font-semibold">Kategori</p>
                        <p class="font-medium text-gray-900 dark:text-white">{{ $complaint->category->name }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg text-purple-600 dark:text-purple-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider font-semibold">Lokasi</p>
                        <p class="font-medium text-gray-900 dark:text-white">{{ $complaint->location }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg text-gray-600 dark:text-gray-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider font-semibold">Prioritas</p>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium border {{ $currentPriority }}">
                            {{ ucfirst($complaint->priority) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-8">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Deskripsi Masalah</h3>
                    <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                        <p class="whitespace-pre-line">{{ $complaint->description }}</p>
                    </div>
                </div>

                @if($complaint->image)
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Foto Bukti
                        </h3>
                        <div class="rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-900">
                            {{-- Pastikan sudah menjalankan php artisan storage:link --}}
                            <a href="{{ asset('storage/' . $complaint->image) }}" target="_blank">
                                <img src="{{ asset('storage/' . $complaint->image) }}" 
                                     alt="Bukti Laporan" 
                                     class="w-full max-h-[500px] object-contain hover:opacity-95 transition-opacity cursor-zoom-in">
                            </a>
                        </div>
                        <p class="mt-2 text-xs text-center text-gray-500">Klik gambar untuk memperbesar</p>
                    </div>
                @else
                    <div class="p-8 text-center bg-gray-50 dark:bg-gray-800/50 rounded-xl border border-dashed border-gray-300 dark:border-gray-700">
                        <p class="text-gray-500 dark:text-gray-400 italic">Tidak ada foto bukti yang dilampirkan.</p>
                    </div>
                @endif
            </div>

            {{-- Jika nanti ada fitur balasan admin, taruh disini --}}
        </div>
    </div>
</x-mahasiswa-layout>