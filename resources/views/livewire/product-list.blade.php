    <div class="w-full font-medium max-md:max-w-full">
        <div class="flex flex-wrap gap-5 justify-between w-full font-bold max-md:max-w-full">
            <h2 class="my-auto text-4xl text-blue-950">Product</h2>
            <div class="flex gap-2">
                @if (auth()->user()->role === 'warehouse')
                    <a href="{{ route('warehouse.products.create') }}"
                        class="btn-hover bg-slate-600 text-white px-4 py-3 rounded-xl flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>Tambah</span>
                    </a>
                @endif

                <div class="relative inline-block text-left">
                    <button id="filterButton" type="button"
                        class="btn-hover bg-slate-100 px-4 py-4 rounded-xl flex items-center gap-2 text-slate-600"
                        onclick="toggleFilterDropdown()">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5fceb2b38570db72ffd3900e2dcc53fdd3b9d6da59bad07f63c84cc6caa5a517"
                            class="w-5" />
                        <span>Sortir</span>
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
                        class="btn-hover bg-slate-100 px-4 py-4 rounded-xl flex items-center gap-2 text-slate-600"
                        onclick="toggleExportDropdown()">
                        <svg width="24" height="24" viewBox="0 0 33 37" fill="none"
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

        <div class="flex flex-col my-5 w-full text-xl rounded-2xl bg-slate-100 max-md:max-w-full overflow-auto">
            <table class="min-w-[800px] w-full gap-2 border-collapse" id="sortable-product">
                <thead>
                    <tr class="bg-slate-600 text-center text-[#FADE73]">
                        <th class="px-4 py-3 cursor-pointer">Foto</th>
                        <th class="px-4 py-3 cursor-pointer">SKU</th>
                        <th class="px-4 py-3 cursor-pointer ">Nama Produk</th>
                        <th class="px-4 py-3 cursor-pointer w-100">Deskripsi</th>
                        <th class="px-4 py-3 cursor-pointer">Kategori</th>
                        <th class="px-4 py-3 cursor-pointer">Stok</th>
                        <th class="px-4 py-3 cursor-pointer">Harga</th>
                        @if (auth()->user()->role === 'warehouse')
                            <th class="px-4 py-3">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white text-slate-600">
                    @foreach ($products as $product)
                        <tr class="border-b">
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Image"
                                    class="w-16 h-16 object-cover rounded-lg">
                            </td>
                            <td class="px-4 py-3">{{ $product->sku }}</td>
                            <td class="px-4 py-3 text-left w-40">{{ $product->product_name }}</td>
                            <td class="px-4 py-3">{{ $product->description }}</td>
                            <td class="px-4 py-3">{{ $product->category->category_name ?? '-' }}</td>
                            <td class="px-4 py-3">
                                @if ($product->stock > 0)
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                        {{ $product->stock }}
                                    </span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                        Kosong
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            @if (auth()->user()->role === 'warehouse')
                                <td class="px-4 py-3">
                                    <div class="flex justify-center gap-2 whitespace-nowrap">
                                        <a href="{{ route('warehouse.products.edit', $product->id) }}"
                                            class="px-4 py-2 rounded-xl border-2 border-slate-600 text-slate-600 transition-all hover:brightness-110">
                                            Edit
                                        </a>
                                        <form action="{{ route('warehouse.products.destroy', $product->id) }}"
                                            method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="px-4 py-2 text-white bg-red-600 rounded-xl transition-all hover:brightness-110 delete-button"
                                                data-id="{{ $product->product_name }}">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="mt-3 mr-7 ml-7 max-md:mr-2.5">
            @if ($products->hasPages())
                <nav class="flex flex-wrap gap-5 justify-between items-start mt-9 mr-7 ml-7 text-xl font-medium whitespace-nowrap text-slate-600 max-md:mr-2.5 max-md:max-w-full fade-in"
                    aria-label="Pagination" style="animation-delay: 0.6s">

                    {{-- Previous --}}
                    @if ($products->onFirstPage())
                        <span class="flex gap-3 items-center cursor-not-allowed text-gray-400">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                                alt="Prev" class="object-contain w-3 aspect-[0.55]" />
                            <span>Previous</span>
                        </span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="flex gap-3 items-center btn-hover">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                                alt="Prev" class="object-contain w-3 aspect-[0.55]" />
                            <span>Previous</span>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    <div class="flex gap-5 items-center self-stretch">
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <span
                                    class="self-stretch px-3 py-1 text-white rounded-md bg-slate-600 text-center pulse-effect"
                                    aria-current="page">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="btn-hover"
                                    aria-label="Go to page {{ $page }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    {{-- Next --}}
                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="flex gap-3.5 items-center btn-hover">
                            <span>Next</span>
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d15578e15c255f9ec78c7db8e35631674a3faa8b"
                                alt="Next" class="object-contain w-3 aspect-[0.55]" />
                        </a>
                    @else
                        <span class="flex gap-3 items-center cursor-not-allowed text-gray-400">
                            <span>Next</span>
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d15578e15c255f9ec78c7db8e35631674a3faa8b"
                                alt="Next" class="object-contain w-3 aspect-[0.55]" />
                        </span>
                    @endif
                </nav>
            @endif
        </div>
    </div>


    {{-- Tablesort JS --}}
    <script src="https://unpkg.com/tablesort@5.2.1/dist/tablesort.min.js"></script>
    <script>
        new Tablesort(document.getElementById('sortable-product'));

        // Toggle filter dropdown
        function toggleFilterDropdown() {
            document.getElementById('filterDropdown').classList.toggle('hidden');
        }

        // Toggle export dropdown
        function toggleExportDropdown() {
            document.getElementById('exportDropdown').classList.toggle('hidden');
        }

        // Close dropdowns when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.closest('#filterButton') && !e.target.closest('#filterDropdown')) {
                document.getElementById('filterDropdown').classList.add('hidden');
            }
            if (!e.target.closest('#exportButton') && !e.target.closest('#exportDropdown')) {
                document.getElementById('exportDropdown').classList.add('hidden');
            }
        });
    </script>
