
<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Câu 5: Tìm kiếm laptop
Route::post('timkiem', [HomeController5::class, 'search'])->name('laptop.search');


Route::get('/', [HomeController2::class, 'laptop']);
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/home', [LaptopController7::class, 'index'])->name('home');


use App\Http\Controllers\SanPhamController1;

Route::get('/san-pham', [SanPhamController1::class, 'index'])->name('sanpham.index7');
Route::get('/san-pham/{id}', [SanPhamController1::class, 'show'])->name('sanpham.show');
Route::delete('/san-pham/{id}', [SanPhamController1::class, 'destroy'])->name('sanpham.destroy');

require __DIR__.'/auth.php';

use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
