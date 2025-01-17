<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/kelola-konten', [PostController::class, 'index'])->name('konten.index');

Route::get('/kelola-konten/create', [PostController::class, 'create'])->name('konten.create');
Route::post('/kelola-konten', [PostController::class, 'store'])->name('konten.store');

Route::delete('kelola-konten/{id}', [PostController::class, 'destroy']);

Route::get('/kelola-konten/{id}/edit', [PostController::class, 'edit'])->name('konten.edit');
Route::put('/kelola-konten/{id}', [PostController::class, 'update'])->name('konten.update');

Route::get('/kelola-kategori', [CategoryController::class, 'index'])->name('category.index');

Route::get('/kelola-kategori/create',[CategoryController::class, 'create'])->name('category.create');
Route::post('/kelola-kategori', [CategoryController::class, 'store'])->name('category.store');

Route::delete('kelola-kategori/{id}', [CategoryController::class, 'destroy']);

Route::get('/kelola-kategori/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/kelola-kategori/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/peran-pengguna', [UserController::class, 'index'])->name('user.index');

Route::get('/peran-pengguna/create',[UserController::class, 'create'])->name('user.create');
Route::post('/peran-pengguna', [UserController::class, 'store'])->name('user.store');

Route::delete('peran-pengguna/{id}', [UserController::class, 'destroy']);

Route::get('/peran-pengguna/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/peran-pengguna/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', AdminMiddleware::class . ':admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/post/{id}', [HomeController::class, 'post']);