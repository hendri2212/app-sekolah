<?php

use Illuminate\Support\Facades\Route;

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
