{{-- resources/views/components/card.blade.php --}}
@props(['title'])

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
        @isset($action)
        <div>
            {{ $action }}
        </div>
        @endisset
    </div>
    <div class="p-6">
        {{ $slot }}
    </div>
</div>