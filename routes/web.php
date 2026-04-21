<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController5;

use App\Http\Controllers\HomeController2;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\LaptopController7;

//Câu 5: Tìm kiếm laptop
Route::get('timkiem', [HomeController5::class, 'search'])->name('laptop.search');

Route::get('/home', [LaptopController7::class, 'index'])->name('home');

// lọc theo hãng
Route::get('/brand/{id}', [LaptopController7::class, 'filterByBrand'])->name('brand');
require __DIR__.'/auth.php';

Route::get('/laptop', [HomeController2::class, 'laptop']);
Route::get('/laptop/theloai/{id}', [HomeController2::class, 'theloai']);
Route::get('/laptop/loc', [HomeController2::class, 'loc']);