@props(['id', 'title', 'category', 'reporter', 'date', 'priority', 'status', 'detailId', 'rowData']) 

@php

$statusConfig = [
    'pending' => ['class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300', 'label' => 'Menunggu'],
    'verified' => ['class' => 'bg-cyan-100 text-cyan-800 dark:bg-cyan-900 dark:text-cyan-300', 'label' => 'Diverifikasi'],
    'in_progress' => ['class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300', 'label' => 'Proses'],
    'resolved' => ['class' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300', 'label' => 'Selesai'],
    'rejected' => ['class' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300', 'label' => 'Ditolak'],
];

$priorityConfig = [
    'low' => ['class' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300', 'label' => 'Rendah'],
    'medium' => ['class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300', 'label' => 'Sedang'],
    'high' => ['class' => 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300', 'label' => 'Tinggi'],
    'urgent' => ['class' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300', 'label' => 'Urgent'],
];
@endphp

<tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50">
    <td class="px-6 py-4 font-medium text-primary-600 dark:text-primary-400">{{ $id }}</td>
    <td class="px-6 py-4">
        <div>
            <p class="font-medium text-gray-900 dark:text-white">{{ $title }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $category }}</p>
        </div>
    </td>
    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $reporter }}</td>
    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $date }}</td>
    <td class="px-6 py-4">
        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full {{ $priorityConfig[$priority]['class'] ?? 'bg-gray-100 text-gray-800' }}">
            {{ $priorityConfig[$priority]['label'] ?? ucfirst($priority) }}
        </span>
    </td>
    <td class="px-6 py-4">
        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full {{ $statusConfig[$status]['class'] ?? 'bg-gray-100 text-gray-800' }}">
            {{ $statusConfig[$status]['label'] ?? ucfirst($status) }}
        </span>
    </td>
    
    <td class="px-6 py-4">
        <button @click="$dispatch('open-complaint-detail', {{ json_encode($rowData) }})" 
                class="p-2 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors duration-200"
                title="Detail & Kelola">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        </button>
    </td>
</tr>