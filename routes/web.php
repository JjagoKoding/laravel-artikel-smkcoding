<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/kelola-konten', [PostController::class, 'index'])->name('konten.index');

Route::get('/kelola-konten/create', [PostController::class, 'create'])->name('konten.create');
Route::post('/kelola-konten', [PostController::class, 'store'])->name('konten.store');

Route::delete('kelola-konten/{id}', [PostController::class, 'destroy']);

Route::get('/kelola-konten/{id}/edit', [PostController::class, 'edit'])->name('konten.edit');
Route::put('/kelola-konten/{id}', [PostController::class, 'update'])->name('konten.update');