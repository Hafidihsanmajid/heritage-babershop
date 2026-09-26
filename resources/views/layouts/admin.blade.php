<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-zinc-950 text-zinc-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') - Heritage Barbershop</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-cinzel {
            font-family: 'Cinzel', serif;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="h-full antialiased bg-zinc-950 text-zinc-100 overflow-x-hidden">
    
    <!-- Mobile Sidebar Backdrop -->
    <div id="sidebar-backdrop" class="fixed inset-0 z-40 bg-black/70 backdrop-blur-sm hidden transition-opacity duration-300 lg:hidden" aria-hidden="true"></div>

    <div class="min-h-full flex flex-col lg:flex-row">
        
        <!-- SIDEBAR -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-zinc-900 border-r border-zinc-800/80 flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-auto">
            <div>
                <!-- Brand Header -->
                <div class="flex items-center justify-between h-20 px-6 border-b border-zinc-800/80 bg-zinc-900/50">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-zinc-950 shadow-md shadow-amber-500/20 group-hover:scale-105 transition-transform duration-200">
                            <!-- Barber Scissors Icon -->
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="6" cy="6" r="3"/>
                                <circle cx="6" cy="18" r="3"/>
                                <line x1="20" y1="4" x2="8.12" y2="15.88"/>
                                <line x1="14.47" y1="14.48" x2="20" y2="20"/>
                                <line x1="8.12" y1="8.12" x2="12" y2="12"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-cinzel text-lg font-bold tracking-wider text-amber-400 block leading-tight">HERITAGE</span>
                            <span class="text-[10px] tracking-[0.25em] text-zinc-400 uppercase block font-semibold">Barbershop</span>
                        </div>
                    </a>

                    <!-- Close button (mobile only) -->
                    <button id="close-sidebar-btn" type="button" class="lg:hidden text-zinc-400 hover:text-zinc-200 p-1.5 rounded-lg hover:bg-zinc-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Links -->
                <div class="px-4 py-6">
                    <p class="px-3 mb-3 text-[11px] font-semibold uppercase tracking-wider text-zinc-400">
                        Menu Utama
                    </p>
                    <nav class="space-y-1.5" aria-label="Sidebar">
                        <!-- Dashboard -->
                        <a 
                            href="{{ route('admin.dashboard') }}" 
                            class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20 shadow-sm shadow-amber-500/5' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}"
                        >
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-amber-400' : 'text-zinc-500 group-hover:text-zinc-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zM14 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/>
                            </svg>
                            <span>Dashboard</span>
                            @if(request()->routeIs('admin.dashboard'))
                                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                            @endif
                        </a>

                        <!-- Layanan -->
                        <a 
                            href="{{ route('admin.services.index') }}" 
                            class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.services*') ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20 shadow-sm shadow-amber-500/5' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}"
                        >
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.services*') ? 'text-amber-400' : 'text-zinc-500 group-hover:text-zinc-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879a3 3 0 11-4.242-4.242L10.757 7.757m0 0L7.757 4.757m0 0a3 3 0 10-4.242 4.242L6.393 11.88"/>
                            </svg>
                            <span>Layanan</span>
                            @if(request()->routeIs('admin.services*'))
                                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                            @endif
                        </a>

                        <!-- Kapster -->
                        <a 
                            href="{{ route('admin.barbers.index') }}" 
                            class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.barbers*') ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20 shadow-sm shadow-amber-500/5' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}"
                        >
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.barbers*') ? 'text-amber-400' : 'text-zinc-500 group-hover:text-zinc-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span>Kapster</span>
                            @if(request()->routeIs('admin.barbers*'))
                                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                            @endif
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Sidebar Footer / Info Card -->
            <div class="p-4 border-t border-zinc-800/80">
                <div class="p-3.5 rounded-xl bg-zinc-950/60 border border-zinc-800/60 text-xs">
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-zinc-400 font-medium">Jam Operasional</span>
                        <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            Buka
                        </span>
                    </div>
                    <p class="text-zinc-300 font-semibold">10:00 - 21:00 WIB</p>
                    <p class="text-[11px] text-zinc-400 mt-1">Heritage Barbershop Studio</p>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT WRAPPER -->
        <div class="flex-1 flex flex-col min-w-0">
            
            <!-- TOPBAR -->
            <header class="sticky top-0 z-30 flex h-18 shrink-0 items-center justify-between border-b border-zinc-800/80 bg-zinc-900/90 backdrop-blur-md px-4 sm:px-6 lg:px-8">
                <!-- Mobile Open Menu Button -->
                <div class="flex items-center gap-3">
                    <button 
                        id="open-sidebar-btn" 
                        type="button" 
                        class="lg:hidden p-2 rounded-xl text-zinc-400 hover:text-zinc-200 hover:bg-zinc-800 focus:outline-none"
                        aria-label="Buka menu navigasi"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <!-- Breadcrumb / Header Title -->
                    <div>
                        <h1 class="text-base sm:text-lg font-semibold text-zinc-100 flex items-center gap-2">
                            @yield('page_title', 'Dashboard')
                        </h1>
                        <p class="text-xs text-zinc-400 hidden sm:block">
                            @yield('page_subtitle', 'Panel Kontrol Manajemen Barbershop')
                        </p>
                    </div>
                </div>

                <!-- Right Side Actions & Profile -->
                <div class="flex items-center gap-3 sm:gap-4">
                    
                    <!-- Quick Shop Badge -->
                    <div class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs font-medium">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Sistem Aktif
                    </div>

                    <!-- User Profile & Logout -->
                    <div class="flex items-center gap-3 pl-3 border-l border-zinc-800">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center font-bold text-xs text-zinc-950 ring-2 ring-amber-400/30">
                                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}
                            </div>
                            <div class="hidden md:block text-left leading-tight">
                                <span class="text-sm font-semibold text-zinc-200 block">{{ Auth::user()->name ?? 'Admin Heritage' }}</span>
                                <span class="text-xs text-zinc-400 block">{{ Auth::user()->email ?? 'admin@heritage.com' }}</span>
                            </div>
                        </div>

                        <!-- Logout Form -->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button 
                                type="submit" 
                                title="Keluar dari akun"
                                class="flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-400 hover:text-red-300 bg-red-950/30 hover:bg-red-900/40 border border-red-800/40 rounded-xl transition-colors duration-150 cursor-pointer"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span class="hidden sm:inline">Keluar</span>
                            </button>
                        </form>
                    </div>

                </div>
            </header>

            <!-- FLASH ALERTS -->
            @if (session('success'))
                <div class="mx-4 sm:mx-6 lg:mx-8 mt-6 p-4 rounded-xl bg-emerald-950/50 border border-emerald-800/60 text-emerald-200 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mx-4 sm:mx-6 lg:mx-8 mt-6 p-4 rounded-xl bg-red-950/50 border border-red-800/60 text-red-200 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- MAIN CONTENT -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>

            <!-- FOOTER -->
            <footer class="border-t border-zinc-800/60 py-4 px-4 sm:px-6 lg:px-8 text-center text-xs text-zinc-400">
                <p>&copy; {{ date('Y') }} Heritage Barbershop. All rights reserved. Crafted for gentleman grooming perfection.</p>
            </footer>
        </div>
    </div>

    <!-- Mobile Drawer JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            const openBtn = document.getElementById('open-sidebar-btn');
            const closeBtn = document.getElementById('close-sidebar-btn');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
                document.body.classList.add('overflow-hidden', 'lg:overflow-auto');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
                document.body.classList.remove('overflow-hidden', 'lg:overflow-auto');
            }

            if (openBtn) openBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (backdrop) backdrop.addEventListener('click', closeSidebar);

            // Close on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
                    closeSidebar();
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>

