@extends('layouts.store')

@section('styles')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Paytone+One&display=swap"
        rel="stylesheet" />
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css" />
    <style>
        body {
            font-family: "Montserrat", sans-serif;
        }

        input:focus {
            outline: none;
        }
    </style>
@endsection

@section('content')
    <section class="flex-1 p-10 max-md:p-5">
        <!-- Title & Actions -->
        <div class="flex justify-between items-center mb-8 flex-wrap gap-4">
            <h1 class="text-4xl font-bold text-blue-950">Supplier</h1>
            <div class="flex gap-4">
                <button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100">
                    <i class="ti ti-filter text-xl text-slate-600"></i>
                    <span class="text-slate-600 font-semibold">Filter</span>
                </button>
                <a href="{{ route('warehouse.suppliers.create') }}" class="button flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-600 text-white">
                    <i class="ti ti-plus text-xl"></i>
                    <span class="font-semibold">Tambah Supplier</span>
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="rounded-2xl bg-slate-100 overflow-auto">
            <div
                class="p-4 bg-slate-600 rounded-t-2xl min-w-[640px] grid grid-cols-4 gap-6 text-center text-amber-200 font-semibold text-xl">
                <div>Nama supplier</div>
                <div>Nomor HP</div>
                <div>Alamat</div>
                <div>Aksi</div>
            </div>
            <div id="supplierTableBody" class="p-6 min-w-[640px]">
                @foreach ($suppliers as $supplier)
                    <div
                        class="grid grid-cols-4 gap-6 py-4 border-b border-slate-300 text-center text-slate-800 supplier-row">
                        <div>{{ $supplier->name }}</div>
                        <div>{{ $supplier->phone }}</div>
                        <div>{{ $supplier->address }}</div>
                        <div class="flex justify-center gap-2 mt-3 mb-3">
                            <a href="{{ route('warehouse.suppliers.edit', $supplier->id) }}" class="button"><span
                                    class="border-3 py-3 px-7 border-[#37496A] rounded-md">Edit</span></a>
                            <form action="{{ route('warehouse.suppliers.destroy', $supplier->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button cursor-pointer">
                                    <span class="border-3 py-3 px-7 bg-[#FF0000] text-[#FFFFFF] rounded-md">Delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Add more rows here -->
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        @if ($suppliers->hasPages())
            <nav class="flex justify-between items-center text-lg mt-8 text-slate-600 mx-7">
                {{-- Previous Page Link --}}
                @if ($suppliers->onFirstPage())
                    <button class="flex items-center gap-2 opacity-50 cursor-not-allowed" disabled>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f9eeb852c9228af465aad9202d63771acf8cbcb06142bf0338c68c844ecb442"
                            class="w-3" />
                        Previous
                    </button>
                @else
                    <a href="{{ $suppliers->previousPageUrl() }}" class="flex items-center gap-2 btn-hover">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f9eeb852c9228af465aad9202d63771acf8cbcb06142bf0338c68c844ecb442"
                            class="w-3" />
                        Previous
                    </a>
                @endif

                {{-- Page Numbers --}}
                <div class="flex gap-3 items-center">
                    @for ($i = 1; $i <= $suppliers->lastPage(); $i++)
                        @if ($i == $suppliers->currentPage())
                            <span class="bg-slate-600 text-white px-3 py-1 rounded">{{ $i }}</span>
                        @else
                            <a href="{{ $suppliers->url($i) }}" class="btn-hover">{{ $i }}</a>
                        @endif
                    @endfor
                </div>

                {{-- Next Page Link --}}
                @if ($suppliers->hasMorePages())
                    <a href="{{ $suppliers->nextPageUrl() }}" class="flex items-center gap-2 btn-hover">
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
    </section>
@endsection

@section('script')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ["Montserrat", "sans-serif"],
                        paytone: ['"Paytone One"', "sans-serif"],
                    },
                },
            },
        };
    </script>
    <script>
        // Get DOM elements
        const searchInput = document.getElementById("searchInput");
        const supplierRows = document.querySelectorAll(".supplier-row");

        // Add event listener for search input
        searchInput.addEventListener("input", filterSuppliers);

        // Function to filter suppliers based on search input
        function filterSuppliers() {
            const searchTerm = searchInput.value.toLowerCase().trim();

            // If search term is empty, show all rows
            if (searchTerm === "") {
                supplierRows.forEach((row) => {
                    row.style.display = "";
                });
                return;
            }

            // Loop through each supplier row
            supplierRows.forEach((row) => {
                const rowText = row.textContent.toLowerCase();

                // Check if row contains the search term
                if (rowText.includes(searchTerm)) {
                    row.style.display = ""; // Show the row
                } else {
                    row.style.display = "none"; // Hide the row
                }
            });

            // Display message if no results found
            const visibleRows = document.querySelectorAll(
                '.supplier-row:not([style*="display: none"])',
            );
            const tableBody = document.getElementById("supplierTableBody");

            // Remove existing "no results" message if it exists
            const existingMessage = document.getElementById("noResultsMessage");
            if (existingMessage) {
                existingMessage.remove();
            }

            // Add "no results" message if needed
            if (visibleRows.length === 0) {
                const noResultsMessage = document.createElement("div");
                noResultsMessage.id = "noResultsMessage";
                noResultsMessage.className = "py-8 text-center text-slate-600 text-xl";
                noResultsMessage.textContent =
                    "No suppliers found matching your search.";
                tableBody.appendChild(noResultsMessage);
            }
        }
    </script>
@endsection
