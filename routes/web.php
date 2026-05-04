<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\SklController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\DataPengumumanController;
use App\Http\Controllers\DashboardController as PelajarDashboard;
use App\Http\Controllers\DataTracerStudyController;
use App\Http\Controllers\ImportDataPelajarController;
use App\Http\Controllers\ProfileController;
use App\Models\DataPengumuman;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', function () {
    return redirect()->route('student.dashboard');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/import-pelajar', [ImportDataPelajarController::class, 'index'])->name('import.pelajar.index');
    Route::post('/admin/import-pelajar', [ImportDataPelajarController::class, 'store'])->name('import.pelajar.store');
    Route::get('/admin/import-pelajar/template', [ImportDataPelajarController::class, 'template'])->name('import.pelajar.template');
    Route::get('/admin/data', [DataController::class, 'index'])->name('admin.data');
});

// Dashboard Siswa
Route::middleware(['auth:pelajar'])->group(function () {
    Route::get('/dashboard', [PelajarDashboard::class, 'index'])->name('student.dashboard');
});

// Pengumuman

Route::middleware(['auth:pelajar'])->group(function () {
    Route::get('/announcement', [DataPengumumanController::class, 'index'])->name('announcement.index');
    Route::get('/announcement/{id}', [DataPengumumanController::class, 'show'])->name('announcement.show');
    Route::get('/download-skl', [SklController::class, 'download'])->name('skl.download');
});


// Tracer Study
Route::middleware('auth:pelajar')->group(function () {
    Route::get('/tracer-study', [DataTracerStudyController::class, 'index'])->name('tracer.index');
    Route::post('/tracer-study', [DataTracerStudyController::class, 'store'])->name('tracer.store');
});

// Profil Siswa
Route::middleware(['auth:pelajar'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});
