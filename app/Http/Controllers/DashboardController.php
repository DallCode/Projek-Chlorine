<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('dashboard', compact('categories'));
    }
}
