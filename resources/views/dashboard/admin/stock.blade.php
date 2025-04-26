@extends('layouts.store')

@section('styles')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Paytone+One&display=swap");

        .font-paytone {
            font-family: "Paytone One", -apple-system, Roboto, Helvetica, sans-serif;
        }

        .nav-link {
            transition: all 0.2s ease-in-out;
        }

        .nav-link:hover {
            transform: translateX(5px);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .search-input {
            transition: all 0.2s ease-in-out;
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(55, 73, 106, 0.2);
        }

        .table-row {
            transition: all 0.2s ease-in-out;
        }

        .table-row:hover {
            background-color: rgba(241, 245, 249, 0.5);
        }

        .btn-hover {
            transition: all 0.2s ease-in-out;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <main class="w-full">
        <div class="flex flex-col gap-6 mx-5">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-blue-950">Product</h2>
                <div class="flex gap-2">
                    <button class="btn-hover bg-slate-100 px-4 py-2 rounded-xl flex items-center gap-2 text-slate-600">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5fceb2b38570db72ffd3900e2dcc53fdd3b9d6da59bad07f63c84cc6caa5a517"
                            class="w-5" />
                        <span>Filter</span>
                    </button>
                    <button class="btn-hover bg-slate-100 px-4 py-2 rounded-xl flex items-center gap-2 text-slate-600">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5fceb2b38570db72ffd3900e2dcc53fdd3b9d6da59bad07f63c84cc6caa5a517"
                            class="w-5" />
                        <span>Export</span>
                    </button>
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
            @if ($products->hasPages())
                <nav class="flex justify-between items-center text-lg mt-8 text-slate-600 mx-7">
                    {{-- Previous Page Link --}}
                    @if ($products->onFirstPage())
                        <button class="flex items-center gap-2 opacity-50 cursor-not-allowed" disabled>
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f9eeb852c9228af465aad9202d63771acf8cbcb06142bf0338c68c844ecb442"
                                class="w-3" />
                            Previous
                        </button>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="flex items-center gap-2 btn-hover">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f9eeb852c9228af465aad9202d63771acf8cbcb06142bf0338c68c844ecb442"
                                class="w-3" />
                            Previous
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    <div class="flex gap-3 items-center">
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            @if ($i == $products->currentPage())
                                <span class="bg-slate-600 text-white px-3 py-1 rounded">{{ $i }}</span>
                            @else
                                <a href="{{ $products->url($i) }}" class="btn-hover">{{ $i }}</a>
                            @endif
                        @endfor
                    </div>

                    {{-- Next Page Link --}}
                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="flex items-center gap-2 btn-hover">
                            Next
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/856aa508a88fbfce4ee4850206428da9a4a53d1bdfce483454f6838c42d9bcbb"
                                class="w-3" />
                        </a>
                    @else
                        <button class="flex items-center gap-2 opacity-50 cursor-not-allowed" disabled>
                            Next
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/856aa508a88fbfce4ee4850206428da9a4a53d1bdfce483454f6838c42d9bcbb"
                                class="w-3" />
                        </button>
                    @endif
                </nav>
            @endif
        </div>
    </main>
@endsection
