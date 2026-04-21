<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


use App\Http\Controllers\LaptopController7;

Route::get('/home', [LaptopController7::class, 'index'])->name('home');

// lọc theo hãng
Route::get('/brand/{id}', [LaptopController7::class, 'filterByBrand'])->name('brand');
require __DIR__.'/auth.php';
