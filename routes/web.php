<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Route for Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Route for Add Category
Route::get('/addcategory', [App\Http\Controllers\AddCategoryController::class, 'index'])->name('addcategory');
