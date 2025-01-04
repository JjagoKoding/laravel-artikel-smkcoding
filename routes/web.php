<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/kelola-konten', function () {
    return view('dashboard.kelolakonten');
});
