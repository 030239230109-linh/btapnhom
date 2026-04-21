<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController2;

use App\Http\Controllers\HomeController2;
use App\Http\Controllers\HomeController3;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';


Route::get('/laptop', [HomeController2::class, 'laptop']);
Route::get('/laptop/theloai/{id}', [HomeController2::class, 'theloai']);
Route::get('/laptop/loc', [HomeController2::class, 'loc']);

Route::get('/laptop/chitiet/{id}', [HomeController3::class, 'chitiet'])->name('laptop.chitiet');

