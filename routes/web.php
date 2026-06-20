<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;

/*
|--------------------------------------------------------------------------
| Public Routes (Website)
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('dashboard'));
Route::get('/profile', fn() => view('profile'));
Route::get('/akademik', fn() => view('akademik'));
Route::get('/kesiswaan', fn() => view('kesiswaan'));
Route::get('/ppdb', fn() => view('ppdb'));
Route::get('/kontak', fn() => view('contact'));

// Berita
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');

// Filter berdasarkan kategori
Route::get('/kategori/{category:slug}', [CategoryController::class, 'show'])->name('kategori.show');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes (Guest only — tidak perlu login)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Redirect /admin ke dashboard (middleware akan handle jika belum login)
    Route::redirect('/', '/admin/dashboard');

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
        Route::resource('berita', \App\Http\Controllers\Admin\NewsController::class)->names('berita');

        // Agenda
        Route::resource('agenda', AdminAgendaController::class)->names('agenda');

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
