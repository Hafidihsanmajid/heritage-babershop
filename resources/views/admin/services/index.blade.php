@extends('layouts.admin')

@section('title', 'Kelola Layanan')
@section('page_title', 'Daftar Layanan')
@section('page_subtitle', 'Kelola paket potongan rambut, perawatan, dan grooming Heritage Barbershop')

@section('content')
<div class="space-y-6">

    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-zinc-900/60 p-4 sm:p-6 rounded-2xl border border-zinc-800/80">
        <div>
            <h2 class="text-lg font-semibold text-zinc-100 flex items-center gap-2">
                <span>Daftar Layanan Barbershop</span>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">
                    {{ $services->total() }} Total
                </span>
            </h2>
            <p class="text-xs text-zinc-400 mt-1">Perbarui daftar harga dan menu perawatan untuk pelanggan.</p>
        </div>

        <a 
            href="{{ route('admin.services.create') }}" 
            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-zinc-950 font-semibold text-sm shadow-md shadow-amber-500/20 transition-all duration-150 active:scale-95 cursor-pointer shrink-0"
        >
            <svg class="w-4 h-4 text-zinc-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Layanan Baru</span>
        </a>
    </div>

    <!-- Content Table / Card -->
    <div class="rounded-2xl bg-zinc-900/80 border border-zinc-800 shadow-sm overflow-hidden">
        @if ($services->isEmpty())
            <div class="text-center py-16 px-4">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-zinc-800/80 border border-zinc-700/60 flex items-center justify-center text-zinc-500 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879a3 3 0 11-4.242-4.242L10.757 7.757m0 0L7.757 4.757m0 0a3 3 0 10-4.242 4.242L6.393 11.88"/>
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-zinc-200">Belum Ada Layanan</h3>
                <p class="text-xs text-zinc-400 mt-1 max-w-sm mx-auto">
                    Mulai dengan menambahkan layanan cukur, shaving, atau paket grooming pertama Anda.
                </p>
                <div class="mt-5">
                    <a 
                        href="{{ route('admin.services.create') }}" 
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-amber-500 text-zinc-950 font-semibold text-xs hover:bg-amber-400 transition-colors"
                    >
                        + Tambah Layanan Pertama
                    </a>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-300">
                    <thead class="text-[11px] uppercase tracking-wider text-zinc-400 bg-zinc-950/80 border-b border-zinc-800">
                        <tr>
                            <th scope="col" class="py-3.5 px-5">Layanan</th>
                            <th scope="col" class="py-3.5 px-5">Deskripsi</th>
                            <th scope="col" class="py-3.5 px-5">Harga</th>
                            <th scope="col" class="py-3.5 px-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/60">
                        @foreach ($services as $service)
                            <tr class="hover:bg-zinc-800/30 transition-colors">
                                <!-- Service Info & Image -->
                                <td class="py-4 px-5">
                                    <div class="flex items-center gap-3.5">
                                        <div class="w-12 h-12 rounded-xl bg-zinc-800 border border-zinc-700/80 overflow-hidden shrink-0 flex items-center justify-center">
                                            @if ($service->image_url)
                                                <img 
                                                    src="{{ $service->image_url }}" 
                                                    alt="{{ $service->title }}" 
                                                    class="w-full h-full object-cover"
                                                    onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'text-amber-400 text-xs font-bold font-cinzel\'>HB</div>';"
                                                >
                                            @else
                                                <svg class="w-6 h-6 text-amber-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879a3 3 0 11-4.242-4.242L10.757 7.757m0 0L7.757 4.757m0 0a3 3 0 10-4.242 4.242L6.393 11.88"/>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="font-semibold text-zinc-100 block">{{ $service->title }}</span>
                                            <span class="text-xs text-zinc-400">ID: #{{ $service->id }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Description -->
                                <td class="py-4 px-5 max-w-xs">
                                    <p class="text-xs text-zinc-400 line-clamp-2">
                                        {{ $service->description ?? '-' }}
                                    </p>
                                </td>

                                <!-- Price -->
                                <td class="py-4 px-5">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-500/10 text-amber-400 border border-amber-500/20 font-mono">
                                        {{ $service->formatted_price }}
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-5 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <!-- Edit -->
                                        <a 
                                            href="{{ route('admin.services.edit', $service) }}" 
                                            class="p-2 rounded-lg bg-zinc-800 text-zinc-300 hover:text-amber-400 hover:bg-zinc-700/80 transition-colors"
                                            title="Edit Layanan"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete Form -->
                                        <form 
                                            action="{{ route('admin.services.destroy', $service) }}" 
                                            method="POST" 
                                            class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan \'{{ $service->title }}\'? Tindakan ini tidak dapat dibatalkan.');"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="p-2 rounded-lg bg-red-950/30 text-red-400 hover:text-red-300 hover:bg-red-900/40 border border-red-800/40 transition-colors cursor-pointer"
                                                title="Hapus Layanan"
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
            @if ($services->hasPages())
                <div class="p-4 border-t border-zinc-800 bg-zinc-950/40">
                    {{ $services->links() }}
                </div>
            @endif
        @endif
    </div>

</div>
@endsection

