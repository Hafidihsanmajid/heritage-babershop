<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Models\Barber;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Logout Route (Authenticated Users)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Admin Routes (Auth Required)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $servicesCount = Service::count();
        $barbersCount = Barber::count();
        $recentServices = Service::latest()->take(3)->get();
        $recentBarbers = Barber::latest()->take(4)->get();

        return view('admin.dashboard', compact('servicesCount', 'barbersCount', 'recentServices', 'recentBarbers'));
    })->name('dashboard');

    // Resource CRUD Routes
    Route::resource('services', ServiceController::class);
    Route::resource('barbers', BarberController::class);

    // Compatibility aliases
    Route::get('/layanan', fn () => redirect()->route('admin.services.index'))->name('layanan');
    Route::get('/kapster', fn () => redirect()->route('admin.barbers.index'))->name('kapster');
});
