<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/kelola-konten', [PostController::class, 'index']);

Route::get('/kelola-konten/create', [PostController::class, 'create'])->name('konten.create');
Route::post('/kelola-konten', [PostController::class, 'store'])->name('konten.store');
