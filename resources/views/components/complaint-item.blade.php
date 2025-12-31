@props(['id', 'title', 'category', 'user', 'status', 'priority'])

@php
    $statusConfig = [
        'pending' => [
            'label' => 'Menunggu',
            'class' => 'bg-amber-100 text-amber-800 border-amber-200 dark:bg-amber-900/30 dark:text-amber-300 dark:border-amber-800',
            'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'verified' => [
            'label' => 'Diverifikasi',
            'class' => 'bg-cyan-100 text-cyan-800 border-cyan-200 dark:bg-cyan-900/30 dark:text-cyan-300 dark:border-cyan-800',
            'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'in_progress' => [
            'label' => 'Diproses',
            'class' => 'bg-blue-100 text-blue-800 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800',
            'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z',
        ],
        'resolved' => [
            'label' => 'Selesai',
            'class' => 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800',
            'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'rejected' => [
            'label' => 'Ditolak',
            'class' => 'bg-red-100 text-red-800 border-red-200 dark:bg-red-900/30 dark:text-red-300 dark:border-red-800',
            'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
    ];

    $priorityConfig = [
        'low' => [
            'label' => 'Rendah',
            'class' => 'text-gray-600 dark:text-gray-400',
        ],
        'medium' => [
            'label' => 'Sedang',
            'class' => 'text-blue-600 dark:text-blue-400',
        ],
        'high' => [
            'label' => 'Tinggi',
            'class' => 'text-orange-600 dark:text-orange-400',
        ],
        'urgent' => [
            'label' => 'Urgent',
            'class' => 'text-red-600 dark:text-red-400',
        ],
    ];
@endphp

<div
    class="flex items-start space-x-4 p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
    <div class="flex-shrink-0">
        <div
            class="w-12 h-12 rounded-lg bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
        </div>
    </div>
    <div class="flex-1 min-w-0">
        <div class="flex items-start justify-between mb-1">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900 dark:text-white mb-1">{{ $title }}</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $id }}</p>
            </div>
            <span class="ml-2 px-2.5 py-1 text-xs font-medium rounded-full {{ $statusConfig[$status]['class'] }}">
                {{ $statusConfig[$status]['label'] }}
            </span>
        </div>
        <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 space-x-4 mt-2">
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                {{ $category }}
            </span>
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                {{ $user }}
            </span>
            <span class="flex items-center font-medium {{ $priorityConfig[$priority]['class'] }}">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                {{ $priorityConfig[$priority]['label'] }}
            </span>
        </div>
    </div>
    <button
        class="flex-shrink-0 p-2 text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>