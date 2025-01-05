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
}
