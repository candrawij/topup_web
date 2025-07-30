<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    $products = Product::all();
    return view('home', compact('products'));
})->name('home');

Route::get('/order/{product_slug}', [ProductController::class, 'showOrderPage'])->name('order.show');
// Route untuk checkout
Route::post('/order/process', [OrderController::class, 'store'])->name('order.process');

// Route untuk handle notifikasi Midtrans
Route::post('/payment/notification', [OrderController::class, 'handleNotification']);


Route::view('/history', 'history')->name('history');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
