<?php

use Livewire\Volt\Volt;
use App\Http\Controllers\homepageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductsController;

// use Livewire\Volt\Volt;

Route::get('/', [homepageController::class, 'index'])->name('home');
Route::get('products', [homepageController::class, 'products']);
Route::get('/products/{slug}', [homepageController::class, 'products']);
Route::get('categories', [homepageController::class, 'categories']);
Route::get('/category/{slug}', [homepageController::class, 'category']);
Route::get('cart', [homepageController::class, 'cart']);
Route::get('checkout', [homepageController::class, 'checkout']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group(['prefix'=>'dashboard'], function () {
    Route::resource('categories', ProductCategoryController::class);
    Route::resource('products', ProductsController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance','settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
