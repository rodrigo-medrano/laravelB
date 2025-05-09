<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pruebas', function () {
    return view('pruebas.index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('products',ProductController::class)->middleware('auth');
Route::get('products/report/pdf',[ProductController::class,'pdf'])->name('products.pdf')->middleware('auth');
Route::get('products/report/excel',[ProductController::class,'excel'])->name('products.excel')->middleware('auth');
Route::resource('categories',CategoryController::class)->middleware('auth');
require __DIR__.'/auth.php';
