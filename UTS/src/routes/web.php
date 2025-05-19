<?php

use Illuminate\Support\Facades\Route;
use App\Models\Beasiswa;
use App\Http\Controllers\Frontend\DashboardMahasiswaController;
use App\Http\Controllers\Frontend\BeasiswaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\RegisterController;
use Livewire\Livewire;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

/*
|-----------------------------------------
| Livewire Routes (JANGAN DIHAPUS)
|-----------------------------------------
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

/*
|-----------------------------------------
| Halaman Utama
|-----------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|-----------------------------------------
| Registrasi Mahasiswa
|-----------------------------------------
*/
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

/*
|-----------------------------------------
| Dashboard Mahasiswa (Autentikasi dibutuhkan)
|-----------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-mahasiswa', [DashboardMahasiswaController::class, 'index'])->name('dashboard.mahasiswa');
    Route::get('/dashboard-mahasiswa/profil', function () {
        return view('frontend.profil');
    })->name('mahasiswa.profil');

    Route::get('/status-pendaftaran', [FrontendController::class, 'status'])->name('mahasiswa.status');

    /*
    |-------------------------------------
    | Pendaftaran Beasiswa
    |-------------------------------------
    */
    Route::get('/beasiswa/{id}/daftar', [BeasiswaController::class, 'create'])->name('daftar.beasiswa');
    Route::post('/beasiswa/{id}/daftar', [BeasiswaController::class, 'store'])->name('daftar.beasiswa.store');
});

/*
|-----------------------------------------
| Lihat Daftar Beasiswa (tanpa login)
|-----------------------------------------
*/
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');