<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-zinc-950 text-zinc-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Heritage Barbershop</title>

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
<body class="h-full antialiased bg-radial from-zinc-900 via-zinc-950 to-black text-zinc-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    
    <!-- Background Decor Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-amber-600/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-amber-500/5 rounded-full blur-3xl"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#27272a15_1px,transparent_1px),linear-gradient(to_bottom,#27272a15_1px,transparent_1px)] bg-[size:4rem_4rem]"></div>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <!-- Logo & Branding -->
        <div class="flex flex-col items-center text-center">
            <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-700 shadow-xl shadow-amber-900/30 ring-1 ring-amber-300/30 mb-4">
                <!-- Barbershop Razor / Scissors Icon -->
                <svg class="w-9 h-9 text-zinc-950" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="6" cy="6" r="3"/>
                    <circle cx="6" cy="18" r="3"/>
                    <line x1="20" y1="4" x2="8.12" y2="15.88"/>
                    <line x1="14.47" y1="14.48" x2="20" y2="20"/>
                    <line x1="8.12" y1="8.12" x2="12" y2="12"/>
                </svg>
                <span class="absolute -bottom-1 -right-1 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-amber-500 ring-2 ring-zinc-950"></span>
                </span>
            </div>

            <h1 class="font-cinzel text-2xl sm:text-3xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-amber-400 to-amber-100">
                HERITAGE
            </h1>
            <p class="text-xs uppercase tracking-[0.3em] text-amber-400/80 font-semibold mt-0.5">
                Barbershop & Grooming Lounge
            </p>
            <div class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-800/80 text-zinc-300 border border-zinc-700/60">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                Portal Administrasi
            </div>
        </div>

        <!-- Login Card -->
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md px-4 sm:px-0">
            <div class="bg-zinc-900/90 backdrop-blur-xl border border-zinc-800/80 rounded-2xl p-6 sm:p-8 shadow-2xl shadow-black/80">
                
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-zinc-100">Selamat Datang</h2>
                    <p class="text-sm text-zinc-400 mt-1">Silakan masuk dengan akun terdaftar untuk mengelola barbershop.</p>
                </div>

                <!-- Global Validation Error Alert -->
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-950/40 border border-red-800/60 text-red-200 flex items-start gap-3 text-sm animate-shake">
                        <svg class="w-5 h-5 text-red-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <div>
                            <p class="font-medium text-red-300">Autentikasi Gagal</p>
                            <ul class="mt-1 list-disc list-inside text-xs text-red-300/90 space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST" class="space-y-5" autocomplete="on">
                    @csrf

                    <!-- Email or Username Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-zinc-300 mb-1.5">
                            Alamat Email atau Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-zinc-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input 
                                id="email" 
                                name="email" 
                                type="text" 
                                autocomplete="username" 
                                required 
                                value="{{ old('email') }}"
                                placeholder="admin@gmail.com atau Admin Heritage"
                                class="w-full pl-11 pr-4 py-2.5 bg-zinc-950/80 border rounded-xl text-zinc-100 placeholder-zinc-500 text-sm focus:outline-none transition-all duration-200 {{ $errors->has('email') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-zinc-700/80 focus:border-amber-500 focus:ring-1 focus:ring-amber-500' }}"
                            >
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-sm font-medium text-zinc-300">
                                Kata Sandi
                            </label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-zinc-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                autocomplete="current-password" 
                                required 
                                placeholder="••••••••"
                                class="w-full pl-11 pr-11 py-2.5 bg-zinc-950/80 border rounded-xl text-zinc-100 placeholder-zinc-500 text-sm focus:outline-none transition-all duration-200 {{ $errors->has('password') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-zinc-700/80 focus:border-amber-500 focus:ring-1 focus:ring-amber-500' }}"
                            >
                            <button 
                                type="button" 
                                id="togglePasswordBtn"
                                aria-label="Tampilkan atau sembunyikan kata sandi"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-zinc-500 hover:text-zinc-300 transition-colors focus:outline-none"
                            >
                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg id="eyeSlashIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                id="remember" 
                                name="remember" 
                                type="checkbox" 
                                {{ old('remember') ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-zinc-700 bg-zinc-950 text-amber-500 focus:ring-amber-500/50 focus:ring-offset-zinc-900"
                            >
                            <label for="remember" class="ml-2.5 block text-sm text-zinc-300 cursor-pointer select-none">
                                Ingat saya di perangkat ini
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit" 
                            class="w-full relative group flex justify-center items-center py-2.5 px-4 border border-amber-400/40 rounded-xl text-sm font-semibold text-zinc-950 bg-gradient-to-r from-amber-400 via-amber-300 to-amber-500 hover:from-amber-300 hover:to-amber-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 focus:ring-offset-zinc-900 shadow-lg shadow-amber-500/20 hover:shadow-amber-500/30 transition-all duration-200 active:scale-[0.99] cursor-pointer"
                        >
                            <span>Masuk ke Panel</span>
                            <svg class="ml-2 w-4 h-4 text-zinc-950 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Return to Main Website Button -->
                    <div>
                        <a 
                            href="{{ route('home') }}" 
                            class="w-full inline-flex justify-center items-center gap-2 py-2.5 px-4 rounded-xl text-sm font-medium text-zinc-300 hover:text-zinc-100 bg-zinc-800/80 hover:bg-zinc-800 border border-zinc-700/80 hover:border-zinc-600 transition-all duration-200 active:scale-[0.99]"
                        >
                            <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Kembali ke Halaman Utama</span>
                        </a>
                    </div>
                </form>

                <!-- Footer Hint -->
                <div class="mt-6 pt-5 border-t border-zinc-800/80 text-center">
                    <p class="text-xs text-zinc-400">
                        Login dapat menggunakan <span class="text-amber-400 font-semibold">Email</span> (<span class="text-amber-300 font-mono">admin@gmail.com</span>) atau <span class="text-amber-400 font-semibold">Nama</span> (<span class="text-amber-300 font-mono">Admin Heritage</span>).
                    </p>
                </div>
            </div>
            
            <p class="text-center text-xs text-zinc-600 mt-6">
                &copy; {{ date('Y') }} Heritage Barbershop. All rights reserved.
            </p>
        </div>
    </div>

    <!-- Toggle Password Visibility Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('togglePasswordBtn');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', () => {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    eyeIcon.classList.toggle('hidden', isPassword);
                    eyeSlashIcon.classList.toggle('hidden', !isPassword);
                });
            }
        });
    </script>
</body>
</html>

