<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = Users::all();
        return view('dashboard.peranpengguna', compact('users'));
    }

    public function create(){
        return view('cruduser.create');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('user.create')->with('success', 'User berhasil dibuat!');
    }
}
