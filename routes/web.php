<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\AuthController;

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/dashboard');
    // return view('dashboard');
});

// Route for Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Route for Add Category

// Menampilkan daftar kategori
Route::get('category', [App\Http\Controllers\AddCategoryController::class, 'index'])->name('category.index');

// Menampilkan form create kategori
Route::get('category/create', [App\Http\Controllers\AddCategoryController::class, 'create'])->name('category.create');

// Menyimpan kategori baru
Route::post('category', [App\Http\Controllers\AddCategoryController::class, 'store'])->name('category.store');


Route::get('category/{id}/edit', [App\Http\Controllers\DashboardController::class, 'edit'])->name('categories.edit')->middleware('auth');
Route::put('category/{id}', [App\Http\Controllers\DashboardController::class, 'update'])->name('categories.update')->middleware('auth');

Route::delete('/category/{id}', [App\Http\Controllers\DashboardController::class, 'destroy'])->name('category.destroy');

