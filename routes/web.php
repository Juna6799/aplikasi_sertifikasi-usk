<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Route;

// Mengubah rute utama '/' agar menampilkan view 'welcome' terlebih dahulu
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('skemas', SkemaController::class);
Route::resource('pesertas', PesertaController::class);
Route::put('/pesertas/{id}/verifikasi', [App\Http\Controllers\PesertaController::class, 'verifikasi'])->name('pesertas.verifikasi');
Route::put('/pesertas/{id}/batal-verifikasi', [App\Http\Controllers\PesertaController::class, 'batalVerifikasi'])->name('pesertas.batalVerifikasi');
