<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BalasanController;
use App\Http\Controllers\AdminITController;

// Landingpage
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

// Form pengungkapan
Route::get('/form-penuh', function () {
    return view('formpenuh');
})->name('form.penuh');

// Route::get('/form-anonim', function () {
//     return view('formanonim');
// })->name('form.anonim');

// Halaman selesai
Route::get('/selesai', function () {
    return view('selesai');
})->name('form.selesai');

// Laporan
// Form + simpan
Route::get('/form-penuh', [ReportController::class, 'create'])->name('form.penuh');
Route::post('/form-penuh', [ReportController::class, 'store'])->name('form.store');
Route::get('/report/form', [ReportController::class, 'create'])->name('report.form');
Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');

// Dashboard (Admin)
Route::get('/dashboard', [ReportController::class, 'index'])->name('dashboard');
Route::get('/dashboard/report/{id}', [ReportController::class, 'show'])->name('report.show');
Route::post('/dashboard/report/{id}/respond', [ReportController::class, 'respond'])->name('report.respond');

// Auth (Login / Logout)
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Menu Admin (halaman setelah login, sebelum dashboard)
Route::get('/menuadmin', function () {
    return view('menuadmin'); // file: resources/views/menuadmin.blade.php
})->name('menu.admin');

// Form Anonim
Route::get('/form-anonim', [ReportController::class, 'createAnonim'])->name('form.anonim');
Route::post('/form-anonim', [ReportController::class, 'storeAnonim'])->name('form.anonim.store');

// card dashboard
Route::get('/dashboard', [ReportController::class, 'dashboard'])->name('dashboard');

// nampilin menu laporan masuk
Route::get('/admin/laporan-masuk', [ReportController::class, 'laporanMasuk'])->name('laporan.masuk');

// nampilin detail laporan
Route::get('/laporan/{id}', [ReportController::class, 'show'])->name('laporan.detail');

// balasan laporan
Route::post('/laporan/{id}/balasan', [BalasanController::class, 'kirimBalasan'])->name('balasan.kirim');

// balasan yang anonim
Route::post('/laporan-selesai', [ReportController::class, 'selesai'])
    ->name('laporan.selesai');

// nampilin menu laporan masuk dan laporan selesai
Route::get('/laporan-masuk', [ReportController::class, 'laporanMasuk'])->name('laporan.masuk');
Route::get('/laporan-selesai', [ReportController::class, 'laporanSelesai'])->name('laporan.selesai');

// export laporan selesai ke excel
Route::get('/admin/laporan-selesai/export', [ReportController::class, 'exportExcel'])->name('laporan.export');
Route::get('/laporan/export', [ReportController::class, 'exportExcel'])->name('laporan.export');

// Route untuk Admin IT mengelola akun admin whistleblower
Route::middleware(['role:it'])->group(function () {
Route::get('/admin/it', [AdminITController::class, 'index'])->name('admin.it.index');
Route::post('/admin/it/store', [AdminITController::class, 'store'])->name('admin.it.store');
Route::delete('/admin/it/delete/{id}', [AdminITController::class, 'destroy'])->name('admin.it.delete');
});

// Route untuk Admin Whistleblower mengakses laporan masuk
Route::middleware(['auth', 'role:whistleblower'])->group(function () {
    Route::get('/admin/whistleblower', [ReportController::class, 'laporanMasuk'])->name('admin.whistleblower');
});

