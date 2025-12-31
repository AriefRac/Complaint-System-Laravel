<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', sidebarOpen: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    
    {{-- Tailwind & Alpine --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Config Tailwind --}}
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-200">
    
    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform duration-300 lg:translate-x-0 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 shadow-lg lg:shadow-none">
            
            <div class="h-full px-3 py-4 overflow-y-auto flex flex-col justify-between">
                
                {{-- BAGIAN ATAS: Logo & Menu --}}
                <div>
                    <div class="flex items-center justify-between mb-8 px-2">
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('images/logo-uin-banten.png') }}" alt="Logo Kampus" class="h-10 w-auto object-contain">
                            <div>
                                <h1 class="text-sm font-bold text-gray-800 dark:text-white leading-tight">
                                    Pengaduan Fasilitas
                                </h1>
                                <p class="text-[10px] text-gray-500 dark:text-gray-400 font-medium tracking-wider">ADMIN PANEL</p>
                            </div>
                        </div>

                        <button @click="sidebarOpen = false" 
                            class="lg:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <nav class="space-y-1.5">
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary-600 dark:hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-primary-600 dark:group-hover:text-white' }}" 
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="{{ route('admin.complaints.index') }}"
                            class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group transition-colors {{ request()->routeIs('admin.complaints.*') ? 'bg-primary-600 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary-600 dark:hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.complaints.*') ? 'text-white' : 'text-gray-400 group-hover:text-primary-600 dark:group-hover:text-white' }}" 
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Pengaduan
                        </a>

                        <a href="{{ route('admin.categories.index') }}"
                            class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-primary-600 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary-600 dark:hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.categories.*') ? 'text-white' : 'text-gray-400 group-hover:text-primary-600 dark:group-hover:text-white' }}" 
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Kategori
                        </a>

                        <a href="{{ route('admin.users.index') }}"
                            class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-primary-600 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary-600 dark:hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-gray-400 group-hover:text-primary-600 dark:group-hover:text-white' }}" 
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Pengguna
                        </a>
                    </nav>
                </div>

                {{-- BAGIAN BAWAH: Profil User --}}
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4 mt-4">
                    <div class="flex items-center space-x-3 px-2">
                        <img class="w-10 h-10 rounded-full border border-gray-200 dark:border-gray-600 object-cover"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" 
                            alt="{{ Auth::user()->name }}">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </aside>

        {{-- OVERLAY untuk Mobile --}}
        <div x-show="sidebarOpen" 
             @click="sidebarOpen = false" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900 bg-opacity-50 z-30 lg:hidden"
             x-cloak>
        </div>

        {{-- MAIN CONTENT AREA --}}
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden lg:ml-64">
            
            {{-- NAVBAR --}}
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-4 py-3 sticky top-0 z-20">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        {{-- Tombol Hamburger (Mobile Only) --}}
                        <button @click="sidebarOpen = !sidebarOpen"
                            class="p-2 text-gray-600 dark:text-gray-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 lg:hidden">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        
                        {{-- Search Bar --}}
                        <div class="relative hidden md:block">
                            <input type="text" placeholder="Cari..."
                                class="w-64 px-4 py-2 pl-10 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                            class="p-2 text-gray-600 dark:text-gray-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </button>

                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                <img class="w-8 h-8 rounded-full border border-gray-200 dark:border-gray-600"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" 
                                    alt="{{ Auth::user()->name }}">
                                <div class="hidden md:block text-left">
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 capitalize">{{ Auth::user()->role }}</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            {{-- Dropdown Menu --}}
                            <div x-show="open" @click.away="open = false" x-cloak
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 py-1 origin-top-right">
                                
                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Profil</span>
                                </a>

                                <hr class="my-1 border-gray-200 dark:border-gray-700">
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="flex items-center space-x-2 px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 w-full text-left">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>Keluar</span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            {{-- MAIN CONTENT --}}
            <main class="p-4 md:p-6">
                {{ $slot }}
            </main>
            
        </div>
    </div>

</body>
</html>