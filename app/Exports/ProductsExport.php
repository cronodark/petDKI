<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::with('category')->get()->map(function ($product) {
            return [
                'SKU' => $product->sku,
                'Nama Produk' => $product->product_name,
                'Kategori' => $product->category->category_name ?? '-',
                'Harga' => $product->price,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'SKU',
            'Nama Produk',
            'Kategori',
            'Harga',
        ];
    }
}
