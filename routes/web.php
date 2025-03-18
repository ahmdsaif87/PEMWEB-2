<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/home', function(){
    return "Ini adalah halaman home";
});
Route::get('/flash-sale', function(){
    return "Ini adalah halaman Flash Sale";
});
Route::get('/category', function(){
    return 'Ini adalah halaman category product';
});
Route::get('/cart', function(){
    return 'Ini adalah halaman cart';
});
Route::get('/checkout', function(){
    return 'Ini adalah halaman checkout';
});
Route::get('/payment', function(){
    return 'Ini adalah halaman payment';
});
Route::get('/account', function(){
    return 'ini adalah halaman pengaturan akun';
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
