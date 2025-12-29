{{-- resources/views/components/complaint-item.blade.php --}}
@props(['id', 'title', 'category', 'user', 'time', 'status', 'priority'])

@php
$statusConfig = [
    'pending' => [
        'label' => 'Menunggu',
        'class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
    ],
    'in-progress' => [
        'label' => 'Proses',
        'class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
    ],
    'resolved' => [
        'label' => 'Selesai',
        'class' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
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

<div class="flex items-start space-x-4 p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
    <div class="flex-shrink-0">
        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                {{ $category }}
            </span>
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                {{ $user }}
            </span>
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $time }}
            </span>
            <span class="flex items-center font-medium {{ $priorityConfig[$priority]['class'] }}">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                {{ $priorityConfig[$priority]['label'] }}
            </span>
        </div>
    </div>
    <button class="flex-shrink-0 p-2 text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>
</div>