<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes (Website)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/news', function () {
    return view('berita');
});

Route::get('/news/detail', function () {
    return view('detail-berita');
});

Route::get('/akademik', function () {
    return view('akademik');
});

Route::get('/kesiswaan', function () {
    return view('kesiswaan');
});

Route::get('/ppdb', function () {
    return view('ppdb');
});

Route::get('/kontak', function () {
    return view('contact');
});

/*
|--------------------------------------------------------------------------
| Admin Auth Routes (Guest only — tidak perlu login)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Login & Logout
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Admin Protected Routes (Wajib Login)
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin.auth')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Berita
        Route::get('/berita', fn() => view('admin.berita.index'))->name('berita.index');

        // Agenda
        Route::get('/agenda', fn() => view('admin.agenda.index'))->name('agenda.index');

        // Pengumuman
        Route::get('/pengumuman', fn() => view('admin.pengumuman.index'))->name('pengumuman.index');

        // Galeri
        Route::get('/galeri', fn() => view('admin.galeri.index'))->name('galeri.index');

        // Siswa
        Route::get('/siswa', fn() => view('admin.siswa.index'))->name('siswa.index');

        // Prestasi
        Route::get('/prestasi', fn() => view('admin.prestasi.index'))->name('prestasi.index');

        // PPDB
        Route::get('/ppdb', fn() => view('admin.ppdb.index'))->name('ppdb.index');

        // Profil Sekolah
        Route::get('/profil', fn() => view('admin.profil.index'))->name('profil.index');

        // Pengguna
        Route::get('/pengguna', fn() => view('admin.pengguna.index'))->name('pengguna.index');

    });
});

