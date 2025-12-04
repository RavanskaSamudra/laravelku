<?php

use App\Http\Controllers\DikiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/enkripsi', [DikiController::class, 'enkripsi']);
Route::get('/data/', [DikiController::class, 'data']);
Route::get('/data/{data_rahasia}', [DikiController::class, 'data_proses']);

Route::get('/hash', [DikiController::class, 'hash']);

Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload/proses', [UploadController::class, 'proses_upload']);
Route::get('/upload/hapus/{id}', [UploadController::class, 'hapus']);

Route::get('/session/tampil', [TesController::class, 'tampilkanSession']);
Route::get('/session/buat', [TesController::class, 'buatSession']);
Route::get('/session/hapus', [TesController::class, 'hapusSession']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
