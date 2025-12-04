<?php

use App\Http\Controllers\DikiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/enkripsi', [DikiController::class, 'enkripsi']);
Route::get('/data/', [DikiController::class, 'data']);
Route::get('/data/{data_rahasia}', [DikiController::class, 'data_proses']);

Route::get('/hash', [DikiController::class, 'hash']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
