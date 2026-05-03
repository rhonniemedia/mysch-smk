<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataTracerStudyController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Admin
Route::middleware(['auth:web'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

// Dashboard Siswa
Route::middleware(['auth:pelajar'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');
});





// Pengumuman
Route::get('/announcement', function () {
    return view('pages.announcement');
})->name('announcement.index');

// Tracer Study
Route::middleware('auth:pelajar')->group(function () {
    Route::get('/tracer-study', [DataTracerStudyController::class, 'index'])->name('tracer.index');
    Route::post('/tracer-study', [DataTracerStudyController::class, 'store'])->name('tracer.store');
});

// Profil Siswa
Route::middleware(['auth:pelajar'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});

// Daftar Pengumuman
Route::get('/announcement', function () {
    return view('pages.announcement.index');
})->name('announcement.index');

// Detail Pengumuman
Route::get('/announcement/{slug}', function ($slug) {
    // Nantinya di sini kita ambil data dari DB berdasarkan slug
    return view('pages.announcement.show', ['slug' => $slug]);
})->name('announcement.show');
