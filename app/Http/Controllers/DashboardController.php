<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        if (!session('isLogged')) {
            return redirect()->route('auth.login');
        }

        return view('dashboard.dashboard');
    }
}
