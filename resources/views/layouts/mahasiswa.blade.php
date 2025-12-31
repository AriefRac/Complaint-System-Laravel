{{-- resources/views/components/student-layout.blade.php --}}
<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FasKampus' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a", "950": "#172554" }
                    }
                }
            }
        }
    </script>
</head>

<body
    class="bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-900 dark:to-gray-800 min-h-screen">
    <div x-data="{ mobileMenuOpen: false }">
        <!-- Navbar -->
        @include('layouts.mahasiswa-partials.navbar')

        <!-- Main Content -->
        <main class="pt-20 min-h-screen">
            {{ $slot }}
        </main>

    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</body>

</html>