<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

// Data produk contoh (bisa diganti dengan data dari database)
$products = [
    [
        'name' => 'Kursi Kayu',
        'description' => 'Kursi kayu jati berkualitas.',
        'price' => 350000,
        'image' => 'https://via.placeholder.com/300x200?text=Kursi+Kayu'
    ],
    [
        'name' => 'Meja Makan',
        'description' => 'Meja makan minimalis modern.',
        'price' => 1200000,
        'image' => 'https://via.placeholder.com/300x200?text=Meja+Makan'
    ],
    [
        'name' => 'Soffa Elegan',
        'description' => 'Soffa empuk dan elegan.',
        'price' => 2500000,
        'image' => 'https://via.placeholder.com/300x200?text=Soffa'
    ],
];

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    return Inertia::render('Home');
})->name('home');

Route::middleware('auth')->group(function () {
    // Checkout harus di atas agar tidak tertimpa route lain
    Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{cart}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
    Route::get('/orders/latest', [App\Http\Controllers\OrderController::class, 'latest'])->name('orders.latest');
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');
    Route::get('/dashboard/pembeli', function () {
        return view('dashboard.pembeli');
    })->name('dashboard.pembeli');
    Route::get('/products', function () {
        $products = \App\Models\Product::all();
        return view('products.index', compact('products'));
    })->name('products.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::view('/about', 'about')->name('about');

require __DIR__.'/auth.php';
