<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * liat daftar kategori
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * form buat kategori baru
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * simpen kategori baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'kategori berhasil dibuat.');
    }

    /**
     * liat detail kategori
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * form edit kategori
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * update kategori di database
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,'.$category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'kategori berhasil diperbarui');
    }

    /**
     * hapus kategori dari database
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'kategori berhasil dihapus');
    }
}