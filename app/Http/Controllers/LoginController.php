<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLoginForm() {
        if (session('isLogged')) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Users::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'isLogged' => true,
                'userRole' => $user->role,
                'userId' => $user->id,
            ]);

            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout() {
        session()->flush();  
        return redirect()->route('auth.login')->with('success', 'Logout berhasil!');
    }
}
