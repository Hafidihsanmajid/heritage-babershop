@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Utama')
@section('page_subtitle', 'Pantau aktivitas pemotongan rambut, kapster, dan transaksi harian')

@section('content')
<div class="space-y-6">

    <!-- WELCOME HERO BANNER -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-zinc-900 via-zinc-900 to-zinc-800 border border-zinc-800 p-6 sm:p-8 shadow-xl">
        <div class="absolute right-0 top-0 bottom-0 w-1/3 bg-radial from-amber-500/10 to-transparent pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-400 text-xs font-medium mb-3">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                    <span>Operasional Barbershop Aktif</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-bold text-zinc-100 font-cinzel">
                    Halo, {{ Auth::user()->name ?? 'Administrator' }}!
                </h2>
                <p class="mt-1 text-sm text-zinc-400 max-w-xl">
                    Semua kursi cukur siap melayani pelanggan hari ini. Pantau antrean masuk dan performa setiap kapster secara langsung.
                </p>
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <button type="button" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-zinc-950 font-semibold text-sm shadow-lg shadow-amber-500/20 transition-all active:scale-95 cursor-pointer">
                    <svg class="w-4 h-4 text-zinc-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Antrean</span>
                </button>
            </div>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        <!-- Stat 1: Total Pelanggan -->
        <div class="rounded-2xl bg-zinc-900/80 border border-zinc-800 p-5 hover:border-zinc-700 transition-colors shadow-sm">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-zinc-400">Pelanggan Hari Ini</span>
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-bold text-zinc-100">28 <span class="text-xs font-normal text-zinc-400">Orang</span></div>
                <div class="mt-1 flex items-center text-xs text-emerald-400 gap-1 font-medium">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    <span>+16% dari kemarin</span>
                </div>
            </div>
        </div>

        <!-- Stat 2: Pendapatan -->
        <div class="rounded-2xl bg-zinc-900/80 border border-zinc-800 p-5 hover:border-zinc-700 transition-colors shadow-sm">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-zinc-400">Pendapatan Hari Ini</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-bold text-zinc-100">Rp 2.150.000</div>
                <div class="mt-1 flex items-center text-xs text-emerald-400 gap-1 font-medium">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    <span>+8.2% vs target harian</span>
                </div>
            </div>
        </div>

        <!-- Stat 3: Kapster Aktif -->
        <div class="rounded-2xl bg-zinc-900/80 border border-zinc-800 p-5 hover:border-zinc-700 transition-colors shadow-sm">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-zinc-400">Kapster Siaga</span>
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-bold text-zinc-100">{{ $barbersCount ?? 0 }} <span class="text-xs font-normal text-zinc-400">Kapster</span></div>
                <div class="mt-1 flex items-center text-xs text-zinc-400 gap-1 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    <span>Tersedia di sistem</span>
                </div>
            </div>
        </div>

        <!-- Stat 4: Layanan Tersedia -->
        <div class="rounded-2xl bg-zinc-900/80 border border-zinc-800 p-5 hover:border-zinc-700 transition-colors shadow-sm">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-zinc-400">Paket Layanan</span>
                <div class="w-10 h-10 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879a3 3 0 11-4.242-4.242L10.757 7.757m0 0L7.757 4.757m0 0a3 3 0 10-4.242 4.242L6.393 11.88"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-bold text-zinc-100">{{ $servicesCount ?? 0 }} <span class="text-xs font-normal text-zinc-400">Menu</span></div>
                <div class="mt-1 flex items-center text-xs text-amber-400 gap-1 font-medium">
                    <span>Layanan terdaftar aktif</span>
                </div>
            </div>
        </div>

    </div>

    <!-- MAIN TWO COLUMN GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left 2 Cols: Live Queue Table -->
        <div class="lg:col-span-2 rounded-2xl bg-zinc-900/80 border border-zinc-800 p-5 sm:p-6 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-semibold text-zinc-100">Antrean & Layanan Berjalan</h3>
                        <p class="text-xs text-zinc-400 mt-0.5">Daftar pelanggan yang sedang dicukur atau menunggu giliran</p>
                    </div>
                    <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-zinc-800 text-zinc-300 border border-zinc-700">
                        Live Update
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-zinc-300">
                        <thead class="text-[11px] uppercase tracking-wider text-zinc-400 bg-zinc-950/60 border-b border-zinc-800">
                            <tr>
                                <th scope="col" class="py-3 px-4 rounded-l-xl">No</th>
                                <th scope="col" class="py-3 px-4">Pelanggan</th>
                                <th scope="col" class="py-3 px-4">Layanan</th>
                                <th scope="col" class="py-3 px-4">Kapster</th>
                                <th scope="col" class="py-3 px-4 text-right rounded-r-xl">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-800/60">
                            <tr class="hover:bg-zinc-800/30 transition-colors">
                                <td class="py-3.5 px-4 font-mono text-xs font-semibold text-amber-400">#01</td>
                                <td class="py-3.5 px-4 font-medium text-zinc-100">Dimas Pratama</td>
                                <td class="py-3.5 px-4 text-xs text-zinc-300">Heritage Signature Cut</td>
                                <td class="py-3.5 px-4 text-xs">
                                    <span class="inline-flex items-center gap-1.5 text-zinc-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                        Mas Arya
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-950/60 text-emerald-400 border border-emerald-800/50">
                                        Sedang Cukur
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-zinc-800/30 transition-colors">
                                <td class="py-3.5 px-4 font-mono text-xs font-semibold text-amber-400">#02</td>
                                <td class="py-3.5 px-4 font-medium text-zinc-100">Fajar Nugraha</td>
                                <td class="py-3.5 px-4 text-xs text-zinc-300">Beard Grooming & Towel</td>
                                <td class="py-3.5 px-4 text-xs">
                                    <span class="inline-flex items-center gap-1.5 text-zinc-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                        Mas Radit
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-950/60 text-emerald-400 border border-emerald-800/50">
                                        Sedang Cukur
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-zinc-800/30 transition-colors">
                                <td class="py-3.5 px-4 font-mono text-xs font-semibold text-amber-400">#03</td>
                                <td class="py-3.5 px-4 font-medium text-zinc-100">Hendra Wijaya</td>
                                <td class="py-3.5 px-4 text-xs text-zinc-300">Gentlemen Fade + Wash</td>
                                <td class="py-3.5 px-4 text-xs">
                                    <span class="inline-flex items-center gap-1.5 text-zinc-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                        Mas Dimas
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-950/60 text-amber-400 border border-amber-800/50">
                                        Menunggu
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-zinc-800/30 transition-colors">
                                <td class="py-3.5 px-4 font-mono text-xs font-semibold text-zinc-500">#00</td>
                                <td class="py-3.5 px-4 font-medium text-zinc-400">Kevin Sanjaya</td>
                                <td class="py-3.5 px-4 text-xs text-zinc-400">Classic Pompadour</td>
                                <td class="py-3.5 px-4 text-xs text-zinc-400">Mas Arya</td>
                                <td class="py-3.5 px-4 text-right">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-800 text-zinc-400 border border-zinc-700">
                                        Selesai
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-4 pt-3 border-t border-zinc-800/60 flex items-center justify-between text-xs text-zinc-400">
                <span>Menampilkan 4 antrean aktif hari ini</span>
                <a href="#" class="text-amber-400 hover:text-amber-300 font-medium">Lihat Semua Antrean &rarr;</a>
            </div>
        </div>

        <!-- Right 1 Col: Kapster On-Duty Status -->
        <div class="rounded-2xl bg-zinc-900/80 border border-zinc-800 p-5 sm:p-6 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-semibold text-zinc-100">Status Kapster</h3>
                        <p class="text-xs text-zinc-400 mt-0.5">Kondisi kursi dan ketersediaan kapster</p>
                    </div>
                </div>

                <div class="space-y-3.5">
                    
                    <!-- Kapster 1 -->
                    <div class="flex items-center justify-between p-3 rounded-xl bg-zinc-950/60 border border-zinc-800/60">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-zinc-800 flex items-center justify-center font-bold text-xs text-amber-400">
                                AR
                            </div>
                            <div>
                                <h4 class="text-xs font-semibold text-zinc-200">Mas Arya</h4>
                                <span class="text-[11px] text-zinc-400">Kursi 01 • 9 Selesai</span>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 text-[11px] font-medium rounded-full bg-emerald-950/80 text-emerald-400 border border-emerald-800/50">
                            Melayani
                        </span>
                    </div>

                    <!-- Kapster 2 -->
                    <div class="flex items-center justify-between p-3 rounded-xl bg-zinc-950/60 border border-zinc-800/60">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-zinc-800 flex items-center justify-center font-bold text-xs text-amber-400">
                                RD
                            </div>
                            <div>
                                <h4 class="text-xs font-semibold text-zinc-200">Mas Radit</h4>
                                <span class="text-[11px] text-zinc-400">Kursi 02 • 7 Selesai</span>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 text-[11px] font-medium rounded-full bg-emerald-950/80 text-emerald-400 border border-emerald-800/50">
                            Melayani
                        </span>
                    </div>

                    <!-- Kapster 3 -->
                    <div class="flex items-center justify-between p-3 rounded-xl bg-zinc-950/60 border border-zinc-800/60">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-zinc-800 flex items-center justify-center font-bold text-xs text-amber-400">
                                DM
                            </div>
                            <div>
                                <h4 class="text-xs font-semibold text-zinc-200">Mas Dimas</h4>
                                <span class="text-[11px] text-zinc-400">Kursi 03 • 6 Selesai</span>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 text-[11px] font-medium rounded-full bg-amber-950/80 text-amber-400 border border-amber-800/50">
                            Standby
                        </span>
                    </div>

                    <!-- Kapster 4 -->
                    <div class="flex items-center justify-between p-3 rounded-xl bg-zinc-950/60 border border-zinc-800/60">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-zinc-800 flex items-center justify-center font-bold text-xs text-amber-400">
                                BM
                            </div>
                            <div>
                                <h4 class="text-xs font-semibold text-zinc-200">Mas Bima</h4>
                                <span class="text-[11px] text-zinc-400">Kursi 04 • 6 Selesai</span>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 text-[11px] font-medium rounded-full bg-emerald-950/80 text-emerald-400 border border-emerald-800/50">
                            Melayani
                        </span>
                    </div>

                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-zinc-800/60 text-center">
                <a href="{{ route('admin.barbers.index') }}" class="text-xs text-amber-400 hover:text-amber-300 font-medium">
                    Kelola Jadwal & Kapster &rarr;
                </a>
            </div>
        </div>

    </div>

    <!-- POPULAR SERVICES SECTION -->
    <div class="rounded-2xl bg-zinc-900/80 border border-zinc-800 p-5 sm:p-6 shadow-sm">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="text-base font-semibold text-zinc-100">Layanan Paling Diminati</h3>
                <p class="text-xs text-zinc-400 mt-0.5">Statistik menu layanan favorit para gentleman di Heritage Barbershop</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="text-xs text-amber-400 hover:text-amber-300 font-medium">
                Kelola Semua Layanan &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <div class="p-4 rounded-xl bg-zinc-950/60 border border-zinc-800/80 flex items-start justify-between">
                <div class="space-y-1">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-amber-400/10 text-amber-400 border border-amber-400/20">
                        Top #1
                    </span>
                    <h4 class="text-sm font-semibold text-zinc-100">Heritage Signature Cut</h4>
                    <p class="text-xs text-zinc-400">Cukur presisi + keramas + styling pomade</p>
                    <p class="text-sm font-bold text-amber-400 pt-1">Rp 65.000</p>
                </div>
                <div class="text-right">
                    <span class="text-xs font-semibold text-zinc-300">14 Order</span>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-zinc-950/60 border border-zinc-800/80 flex items-start justify-between">
                <div class="space-y-1">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-zinc-300 border border-zinc-700">
                        Top #2
                    </span>
                    <h4 class="text-sm font-semibold text-zinc-100">Beard Trim & Hot Towel</h4>
                    <p class="text-xs text-zinc-400">Pembentukan jenggot dengan handuk hangat</p>
                    <p class="text-sm font-bold text-amber-400 pt-1">Rp 45.000</p>
                </div>
                <div class="text-right">
                    <span class="text-xs font-semibold text-zinc-300">8 Order</span>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-zinc-950/60 border border-zinc-800/80 flex items-start justify-between">
                <div class="space-y-1">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-zinc-300 border border-zinc-700">
                        Top #3
                    </span>
                    <h4 class="text-sm font-semibold text-zinc-100">Royal Grooming Full Package</h4>
                    <p class="text-xs text-zinc-400">Haircut, Shave, Hair Spa, Massage, Tonic</p>
                    <p class="text-sm font-bold text-amber-400 pt-1">Rp 110.000</p>
                </div>
                <div class="text-right">
                    <span class="text-xs font-semibold text-zinc-300">6 Order</span>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

