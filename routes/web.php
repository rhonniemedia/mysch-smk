<?php

use Illuminate\Support\Facades\Route;

// Beranda / Dashboard
Route::get('/dashboard', function () {
    return view('pages.dashboard'); // Sesuaikan dengan folder view Anda
})->name('dashboard.index');

// Pengumuman
Route::get('/announcement', function () {
    return view('pages.announcement');
})->name('announcement.index');

// Tracer Study
Route::get('/tracer-study', function () {
    return view('pages.tracer');
})->name('tracer.index');

// Profil Siswa
Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile.index');

// Daftar Pengumuman
Route::get('/announcement', function () {
    return view('pages.announcement.index');
})->name('announcement.index');

// Detail Pengumuman
Route::get('/announcement/{slug}', function ($slug) {
    // Nantinya di sini kita ambil data dari DB berdasarkan slug
    return view('pages.announcement.show', ['slug' => $slug]);
})->name('announcement.show');
