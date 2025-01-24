<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register as AuthRegister;
use App\Livewire\LandingPage;
use App\Livewire\Pages\ProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', Login::class)->name('login');
Route::get('/register', AuthRegister::class)->name('register');
Route::post('/logout', function () {
    if (Auth::user()) {
        Auth::logout();
    }
    return redirect()->route('landing');
})->name('logout');

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/product', function () {
    return view('pages.products');
})->name('product');

Route::get('/product/{slug}', [ProductDetailController::class, 'index'])->name('product.detail');


Route::middleware(['auth'])->group(function () {
    Route::get('/cart', function () {
        return view('pages.cart');
    })->name('cart');

    Route::get('/order', function () {
        return view('pages.order');
    })->name('order');

    Route::get('/order/{ticket}', [OrderDetailController::class, 'index'])->name('order.detail');
});
