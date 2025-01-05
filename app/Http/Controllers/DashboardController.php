<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        
        if (Gate::allows('is-admin')) {
            return view('dashboard.dashboard');
        } else {
            abort(403, 'Akses ditolak');
        }
    }
}
