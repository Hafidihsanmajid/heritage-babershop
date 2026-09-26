@extends('layouts.admin')

@section('title', 'Kelola Kapster')
@section('page_title', 'Daftar Kapster & Barber')
@section('page_subtitle', 'Manajemen profil barber, spesialisasi, dan portofolio staf Heritage Barbershop')

@section('content')
<div class="space-y-6">

    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-zinc-900/60 p-4 sm:p-6 rounded-2xl border border-zinc-800/80">
        <div>
            <h2 class="text-lg font-semibold text-zinc-100 flex items-center gap-2">
                <span>Tim Kapster Heritage</span>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">
                    {{ $barbers->total() }} Kapster
                </span>
            </h2>
            <p class="text-xs text-zinc-400 mt-1">Data kapster yang bertugas menangani pemotongan dan penataan rambut pelanggan.</p>
        </div>

        <a 
            href="{{ route('admin.barbers.create') }}" 
            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-zinc-950 font-semibold text-sm shadow-md shadow-amber-500/20 transition-all duration-150 active:scale-95 cursor-pointer shrink-0"
        >
            <svg class="w-4 h-4 text-zinc-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Kapster Baru</span>
        </a>
    </div>

    <!-- Content Table / Card -->
    <div class="rounded-2xl bg-zinc-900/80 border border-zinc-800 shadow-sm overflow-hidden">
        @if ($barbers->isEmpty())
            <div class="text-center py-16 px-4">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-zinc-800/80 border border-zinc-700/60 flex items-center justify-center text-zinc-500 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-zinc-200">Belum Ada Kapster Terdaftar</h3>
                <p class="text-xs text-zinc-400 mt-1 max-w-sm mx-auto">
                    Daftarkan kapster atau barber profesional Anda untuk mulai mengatur jadwal dan layanan.
                </p>
                <div class="mt-5">
                    <a 
                        href="{{ route('admin.barbers.create') }}" 
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-amber-500 text-zinc-950 font-semibold text-xs hover:bg-amber-400 transition-colors"
                    >
                        + Tambah Kapster Pertama
                    </a>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-300">
                    <thead class="text-[11px] uppercase tracking-wider text-zinc-400 bg-zinc-950/80 border-b border-zinc-800">
                        <tr>
                            <th scope="col" class="py-3.5 px-5">Kapster / Barber</th>
                            <th scope="col" class="py-3.5 px-5">Peran & Posisi</th>
                            <th scope="col" class="py-3.5 px-5">Instagram</th>
                            <th scope="col" class="py-3.5 px-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/60">
                        @foreach ($barbers as $barber)
                            <tr class="hover:bg-zinc-800/30 transition-colors">
                                <!-- Barber Info & Avatar -->
                                <td class="py-4 px-5">
                                    <div class="flex items-center gap-3.5">
                                        <div class="w-12 h-12 rounded-xl bg-zinc-800 border border-zinc-700/80 overflow-hidden shrink-0 flex items-center justify-center">
                                            @if ($barber->image_url)
                                                <img 
                                                    src="{{ $barber->image_url }}" 
                                                    alt="{{ $barber->name }}" 
                                                    class="w-full h-full object-cover"
                                                    onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'text-amber-400 text-xs font-bold\'>{{ strtoupper(substr($barber->name, 0, 2)) }}</div>';"
                                                >
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center font-bold text-xs text-zinc-950">
                                                    {{ strtoupper(substr($barber->name, 0, 2)) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="font-semibold text-zinc-100 block">{{ $barber->name }}</span>
                                            <span class="text-xs text-zinc-400">ID: #{{ $barber->id }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Role -->
                                <td class="py-4 px-5">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                                        {{ $barber->role }}
                                    </span>
                                </td>

                                <!-- Instagram -->
                                <td class="py-4 px-5">
                                    @if ($barber->instagram_handle)
                                        <a 
                                            href="https://instagram.com/{{ $barber->clean_instagram_handle }}" 
                                            target="_blank" 
                                            rel="noopener noreferrer" 
                                            class="inline-flex items-center gap-1.5 text-xs text-zinc-300 hover:text-amber-400 transition-colors"
                                        >
                                            <svg class="w-4 h-4 text-pink-400 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                            </svg>
                                            <span>{{ str_starts_with($barber->instagram_handle, '@') ? $barber->instagram_handle : '@' . $barber->instagram_handle }}</span>
                                        </a>
                                    @else
                                        <span class="text-xs text-zinc-500">-</span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-5 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <!-- Edit -->
                                        <a 
                                            href="{{ route('admin.barbers.edit', $barber) }}" 
                                            class="p-2 rounded-lg bg-zinc-800 text-zinc-300 hover:text-amber-400 hover:bg-zinc-700/80 transition-colors"
                                            title="Edit Kapster"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete Form -->
                                        <form 
                                            action="{{ route('admin.barbers.destroy', $barber) }}" 
                                            method="POST" 
                                            class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kapster \'{{ $barber->name }}\'?');"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="p-2 rounded-lg bg-red-950/30 text-red-400 hover:text-red-300 hover:bg-red-900/40 border border-red-800/40 transition-colors cursor-pointer"
                                                title="Hapus Kapster"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($barbers->hasPages())
                <div class="p-4 border-t border-zinc-800 bg-zinc-950/40">
                    {{ $barbers->links() }}
                </div>
            @endif
        @endif
    </div>

</div>
@endsection

