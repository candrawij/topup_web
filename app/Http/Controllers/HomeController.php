<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 12 produk terbaru dari database
        $products = Product::latest()->take(12)->get();

        // Kirim ke view 'home'
        return view('home', compact('products'));
    }
}
