<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth bg-zinc-950 text-zinc-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Heritage Barbershop - Authentic Grooming Lounge & Haircut Studio for Gentlemen. Layanan cukur rambut presisi, beard grooming, dan perawatan pria berkelas.">

    <title>@yield('title', 'Heritage Barbershop - Gentleman Grooming & Classic Lounge')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
<body class="min-h-full flex flex-col antialiased bg-zinc-950 text-zinc-100 selection:bg-amber-500 selection:text-zinc-950">

    <!-- TOP ANNOUNCEMENT BAR -->
    <div class="bg-gradient-to-r from-amber-600 via-amber-500 to-amber-600 text-zinc-950 text-[11px] font-bold tracking-wider py-1.5 px-4 text-center uppercase">
        <span>Grooming Eksklusif Para Pria • Buka Setiap Hari: 10:00 - 21:00 WIB • Walk-in & Reservasi</span>
    </div>

    <!-- NAVBAR -->
    <header class="sticky top-0 z-40 w-full bg-zinc-950/85 backdrop-blur-md border-b border-zinc-800/80 transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-zinc-950 shadow-md shadow-amber-500/20 group-hover:scale-105 transition-transform duration-200">
                        <!-- Scissors Icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="6" cy="6" r="3"/>
                            <circle cx="6" cy="18" r="3"/>
                            <line x1="20" y1="4" x2="8.12" y2="15.88"/>
                            <line x1="14.47" y1="14.48" x2="20" y2="20"/>
                            <line x1="8.12" y1="8.12" x2="12" y2="12"/>
                        </svg>
                    </div>
                    <div>
                        <span class="font-cinzel text-xl font-bold tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-amber-400 to-amber-300 block leading-tight">
                            HERITAGE
                        </span>
                        <span class="text-[10px] tracking-[0.3em] text-zinc-400 uppercase font-semibold block">
                            Barbershop
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <a href="#hero" class="text-zinc-300 hover:text-amber-400 transition-colors">Beranda</a>
                    <a href="#about" class="text-zinc-300 hover:text-amber-400 transition-colors">Tentang Kami</a>
                    <a href="#services" class="text-zinc-300 hover:text-amber-400 transition-colors">Layanan & Harga</a>
                    <a href="#barbers" class="text-zinc-300 hover:text-amber-400 transition-colors">Master Barbers</a>
                    <a href="#contact" class="text-zinc-300 hover:text-amber-400 transition-colors">Kontak</a>
                </nav>

                <!-- Desktop Right Actions -->
                <div class="hidden md:flex items-center gap-4">
                    @auth
                        <a 
                            href="{{ route('admin.dashboard') }}" 
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-zinc-900 border border-zinc-700 text-xs font-semibold text-zinc-200 hover:text-amber-400 hover:border-amber-500/50 transition-colors"
                        >
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Panel Admin</span>
                        </a>
                    @else
                        <a 
                            href="{{ route('login') }}" 
                            class="text-xs font-semibold text-zinc-400 hover:text-zinc-200 transition-colors"
                        >
                            Login Admin
                        </a>
                    @endauth

                    <a 
                        href="#contact" 
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-zinc-950 font-bold text-xs uppercase tracking-wider shadow-lg shadow-amber-500/20 hover:shadow-amber-500/30 transition-all duration-200 active:scale-95 cursor-pointer"
                    >
                        <span>Booking Sekarang</span>
                        <svg class="w-4 h-4 text-zinc-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden items-center gap-2">
                    <button 
                        type="button" 
                        id="public-menu-btn" 
                        class="p-2 rounded-xl text-zinc-400 hover:text-zinc-100 hover:bg-zinc-900 focus:outline-none"
                        aria-label="Toggle Navigation Menu"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="public-mobile-menu" class="hidden md:hidden border-b border-zinc-800 bg-zinc-950/95 backdrop-blur-xl px-4 pt-3 pb-6 space-y-3">
            <a href="#hero" class="block py-2 text-sm font-medium text-zinc-200 hover:text-amber-400">Beranda</a>
            <a href="#about" class="block py-2 text-sm font-medium text-zinc-200 hover:text-amber-400">Tentang Kami</a>
            <a href="#services" class="block py-2 text-sm font-medium text-zinc-200 hover:text-amber-400">Layanan & Harga</a>
            <a href="#barbers" class="block py-2 text-sm font-medium text-zinc-200 hover:text-amber-400">Master Barbers</a>
            <a href="#contact" class="block py-2 text-sm font-medium text-zinc-200 hover:text-amber-400">Kontak & Lokasi</a>
            
            <div class="pt-3 border-t border-zinc-800/80 flex flex-col gap-2.5">
                <a 
                    href="#contact" 
                    class="w-full text-center py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 text-zinc-950 font-bold text-xs uppercase tracking-wider"
                >
                    Booking Sekarang
                </a>
                @auth
                    <a 
                        href="{{ route('admin.dashboard') }}" 
                        class="w-full text-center py-2 rounded-xl bg-zinc-900 border border-zinc-700 text-xs font-medium text-zinc-200"
                    >
                        Masuk ke Panel Admin
                    </a>
                @else
                    <a 
                        href="{{ route('login') }}" 
                        class="w-full text-center py-2 text-xs font-medium text-zinc-400 hover:text-zinc-200"
                    >
                        Login Admin Portal
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- MAIN PAGE CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer id="contact" class="bg-black border-t border-zinc-800/80 text-zinc-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                
                <!-- Col 1: Brand & Tagline -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-zinc-950 font-bold">
                            <!-- Barber Scissors Icon -->
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <circle cx="6" cy="6" r="3"/>
                                <circle cx="6" cy="18" r="3"/>
                                <line x1="20" y1="4" x2="8.12" y2="15.88"/>
                                <line x1="14.47" y1="14.48" x2="20" y2="20"/>
                                <line x1="8.12" y1="8.12" x2="12" y2="12"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-cinzel text-lg font-bold tracking-widest text-amber-400 block">HERITAGE</span>
                            <span class="text-[9px] tracking-[0.25em] text-zinc-400 uppercase font-semibold block">Barbershop</span>
                        </div>
                    </div>
                    <p class="text-xs text-zinc-400 leading-relaxed">
                        Destinasi pangkas rambut pria dengan tradisi seni cukur klasik, teknik modern, dan sentuhan kemewahan gentleman's lounge.
                    </p>
                    <div class="flex items-center gap-3 pt-1">
                        <a href="#" class="w-9 h-9 rounded-xl bg-zinc-900 border border-zinc-800 hover:border-amber-500/50 flex items-center justify-center text-zinc-400 hover:text-amber-400 transition-colors" title="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-zinc-900 border border-zinc-800 hover:border-amber-500/50 flex items-center justify-center text-zinc-400 hover:text-amber-400 transition-colors" title="TikTok">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-1.01-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-zinc-900 border border-zinc-800 hover:border-amber-500/50 flex items-center justify-center text-zinc-400 hover:text-amber-400 transition-colors" title="WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.044c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.158.57 4.184 1.564 5.938l-1.658 6.062 6.223-1.632c1.696.927 3.639 1.454 5.871 1.454 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Navigasi Cepat -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-zinc-200">
                        Eksplorasi
                    </h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#hero" class="hover:text-amber-400 transition-colors">Beranda</a></li>
                        <li><a href="#about" class="hover:text-amber-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="#services" class="hover:text-amber-400 transition-colors">Layanan & Menu Harga</a></li>
                        <li><a href="#barbers" class="hover:text-amber-400 transition-colors">Profil Kapster & Barbers</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-amber-400 transition-colors">Portal Admin Heritage</a></li>
                    </ul>
                </div>

                <!-- Col 3: Jam Operasional -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-zinc-200">
                        Jam Operasional
                    </h4>
                    <div class="space-y-2 text-xs">
                        <div class="flex items-center justify-between pb-1 border-b border-zinc-800/60">
                            <span>Senin - Jumat</span>
                            <span class="text-zinc-200 font-medium">10:00 - 21:00 WIB</span>
                        </div>
                        <div class="flex items-center justify-between pb-1 border-b border-zinc-800/60">
                            <span>Sabtu - Minggu</span>
                            <span class="text-amber-400 font-medium">09:00 - 22:00 WIB</span>
                        </div>
                        <p class="text-[11px] text-zinc-400 pt-1">
                            Reservasi online diprioritaskan. Tersedia area tunggu kopi & lounge.
                        </p>
                    </div>
                </div>

                <!-- Col 4: Lokasi & Kontak -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-zinc-200">
                        Lokasi & Kontak
                    </h4>
                    <div class="space-y-2.5 text-xs">
                        <div class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-amber-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Jl. Senopati Raya No. 45, Kebayoran Baru, Jakarta Selatan</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>+62 812-3456-7890</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>info@heritagebarbershop.com</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="mt-12 pt-8 border-t border-zinc-800/60 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
                <p>&copy; {{ date('Y') }} Heritage Barbershop. All rights reserved.</p>
                <p class="text-zinc-400">Crafted with precision & style for true gentlemen.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuBtn = document.getElementById('public-menu-btn');
            const mobileMenu = document.getElementById('public-mobile-menu');

            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });

                // Close menu when clicking on an anchor
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                    });
                });
            }
        });
    </script>
</body>
</html>

