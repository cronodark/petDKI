<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $sortField = 'product_name'; // default sort
    public $sortDirection = 'asc';      // ascending atau descending

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // kalau klik kolom yang sama, toggle arah sort
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $products = Product::with('category')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5);
        return view('livewire.product-list', compact('products'));
    }
}
