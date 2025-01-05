<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = Post::all();
        return view('dashboard.kelolakonten', compact('post'));
    }

    public function create(){
        return view('crudpost.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('konten.create')->with('success', 'Post berhasil dibuat!');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('konten.index')->with('success', 'Post berhasil dihapus!');
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('crudpost.update', compact('post'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('konten.index')->with('success', 'Post berhasil diperbarui!');
    }




}
