<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::with('category')->get();
        return view('home', compact('posts'));
    }

    public function post($id) {
        $post = Post::with('category')->findOrFail($id);
        return view('post', compact('post'));
    }
}
