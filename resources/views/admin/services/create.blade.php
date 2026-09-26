@extends('layouts.admin')

@section('title', 'Tambah Layanan Baru')
@section('page_title', 'Tambah Layanan')
@section('page_subtitle', 'Masukkan paket atau perawatan baru ke daftar layanan Heritage Barbershop')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Back Button & Breadcrumb -->
    <div>
        <a 
            href="{{ route('admin.services.index') }}" 
            class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-amber-400 transition-colors"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali ke Daftar Layanan</span>
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-zinc-900/90 border border-zinc-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6 pb-6 border-b border-zinc-800/80">
            <h2 class="text-xl font-bold text-zinc-100">Formulir Layanan Baru</h2>
            <p class="text-xs text-zinc-400 mt-1">Lengkapi informasi paket cukur dan perawatan rambut di bawah ini.</p>
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

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-zinc-300 mb-2">
                    Nama Layanan <span class="text-amber-400">*</span>
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title') }}" 
                    required 
                    placeholder="Contoh: Heritage Classic Fade & Wash" 
                    class="w-full px-4 py-2.5 bg-zinc-950/80 border rounded-xl text-zinc-100 placeholder-zinc-500 text-sm focus:outline-none transition-all duration-200 {{ $errors->has('title') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-zinc-700/80 focus:border-amber-500 focus:ring-1 focus:ring-amber-500' }}"
                >
                @error('title')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-zinc-300 mb-2">
                    Harga Layanan (IDR) <span class="text-amber-400">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-zinc-400 font-semibold text-xs">
                        Rp
                    </div>
                    <input 
                        type="number" 
                        id="price" 
                        name="price" 
                        value="{{ old('price') }}" 
                        required 
                        min="0"
                        step="1000"
                        placeholder="Contoh: 65000" 
                        class="w-full pl-11 pr-4 py-2.5 bg-zinc-950/80 border rounded-xl text-zinc-100 placeholder-zinc-500 text-sm font-mono focus:outline-none transition-all duration-200 {{ $errors->has('price') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-zinc-700/80 focus:border-amber-500 focus:ring-1 focus:ring-amber-500' }}"
                    >
                </div>
                <p class="text-[11px] text-zinc-400 mt-1">Masukkan nominal tanpa tanda titik atau koma.</p>
                @error('price')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Foto Layanan -->
            <div>
                <label for="image" class="block text-sm font-medium text-zinc-300 mb-2">
                    Upload Foto Layanan
                </label>
                
                <div class="space-y-3">
                    <input 
                        type="file" 
                        id="image" 
                        name="image" 
                        accept="image/png,image/jpeg,image/jpg,image/webp"
                        class="block w-full text-xs text-zinc-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-amber-400 hover:file:bg-zinc-700 cursor-pointer bg-zinc-950/80 border border-zinc-700/80 rounded-xl focus:outline-none"
                        onchange="previewServiceImage(event)"
                    >
                    <p class="text-[11px] text-zinc-400">
                        Format didukung: JPG, PNG, WEBP (Maksimal 5MB). Foto akan otomatis di-crop & disesuaikan ke rasio landscape kartu layanan di halaman utama (800x450 px).
                    </p>
                    
                    <!-- Live Image Preview Box (Matches Home Page Card) -->
                    <div id="service-preview-wrapper" class="hidden">
                        <span class="text-xs text-zinc-400 block mb-1.5 font-medium">Pratinjau Tampilan di Halaman Utama:</span>
                        <div class="w-full max-w-xs h-36 rounded-xl bg-zinc-950 overflow-hidden border border-zinc-800 shadow-md">
                            <img id="service-preview-img" src="#" alt="Pratinjau Layanan" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
                @error('image')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-zinc-300 mb-2">
                    Deskripsi Layanan
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="4" 
                    placeholder="Jelaskan detail yang didapatkan pelanggan, misalnya: Potongan rambut presisi, pijat relaksasi kepala, keramas dengan sampo herbal, dan styling dengan pomade premium."
                    class="w-full px-4 py-2.5 bg-zinc-950/80 border rounded-xl text-zinc-100 placeholder-zinc-500 text-sm focus:outline-none transition-all duration-200 {{ $errors->has('description') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-zinc-700/80 focus:border-amber-500 focus:ring-1 focus:ring-amber-500' }}"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-800">
                <a 
                    href="{{ route('admin.services.index') }}" 
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
                    <span>Simpan Layanan</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function previewServiceImage(event) {
        const file = event.target.files[0];
        const wrapper = document.getElementById('service-preview-wrapper');
        const img = document.getElementById('service-preview-img');
        
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

