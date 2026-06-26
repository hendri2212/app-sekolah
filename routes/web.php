<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KesiswaanController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\OsisController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminExtracurricularController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;

/*
|--------------------------------------------------------------------------
| Public Routes (Website)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/akademik', fn() => view('akademik'));
Route::get('/kesiswaan', [KesiswaanController::class, 'index'])->name('kesiswaan');
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
        Route::resource('pengumuman', AdminAnnouncementController::class)->names('pengumuman');

        // Galeri
        Route::get('/galeri', fn() => view('admin.galeri.index'))->name('galeri.index');

        // Siswa
        Route::get('/siswa', fn() => view('admin.siswa.index'))->name('siswa.index');

        // Prestasi
        Route::resource('prestasi', AdminAchievementController::class)
            ->parameters(['prestasi' => 'achievement'])
            ->names('prestasi');

        // PPDB
        Route::get('/ppdb', [AdminPpdbController::class, 'index'])->name('ppdb.index');
        Route::post('/ppdb/settings', [AdminPpdbController::class, 'updateSettings'])->name('ppdb.settings.update');

        // Profil Sekolah
        Route::get('/profil', [SchoolProfileController::class, 'index'])->name('profil.index');
        Route::post('/profil', [SchoolProfileController::class, 'store'])->name('profil.store');

        // OSIS
        Route::get('/osis', [OsisController::class, 'index'])->name('osis.index');
        Route::post('/osis', [OsisController::class, 'store'])->name('osis.store');

        // Ekstrakurikuler
        Route::get('/ekstrakurikuler', [AdminExtracurricularController::class, 'index'])->name('ekstrakurikuler.index');
        Route::post('/ekstrakurikuler/kategori', [AdminExtracurricularController::class, 'storeCategory'])->name('ekstrakurikuler.kategori.store');
        Route::put('/ekstrakurikuler/kategori/{category}', [AdminExtracurricularController::class, 'updateCategory'])->name('ekstrakurikuler.kategori.update');
        Route::delete('/ekstrakurikuler/kategori/{category}', [AdminExtracurricularController::class, 'destroyCategory'])->name('ekstrakurikuler.kategori.destroy');
        Route::post('/ekstrakurikuler', [AdminExtracurricularController::class, 'store'])->name('ekstrakurikuler.store');
        Route::put('/ekstrakurikuler/{extracurricular}', [AdminExtracurricularController::class, 'update'])->name('ekstrakurikuler.update');
        Route::delete('/ekstrakurikuler/{extracurricular}', [AdminExtracurricularController::class, 'destroy'])->name('ekstrakurikuler.destroy');

        // Fasilitas
        Route::resource('fasilitas', AdminFacilityController::class)
            ->except(['show', 'edit'])
            ->parameters(['fasilitas' => 'facility'])
            ->names('fasilitas');

        // Pengguna
        Route::resource('pengguna', AdminUserController::class)->names('pengguna');

    });
});
