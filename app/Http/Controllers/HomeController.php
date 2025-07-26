<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database urut bedasarkan nama
        $products = Product::orderBy('name', 'ASC')->get(); // Urutkan A-Z
        return view('home', compact('products'));
    }
}
