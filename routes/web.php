<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    $products = Product::all();
    return view('home', compact('products'));
})->name('home');

Route::view('/history', 'history')->name('history');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Transaction
    Route::get('/topup', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/topup', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
});

Route::get('/pricelist', [ProductController::class, 'index'])->name('pricelist');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::view('/page/about', 'about')->name('about');
Route::view('/api-docs', 'api-docs');
Route::view('/tools', 'tools');
Route::view('/member', 'member');

Route::get('/trx/{id}', function ($id) {
    return view('invoice', ['id' => $id]);
});

require __DIR__.'/auth.php';
