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