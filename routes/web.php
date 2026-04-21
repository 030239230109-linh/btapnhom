<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController5;


Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Câu 5: Tìm kiếm laptop
Route::get('timkiem', [HomeController5::class, 'search'])->name('laptop.search');

require __DIR__.'/auth.php';
