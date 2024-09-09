<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest; // Import form request untuk validasi
use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('category.create'); // Pastikan nama view sesuai
    }

    // Menyimpan kategori baru ke database
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    // Menampilkan form untuk mengedit kategori yang sudah ada
    public function edit(Category $category)
    {
        return view('category.edit', compact('category')); // Pastikan nama view sesuai
    }

    // Memperbarui kategori yang sudah ada di database
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    // Menghapus kategori dari database
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }

    // Menampilkan daftar kategori (misalnya untuk tampilan indeks)
    public function index()
    {
          // Mengambil semua kategori dan mengurutkannya berdasarkan created_at secara menurun
        $categories = Category::orderBy('updated_at', 'asc')->get();
        return view('AddCategory', compact('categories')); // Pastikan nama view sesuai
    }
}
