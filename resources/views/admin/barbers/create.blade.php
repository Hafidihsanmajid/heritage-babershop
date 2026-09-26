@extends('layouts.admin')

@section('title', 'Tambah Kapster Baru')
@section('page_title', 'Tambah Kapster')
@section('page_subtitle', 'Tambahkan profil barber profesional ke tim Heritage Barbershop')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Back Button -->
    <div>
        <a 
            href="{{ route('admin.barbers.index') }}" 
            class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-amber-400 transition-colors"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali ke Daftar Kapster</span>
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-zinc-900/90 border border-zinc-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6 pb-6 border-b border-zinc-800/80">
            <h2 class="text-xl font-bold text-zinc-100">Formulir Kapster Baru</h2>
            <p class="text-xs text-zinc-400 mt-1">Lengkapi informasi nama, spesialisasi peran, dan media sosial kapster.</p>
        </div>

        <!-- Global Errors -->
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-950/40 border border-red-800/60 text-red-200 text-sm">
                <p class="font-semibold text-red-300">Terdapat kesalahan pengisian:</p>
                <ul class="mt-1 list-disc list-inside text-xs text-red-300/90 space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.barbers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-zinc-300 mb-2">
                    Nama Lengkap Kapster <span class="text-amber-400">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    placeholder="Contoh: Rian 'The Fade' Setiawan" 
                    class="w-full px-4 py-2.5 bg-zinc-950/80 border rounded-xl text-zinc-100 placeholder-zinc-500 text-sm focus:outline-none transition-all duration-200 {{ $errors->has('name') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-zinc-700/80 focus:border-amber-500 focus:ring-1 focus:ring-amber-500' }}"
                >
                @error('name')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block text-sm font-medium text-zinc-300 mb-2">
                    Peran / Spesialisasi <span class="text-amber-400">*</span>
                </label>
                <input 
                    type="text" 
                    id="role" 
                    name="role" 
                    value="{{ old('role') }}" 
                    required 
                    placeholder="Contoh: Master Barber, Fade Specialist, Senior Stylist" 
                    class="w-full px-4 py-2.5 bg-zinc-950/80 border rounded-xl text-zinc-100 placeholder-zinc-500 text-sm focus:outline-none transition-all duration-200 {{ $errors->has('role') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-zinc-700/80 focus:border-amber-500 focus:ring-1 focus:ring-amber-500' }}"
                >
                <p class="text-[11px] text-zinc-400 mt-1">Jabatan atau keahlian khusus kapster.</p>
                @error('role')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Instagram Handle -->
            <div>
                <label for="instagram_handle" class="block text-sm font-medium text-zinc-300 mb-2">
                    Instagram Handle
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-zinc-400 font-mono text-sm">
                        @
                    </div>
                    <input 
                        type="text" 
                        id="instagram_handle" 
                        name="instagram_handle" 
                        value="{{ old('instagram_handle') }}" 
                        placeholder="rian_barber" 
                        class="w-full pl-9 pr-4 py-2.5 bg-zinc-950/80 border rounded-xl text-zinc-100 placeholder-zinc-500 text-sm font-mono focus:outline-none transition-all duration-200 {{ $errors->has('instagram_handle') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-zinc-700/80 focus:border-amber-500 focus:ring-1 focus:ring-amber-500' }}"
                    >
                </div>
                <p class="text-[11px] text-zinc-400 mt-1">Akun Instagram untuk portofolio hasil cukur (tanpa simbol @).</p>
                @error('instagram_handle')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Foto Profil Kapster -->
            <div>
                <label for="image" class="block text-sm font-medium text-zinc-300 mb-2">
                    Upload Foto Profil Kapster
                </label>
                
                <div class="space-y-3">
                    <input 
                        type="file" 
                        id="image" 
                        name="image" 
                        accept="image/png,image/jpeg,image/jpg,image/webp"
                        class="block w-full text-xs text-zinc-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-amber-400 hover:file:bg-zinc-700 cursor-pointer bg-zinc-950/80 border border-zinc-700/80 rounded-xl focus:outline-none"
                        onchange="previewBarberImage(event)"
                    >
                    <p class="text-[11px] text-zinc-400">
                        Format didukung: JPG, PNG, WEBP (Maksimal 5MB). Foto akan otomatis di-crop & disesuaikan ke rasio lingkaran profil kapster di halaman utama (500x500 px).
                    </p>
                    
                    <!-- Live Image Preview Box (Matches Home Page Barber Avatar) -->
                    <div id="barber-preview-wrapper" class="hidden">
                        <span class="text-xs text-zinc-400 block mb-2 font-medium">Pratinjau Tampilan Profil di Halaman Utama:</span>
                        <div class="w-28 h-28 rounded-full bg-zinc-950 overflow-hidden border-2 border-amber-500/40 shadow-xl">
                            <img id="barber-preview-img" src="#" alt="Pratinjau Profil Kapster" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
                @error('image')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-800">
                <a 
                    href="{{ route('admin.barbers.index') }}" 
                    class="px-5 py-2.5 rounded-xl bg-zinc-800 text-zinc-300 hover:bg-zinc-700 text-sm font-medium transition-colors"
                >
                    Batal
                </a>
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-zinc-950 font-semibold text-sm shadow-md shadow-amber-500/20 transition-all active:scale-95 cursor-pointer"
                >
                    <svg class="w-4 h-4 text-zinc-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Simpan Kapster</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function previewBarberImage(event) {
        const file = event.target.files[0];
        const wrapper = document.getElementById('barber-preview-wrapper');
        const img = document.getElementById('barber-preview-img');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                wrapper.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            wrapper.classList.add('hidden');
            img.src = '#';
        }
    }
</script>
@endpush

