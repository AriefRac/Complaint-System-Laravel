{{-- resources/views/components/category-stat.blade.php --}}
@props(['name', 'count', 'color'])

@php
$colorClasses = [
    'blue' => 'bg-blue-500',
    'green' => 'bg-green-500',
    'purple' => 'bg-purple-500',
    'yellow' => 'bg-yellow-500',
    'red' => 'bg-red-500',
    'gray' => 'bg-gray-500',
];

$total = 156;
$percentage = round(($count / $total) * 100);
@endphp

<div class="flex items-center justify-between">
    <div class="flex items-center space-x-3 flex-1">
        <div class="w-2 h-8 {{ $colorClasses[$color] }} rounded-full"></div>
        <div class="flex-1">
            <div class="flex items-center justify-between mb-1">
                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $name }}</span>
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $count }}</span>
            </div>
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                <div class="{{ $colorClasses[$color] }} h-2 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
            </div>
        </div>
    </div>
</div>