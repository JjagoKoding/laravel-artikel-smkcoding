<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        $post = Post::with('category')->get();
        return view('dashboard.kelolakonten', compact('post'));
    }

    public function create(){
        $category = Category::all();
        return view('crudpost.create', compact('category'));
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif'
        ]);

        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        } else {
            $path = null;
        }

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'image' => $path,
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
        $categories = Category::all();
        return view('crudpost.update', compact('post', 'categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif'
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }
    
            $path = $request->file('image')->store('posts', 'public');
            $post->image = $path;
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('konten.index')->with('success', 'Post berhasil diperbarui!');
    }




}
