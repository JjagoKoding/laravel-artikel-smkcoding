<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            if (Gate::allows('is-user')) {
                $posts = Post::with('category')->get();
                return view('home', compact('posts'));
            }
        }
        
    }

    public function post($id) {
        if (Gate::allows('is-user')) {
            $post = Post::with('category')->findOrFail($id);
            return view('post', compact('post'));
        }
    }
}
