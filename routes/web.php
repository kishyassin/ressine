<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/details/{id}', [DetailsController::class, 'details'])->name('details');
Route::get('/dashboard ', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/rate', [RatingController::class, 'store'])->name('rating.store');
});
Route::get('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');

require __DIR__ . '/auth.php';
