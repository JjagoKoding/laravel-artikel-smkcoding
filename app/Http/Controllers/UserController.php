<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() {
        $users = Users::all();
        return view('dashboard.peranpengguna', compact('users'));
    }

    public function create(){
        $roles = ['admin', 'user'];
        return view('cruduser.create', compact('roles'));
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
            'password' =>Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat!');
    }

    public function destroy($id) {
        $user = Users::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    public function edit($id) {
        $user = Users::findOrFail($id);
        $roles = [
            'User' => 'User',
            'Admin' => 'Admin'
        ];
        return view('cruduser.update', compact('user'), compact('roles'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = Users::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }
}
