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
}
