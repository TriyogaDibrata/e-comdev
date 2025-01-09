<?php

use App\Http\Controllers\LandingController;
use App\Livewire\LandingPage;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/catalog', function () {
    return view('pages.catalogue');
})->name('catalogue');

Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');
