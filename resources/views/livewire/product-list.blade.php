<div class="flex flex-col gap-6 mx-5">
    <div class="flex justify-between items-center">
        <h2 class="text-3xl font-bold text-blue-950">Product</h2>
        <div class="flex gap-2">
            <div class="relative inline-block text-left">
                <button id="filterButton" type="button"
                    class="btn-hover bg-slate-100 px-4 py-4 rounded-xl flex items-center gap-2 text-slate-600"
                    onclick="toggleFilterDropdown()">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5fceb2b38570db72ffd3900e2dcc53fdd3b9d6da59bad07f63c84cc6caa5a517"
                        class="w-5" />
                    <span>Filter</span>
                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="filterDropdown"
                    class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-10">
                    <button wire:click="sortBy('product_name')"
                        class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">
                        Sortir Nama
                    </button>
                    <button wire:click="sortBy('category_id')"
                        class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">
                        Sortir Kategori
                    </button>
                    <button wire:click="sortBy('price')"
                        class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">
                        Harga Terendah
                    </button>
                </div>
            </div>

            <div class="relative inline-block text-left">
                <button id="exportButton" type="button"
                    class="btn-hover bg-slate-100 px-4 py-2 rounded-xl flex items-center gap-2 text-slate-600"
                    onclick="toggleExportDropdown()">
                    <svg width="33" height="37" viewBox="0 0 33 37" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-5">
                        <path
                            d="M14.7084 25.6663H18.2917V9.54134H23.6667L16.5 0.583008L9.33337 9.54134H14.7084V25.6663Z"
                            fill="#37496A" />
                        <path
                            d="M3.95833 36.4167H29.0417C31.0179 36.4167 32.625 34.8095 32.625 32.8333V16.7083C32.625 14.7321 31.0179 13.125 29.0417 13.125H21.875V16.7083H29.0417V32.8333H3.95833V16.7083H11.125V13.125H3.95833C1.98212 13.125 0.375 14.7321 0.375 16.7083V32.8333C0.375 34.8095 1.98212 36.4167 3.95833 36.4167Z"
                            fill="#37496A" />
                    </svg>
                    <span>Export</span>
                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="exportDropdown"
                    class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-10">
                    <a href="{{ route('products.export.pdf') }}"
                        class="block px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">Export
                        PDF</a>
                    <a href="{{ route('products.export.excel') }}"
                        class="block px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">Export
                        Excel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <section class="bg-slate-100 rounded-2xl w-full overflow-auto">
        <div class="bg-slate-600 text-white px-4 py-3 rounded-t-xl text-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">SKU</th>
                        <th class="px-4 py-2">Product Name</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Price</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600 bg-white">
                    @foreach ($products as $product)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ab02fa0d485e0052a3178022cdfc72b9e1f61ca03348749d87918bd12a88778"
                                    class="rounded-full w-20 h-20 object-cover" />
                            </td>
                            <td class="px-4 py-2">{{ $product->sku }}</td>
                            <td class="px-4 py-2">{{ $product->product_name }}</td>
                            <td class="px-4 py-2">{{ $product->category->category_name }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Pagination -->
    {{ $products->links('vendor.pagination.tailwind') }}

</div>
