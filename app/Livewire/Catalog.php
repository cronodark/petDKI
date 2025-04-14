<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Catalog extends Component
{
    public $categories;
    public $products;
    public $selectedCategory = 'all';
    public $searchTerm = '';

    public function mount()
    {
        // Load categories and products when the component is mounted.
        $this->categories = Category::all();
        $this->products = Product::all();
    }

    // This method will update products based on filter criteria.
    public function updatedSelectedCategory()
    {
        $this->filterProducts();
    }

    public function updatedSearchTerm()
    {
        $this->filterProducts();
    }

    public function filterProducts()
    {
        $query = Product::query();

        if ($this->selectedCategory !== 'all') {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->searchTerm) {
            $query->where('product_name', 'like', '%' . $this->searchTerm . '%');
        }

        $this->products = $query->get();
    }

    public function render()
    {
        return view('livewire.catalog');
    }
}
