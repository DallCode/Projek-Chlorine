<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest; // Import form request untuk validasi

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('dashboard', compact('categories'));
    }



public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('dashboard', compact('category'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'is_publish' => 'required|in:published,not published',
    ]);

    $category = Category::findOrFail($id);
    $category->name = $validatedData['name'];
    $category->is_publish = $validatedData['is_publish'];
    $category->save();

    return redirect()->route('dashboard')->with('success', 'Kategori berhasil diperbarui!');
}

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard')->with('success', 'Category deleted successfully.');
    }
}
