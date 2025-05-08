<div>
    <!-- Transaction Section Header -->
    <section
        class="flex flex-wrap gap-5 justify-between w-full font-bold whitespace-nowrap max-md:mt-10 max-md:mr-2.5 max-md:max-w-full fade-in"
        style="animation-delay: 0.4s">
        <h2 class="my-auto text-4xl text-blue-950 mb-5">Transaction</h2>

        <!-- Action Buttons -->
        <div class="flex gap-8 text-xl text-slate-600">
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
                    <button wire:click="sortBy('transaction_date')"
                        class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">
                        Tanggal
                    </button>
                    <button wire:click="sortBy('total_price')"
                        class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">
                        Total
                    </button>
                    @if (Auth::user()->role == 'manager')
                        <button wire:click="sortBy('user_id')"
                            class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">
                            Kasir
                        </button>
                    @endif
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
                    <a href="{{ route('transactions.export.pdf') }}"
                        class="block px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">Export PDF</a>
                    <a href="{{ route('transactions.export.excel') }}"
                        class="block px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800">Export Excel</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Transaction Table -->
    <section
        class="flex flex-col pb-7 mt-3 w-full text-xl font-medium rounded-2xl bg-[#F1F1F9] text-slate-600 max-md:max-w-full relative"
        aria-label="Transaction list" id="transaction-table">
        <!-- Loading Overlay -->
        <div class="loading-overlay" id="table-loading">
            <div class="spinner"></div>
            <p class="sr-only">Loading transactions...</p>
        </div>

        <!-- Table Header -->
        <div
            class="grid {{ Auth::user()->role === 'manager' ? 'grid-cols-5' : 'grid-cols-4' }} gap-5 px-10 py-6 text-center text-amber-200 bg-slate-600 rounded-t-2xl max-md:px-4">
            <div>ID</div>
            <div>Tanggal</div>
            @if (Auth::user()->role == 'manager')
                <div>Kasir</div>
            @endif
            <div>Total</div>
            <div>Aksi</div>
        </div>


        <!-- Table Rows -->
        <div id="table-rows" class="divide-y divide-slate-300">
            @if ($transactions->isEmpty())
                <div class="flex items-center justify-center h-32">
                    <p class="text-slate-500">Tidak ada transaksi.</p>
                </div>
            @else
                @foreach ($transactions as $transaction)
                    <div class="grid {{ Auth::user()->role === 'manager' ? 'grid-cols-5' : 'grid-cols-4' }} gap-4 items-center px-10 py-5 text-center max-md:px-4">
                        <div>{{ $transaction->id }}</div>
                        <div>{{ $transaction->transaction_date }}</div>
                        @if (Auth::user()->role == 'manager')
                            <div>{{ $transaction->user->name }}</div>
                        @endif
                        <div>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</div>
                        <a href="{{ route('transactions.show', $transaction->id) }}"
                            class="px-5 py-2 rounded-xl border-2 border-slate-600 btn-hover inline-block">
                            Detail
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>


    <!-- Pagination -->
    <!-- Pagination Custom -->
    {{-- @if ($transactions->hasPages())
        <nav class="flex justify-between items-center mt-9 mx-7 text-xl font-medium text-slate-600"
            aria-label="Pagination">
            <!-- Previous Button -->
            @if ($transactions->onFirstPage())
                <span class="flex gap-3 opacity-50 cursor-not-allowed">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                        alt="" class="w-3" />
                    <span>Previous</span>
                </span>
            @else
                <a href="{{ $transactions->previousPageUrl() }}" class="flex gap-3 btn-hover">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                        alt="" class="w-3" />
                    <span>Previous</span>
                </a>
            @endif

            <!-- Page Numbers -->
            <div class="flex gap-5">
                @foreach ($transactions->getUrlRange(1, $transactions->lastPage()) as $page => $url)
                    @if ($page == $transactions->currentPage())
                        <span class="px-3 py-1 text-white rounded-md bg-slate-600">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-1 rounded-md hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach
            </div>

            <!-- Next Button -->
            @if ($transactions->hasMorePages())
                <a href="{{ $transactions->nextPageUrl() }}" class="flex gap-3 btn-hover">
                    <span>Next</span>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d15578e15c255f9ec78c7db8e35631674a3faa8b"
                        alt="" class="w-3" />
                </a>
            @else
                <span class="flex gap-3 opacity-50 cursor-not-allowed">
                    <span>Next</span>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d15578e15c255f9ec78c7db8e35631674a3faa8b"
                        alt="" class="w-3" />
                </span>
            @endif
        </nav>
    @endif --}}
    {{ $transactions->links('vendor.pagination.tailwind') }}

</div>
