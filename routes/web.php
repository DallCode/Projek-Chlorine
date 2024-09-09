<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
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

// Menampilkan form edit kategori
Route::get('category/{category}/edit', [App\Http\Controllers\AddCategoryController::class, 'edit'])->name('category.edit');

// Memperbarui kategori yang ada
Route::put('category/{category}', [App\Http\Controllers\AddCategoryController::class, 'update'])->name('category.update');

// Menghapus kategori
Route::delete('category/{category}', [App\Http\Controllers\AddCategoryController::class, 'destroy'])->name('category.destroy');

