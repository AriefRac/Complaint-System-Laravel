{{-- resources/views/components/stat-card.blade.php --}}
@props(['title', 'value', 'icon', 'color' => 'blue', 'trend' => null, 'trendUp' => true])

@php
$colorClasses = [
    'blue' => 'bg-blue-500',
    'blue-gradient' => 'bg-gradient-to-br from-blue-500 to-blue-700',
    'yellow' => 'bg-yellow-500',
    'yellow-gradient' => 'bg-gradient-to-br from-yellow-500 to-orange-600',
    'indigo' => 'bg-indigo-500',
    'indigo-gradient' => 'bg-gradient-to-br from-purple-500 to-purple-700',
    'green' => 'bg-green-500',
    'green-gradient' => 'bg-gradient-to-br from-green-500 to-green-700',
    'red' => 'bg-red-500',
];

$iconPaths = [
    'clipboard-list' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
    'clock' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
    'cog' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
    'check-circle' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
    'trend' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6',
];
@endphp

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
    <div class="flex items-center justify-between mb-4">
        <div class="flex-shrink-0">
            <div class="w-12 h-12 {{ $colorClasses[$color] }} rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPaths[$icon] }}"/>
                </svg>
            </div>
        </div>
        @if($trend)
        <div class="flex items-center text-sm font-medium {{ $trendUp ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                @if($trendUp)
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                @else
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                @endif
            </svg>
            {{ $trend }}
        </div>
        @endif
    </div>
    <div>
        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">{{ $title }}</p>
        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $value }}</p>
    </div>
</div>