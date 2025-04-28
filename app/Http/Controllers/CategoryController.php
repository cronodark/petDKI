<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        return view('dashboard.warehouse.category.main', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.warehouse.category.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($validated);

        return redirect()->route('warehouse.categories.index')
            ->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('dashboard.warehouse.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,'.$category->id,
        ]);

        $category->update($validated);

        return redirect()->route('warehouse.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('warehouse.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}