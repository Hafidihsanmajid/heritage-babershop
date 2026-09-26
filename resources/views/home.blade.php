@extends('layouts.public')

@section('title', 'Heritage Barbershop - Classic Grooming & Gentleman Lounge')

@section('content')

    <!-- HERO SECTION -->
    <section id="hero" class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-radial from-zinc-900 via-zinc-950 to-black py-20 lg:py-32">
        <!-- Background Lighting and Grid Elements -->
        <div class="absolute inset-0 pointer-events-none -z-10 overflow-hidden">
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[40rem] h-[40rem] bg-amber-500/10 rounded-full blur-[140px]"></div>
            <div class="absolute bottom-0 right-10 w-96 h-96 bg-amber-600/5 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#27272a15_1px,transparent_1px),linear-gradient(to_bottom,#27272a15_1px,transparent_1px)] bg-[size:4rem_4rem]"></div>
            <!-- Vintage Barber Diagonal Stripes Subtle Watermark -->
            <div class="absolute inset-0 opacity-[0.03] bg-[repeating-linear-gradient(45deg,#fff,#fff_10px,transparent_10px,transparent_20px)]"></div>
        </div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            
            <!-- Crest Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-zinc-900/90 border border-amber-500/30 text-amber-400 text-xs font-semibold uppercase tracking-widest mb-8 shadow-lg shadow-amber-500/5">
                <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <circle cx="6" cy="6" r="3"/>
                    <circle cx="6" cy="18" r="3"/>
                    <line x1="20" y1="4" x2="8.12" y2="15.88"/>
                    <line x1="14.47" y1="14.48" x2="20" y2="20"/>
                    <line x1="8.12" y1="8.12" x2="12" y2="12"/>
                </svg>
                <span>EST. 2024 • THE PREMIUM GENTLEMAN LOUNGE</span>
            </div>

            <!-- Main Headline -->
            <h1 class="font-cinzel text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-wider text-transparent bg-clip-text bg-gradient-to-b from-amber-100 via-amber-300 to-amber-600 leading-tight mb-6">
                HERITAGE BARBERSHOP
            </h1>

            <p class="max-w-2xl mx-auto text-base sm:text-lg text-zinc-300 font-light leading-relaxed mb-10">
                Seni tata rambut klasik berpadu sentuhan modern. Kami mendedikasikan presisi pangkas, perawatan jenggot mewah, dan kenyamanan istimewa untuk setiap gentleman sejati.
            </p>

            <!-- Call to Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a 
                    href="#services" 
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-gradient-to-r from-amber-400 via-amber-300 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-zinc-950 font-bold text-sm uppercase tracking-wider shadow-xl shadow-amber-500/25 hover:shadow-amber-500/40 transition-all duration-200 active:scale-95 cursor-pointer"
                >
                    <span>Booking Sekarang</span>
                    <svg class="w-4 h-4 text-zinc-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <a 
                    href="#about" 
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-zinc-900/90 hover:bg-zinc-800 text-zinc-200 hover:text-amber-400 border border-zinc-700/80 hover:border-amber-500/40 font-semibold text-sm transition-all duration-200"
                >
                    <span>Tentang Heritage</span>
                </a>
            </div>

            <!-- Key Features Icons Bar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-16 pt-12 border-t border-zinc-800/80 text-left">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-zinc-100 block">Master Barber</span>
                        <span class="text-[11px] text-zinc-400 block">Tersertifikasi & Ahli</span>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-zinc-100 block">Hot Towel & Shave</span>
                        <span class="text-[11px] text-zinc-400 block">Relaksasi Maksimal</span>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-zinc-100 block">Produk Premium</span>
                        <span class="text-[11px] text-zinc-400 block">Pomade & Hair Tonic</span>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-zinc-100 block">Private Lounge</span>
                        <span class="text-[11px] text-zinc-400 block">Kopi & Free Wi-Fi</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ABOUT US SECTION -->
    <section id="about" class="py-24 bg-zinc-900/40 border-y border-zinc-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                <!-- Left: Aesthetic Imagery & Badge -->
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden border border-zinc-800 shadow-2xl bg-zinc-950 aspect-[4/3]">
                        <img 
                            src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?w=800&q=80" 
                            alt="Heritage Barbershop Interior" 
                            class="w-full h-full object-cover opacity-80 hover:scale-105 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-transparent"></div>
                    </div>

                    <!-- Floating Experience Card -->
                    <div class="absolute -bottom-6 -right-4 sm:right-6 bg-zinc-900/95 backdrop-blur-md border border-amber-500/30 rounded-2xl p-4 sm:p-5 shadow-2xl flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center font-cinzel text-xl font-bold text-amber-400">
                            HB
                        </div>
                        <div>
                            <span class="text-xs uppercase font-bold text-zinc-400 tracking-wider block">Standar Kualitas</span>
                            <span class="text-sm font-bold text-zinc-100 block">Kepuasan & Presisi 100%</span>
                        </div>
                    </div>
                </div>

                <!-- Right: About Description -->
                <div class="space-y-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-amber-400 block mb-2">
                            Tradisi & Keahlian
                        </span>
                        <h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-zinc-100 leading-tight">
                            Lebih dari Sekadar Potong Rambut, Ini Gaya Hidup Pria.
                        </h2>
                    </div>

                    <p class="text-sm text-zinc-300 leading-relaxed">
                        Di <strong>Heritage Barbershop</strong>, kami percaya bahwa penampilan pria adalah cerminan dari disiplin dan karakter. Berakar pada keaslian teknik pangkas tradisional ala barbershop klasik dan disempurnakan dengan tren kontemporer, setiap layanan kami dirancang khusus untuk memenuhi kepribadian unik Anda.
                    </p>

                    <p class="text-sm text-zinc-400 leading-relaxed">
                        Didukung oleh kapster berpengalaman yang memahami betul anatomi bentuk wajah serta tekstur rambut, Anda tidak hanya mendapatkan potongan rambut presisi, tetapi juga ritual relaksasi menyeluruh lewat handuk hangat beraroma aromaterapi dan pijatan kepala yang menyegarkan.
                    </p>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-xs text-zinc-300">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Konsultasi Model Rambut Gratis</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-zinc-300">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Alat Steril & Berstandar Higienis</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-zinc-300">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Ruang Dingin & Kursi Cukur Kulit</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-zinc-300">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Produk Styling Pomade Import</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SERVICES & PRICING SECTION -->
    <section id="services" class="py-24 bg-zinc-950 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-amber-400 block mb-2">
                    Paket Perawatan
                </span>
                <h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-zinc-100">
                    Menu Layanan & Harga
                </h2>
                <p class="mt-3 text-sm text-zinc-400">
                    Pilihan layanan pangkas rambut, shaving presisi, hingga paket grooming lengkap dengan harga transparan.
                </p>
            </div>

            <!-- Services Grid Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($services as $service)
                    <div class="group rounded-2xl bg-zinc-900/80 border border-zinc-800/80 hover:border-amber-500/50 p-6 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 shadow-lg hover:shadow-amber-500/5">
                        <div>
                            <!-- Service Image -->
                            <div class="w-full h-44 rounded-xl bg-zinc-950 overflow-hidden mb-5 border border-zinc-800">
                                @if ($service->image_url)
                                    <img 
                                        src="{{ $service->image_url }}" 
                                        alt="{{ $service->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1503951914875-452162b0f3f1?w=400&q=80';"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-zinc-950 text-amber-500/40">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <circle cx="6" cy="6" r="3"/>
                                            <circle cx="6" cy="18" r="3"/>
                                            <line x1="20" y1="4" x2="8.12" y2="15.88"/>
                                            <line x1="14.47" y1="14.48" x2="20" y2="20"/>
                                            <line x1="8.12" y1="8.12" x2="12" y2="12"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Title & Price -->
                            <div class="flex items-start justify-between gap-2 mb-2">
                                <h3 class="font-bold text-base text-zinc-100 group-hover:text-amber-400 transition-colors">
                                    {{ $service->title }}
                                </h3>
                            </div>

                            <div class="mb-3">
                                <span class="font-mono text-base font-extrabold text-amber-400">
                                    {{ $service->formatted_price }}
                                </span>
                            </div>

                            <!-- Description -->
                            <p class="text-xs text-zinc-400 leading-relaxed line-clamp-3 mb-6">
                                {{ $service->description ?? 'Layanan perawatan berkualitas tinggi untuk kenyamanan dan penampilan prima Anda.' }}
                            </p>
                        </div>

                        <!-- Booking Button for This Service -->
                        <a 
                            href="https://wa.me/6281234567890?text={{ urlencode('Halo Heritage Barbershop, saya ingin reservasi untuk layanan: ' . $service->title . ' (' . $service->formatted_price . ')') }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-zinc-800 hover:bg-amber-500 text-zinc-200 hover:text-zinc-950 font-semibold text-xs tracking-wider uppercase transition-all duration-200"
                        >
                            <span>Pilih Layanan Ini</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-zinc-500">
                        <p>Belum ada layanan yang ditambahkan ke sistem.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- OUR BARBERS SECTION -->
    <section id="barbers" class="py-24 bg-zinc-900/40 border-t border-zinc-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-amber-400 block mb-2">
                    Tim Profesional
                </span>
                <h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-zinc-100">
                    Temui Master Barbers Kami
                </h2>
                <p class="mt-3 text-sm text-zinc-400">
                    Setiap kapster di Heritage Barbershop dibekali keahlian seni memotong presisi serta dedikasi pada kepuasan pelanggan.
                </p>
            </div>

            <!-- Barbers Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($barbers as $barber)
                    <div class="group rounded-2xl bg-zinc-900/90 border border-zinc-800/80 hover:border-amber-500/40 p-5 text-center transition-all duration-300 hover:-translate-y-1 shadow-lg">
                        
                        <!-- Barber Photo / Avatar -->
                        <div class="relative w-28 h-28 mx-auto rounded-full overflow-hidden mb-4 border-2 border-amber-500/40 shadow-xl">
                            @if ($barber->image_url)
                                <img 
                                    src="{{ $barber->image_url }}" 
                                    alt="{{ $barber->name }}" 
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                    onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&q=80';"
                                >
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center font-cinzel font-bold text-xl text-zinc-950">
                                    {{ strtoupper(substr($barber->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>

                        <!-- Name & Role -->
                        <h3 class="font-bold text-base text-zinc-100 group-hover:text-amber-400 transition-colors">
                            {{ $barber->name }}
                        </h3>
                        
                        <p class="text-xs text-amber-400/90 font-medium mt-1">
                            {{ $barber->role }}
                        </p>

                        <!-- Instagram Link -->
                        <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-center">
                            @if ($barber->instagram_handle)
                                <a 
                                    href="https://instagram.com/{{ $barber->clean_instagram_handle }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-1.5 text-xs text-zinc-400 hover:text-pink-400 transition-colors font-mono"
                                >
                                    <svg class="w-3.5 h-3.5 text-pink-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                    <span>{{ str_starts_with($barber->instagram_handle, '@') ? $barber->instagram_handle : '@' . $barber->instagram_handle }}</span>
                                </a>
                            @else
                                <span class="text-[11px] text-zinc-500">Heritage Staff</span>
                            @endif
                        </div>

                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-zinc-500">
                        <p>Belum ada profil kapster terdaftar.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- CALL TO ACTION BANNER -->
    <section class="py-20 bg-gradient-to-b from-zinc-950 via-zinc-900 to-black relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-20 bg-[radial-gradient(#f59e0b_1px,transparent_1px)] [background-size:16px_16px]"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-400 text-xs font-semibold uppercase tracking-wider">
                Reservasi Mudah & Cepat
            </span>
            
            <h2 class="font-cinzel text-3xl sm:text-5xl font-bold text-zinc-100 leading-tight">
                Siap Tampil Lebih Percaya Diri Hari Ini?
            </h2>
            
            <p class="text-sm sm:text-base text-zinc-300 max-w-xl mx-auto">
                Hindari antrean panjang dengan melakukan pemesanan kursi cukur dan kapster favorit Anda melalui WhatsApp langsung.
            </p>

            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a 
                    href="https://wa.me/6281234567890?text={{ urlencode('Halo Heritage Barbershop, saya ingin reservasi jadwal potong rambut.') }}" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 font-bold text-sm uppercase tracking-wider shadow-lg shadow-emerald-500/20 transition-all active:scale-95"
                >
                    <svg class="w-5 h-5 text-zinc-950" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.044c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.158.57 4.184 1.564 5.938l-1.658 6.062 6.223-1.632c1.696.927 3.639 1.454 5.871 1.454 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/>
                    </svg>
                    <span>Hubungi via WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

@endsection

