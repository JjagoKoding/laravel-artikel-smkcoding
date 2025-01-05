<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $kategori = Category::all();
        return view('dashboard.kelolakategori', compact('kategori'));
    }

    public function create(){
        return view('crudcategory.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dibuat!');
    }

    public function destroy($id) {
        $kategori = Category::findOrFail($id);

        $kategori->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus!');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('crudcategory.update', compact('category'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $post = Category::findOrFail($id);

        $post->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui!');
    }
}
