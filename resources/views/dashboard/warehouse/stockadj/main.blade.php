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

        .btn-hover {
            transition: all 0.2s ease-in-out;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .badge-addition {
            background-color: #10B981;
            color: white;
            padding: 2px 8px;
            border-radius: 9999px;
            font-size: 0.875rem;
        }

        .badge-subtraction {
            background-color: #EF4444;
            color: white;
            padding: 2px 8px;
            border-radius: 9999px;
            font-size: 0.875rem;
        }

        /* Table specific styling */
        .stock-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 1.125rem;
        }

        .stock-table th {
            padding: 1.75rem 0;
            color: #fde68a; /* amber-200 */
            font-weight: bold;
            text-align: left;
        }

        .stock-table th:first-child {
            padding-left: 2rem;
        }

        .stock-table th:last-child {
            padding-right: 2rem;
        }

        .stock-table thead {
            background-color: #475569; /* slate-600 */
            border-radius: 1rem;
        }

        .stock-table thead tr {
            border-radius: 1rem;
        }

        .stock-table thead tr th:first-child {
            border-top-left-radius: 1rem;
            border-bottom-left-radius: 1rem;
        }

        .stock-table thead tr th:last-child {
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
        }

        .stock-table tbody tr {
            transition: all 0.2s ease-in-out;
        }

        .stock-table tbody tr:hover {
            background-color: rgba(241, 245, 249, 0.5);
        }

        .stock-table td {
            padding: 1.25rem 0;
            color: #475569; /* slate-600 */
        }

        .stock-table td:first-child {
            padding-left: 2rem;
        }

        .stock-table td:last-child {
            padding-right: 2rem;
        }

        .stock-table .action-cell {
            text-align: center;
        }

        .stock-table .center-cell {
            text-align: center;
        }
    </style>
    @livewireStyles
@endsection

@include('layouts.app')
@section('content')
    <section class="py-2 ml-5 max-md:ml-0 max-md:w-full">
        <div class="w-full font-medium max-md:max-w-full">
            @include('partials.flash-messages')

            <div class="flex flex-wrap gap-5 justify-between w-full font-bold max-md:max-w-full">
                <h2 class="my-auto text-4xl text-blue-950">Penyesuaian Stok</h2>
                <div class="flex gap-8 text-xl max-md:max-w-full">
                    <a href="{{ route('warehouse.stockadj.create') }}"
                        class="flex gap-4 px-6 py-3 text-white rounded-2xl bg-slate-600 max-md:px-5 transition-all hover:brightness-110">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/047a16e4226a215254279b8d74a91fce1448fade?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                            alt="Add icon" class="object-contain shrink-0 w-6 aspect-square">
                        <span class="basis-auto">Tambah Penyesuaian</span>
                    </a>
                </div>
            </div>
            <div class="flex flex-col pb-8 mt-10 w-full text-xl rounded-2xl bg-slate-100 max-md:max-w-full overflow-x-auto">
                <table class="stock-table gap-2">
                    <thead class="items-center">
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 25%;" class="flex items-center gap-2">
                                <span>Produk</span>
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bfc8ac303e495365091f5c7686d5c013283816d4?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                                    alt="Sort icon" class="w-[7px] mt-1">
                            </th>
                            <th style="width: 15%;" class="center-cell">Tipe</th>
                            <th style="width: 10%;" class="center-cell">Jumlah</th>
                            <th style="width: 20%;">Alasan</th>
                            <th style="width: 10%;">Tanggal</th>
                            <th style="width: 25%;" class="center-cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stockAdjustments as $adjustment)
                            <tr>
                                <td>{{ $adjustment->id }}</td>
                                <td>
                                    <a href="{{ route('products.index', $adjustment->product_id) }}" 
                                        class="text-blue-600 hover:underline">
                                        {{ $adjustment->product->product_name ?? 'Unknown Product' }}
                                    </a>
                                </td>
                                <td class="center-cell">
                                    @if($adjustment->adjustment_type == 'in')
                                        <span class="badge-addition">Penambahan</span>
                                    @else
                                        <span class="badge-subtraction">Pengurangan</span>
                                    @endif
                                </td>
                                <td class="center-cell">{{ $adjustment->quantity }}</td>
                                <td>{{ $adjustment->reason }}</td>
                                <td>{{ $adjustment->created_at->format('d/m/Y') }}</td>
                                <td class="action-cell">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('warehouse.stockadj.edit', $adjustment->id) }}"
                                            class="px-4 py-1 rounded-xl border-2 border-slate-600 text-slate-600 transition-all hover:brightness-110">
                                            Edit
                                        </a>
                                        <form action="{{ route('warehouse.stockadj.destroy', $adjustment->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="px-4 py-1 text-white bg-red-600 rounded-xl transition-all hover:brightness-110 delete-button"
                                                data-id="{{ $adjustment->id }}">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr class="mt-5 border border-gray-300 w-full max-w-full" />
                <div class="mt-3 mr-7 ml-7 max-md:mr-2.5">
                    @if ($stockAdjustments->hasPages())
                        <nav class="flex flex-wrap gap-5 justify-between items-start mt-9 mr-7 ml-7 text-xl font-medium whitespace-nowrap text-slate-600 max-md:mr-2.5 max-md:max-w-full fade-in"
                            aria-label="Pagination" style="animation-delay: 0.6s">

                            <!-- Previous Page -->
                            @if ($stockAdjustments->onFirstPage())
                                <span class="flex gap-3 items-center cursor-not-allowed text-gray-400">
                                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                                        alt="Prev" class="object-contain w-3 aspect-[0.55]" />
                                    <span>Previous</span>
                                </span>
                            @else
                                <a href="{{ $stockAdjustments->previousPageUrl() }}" class="flex gap-3 items-center btn-hover">
                                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                                        alt="Prev" class="object-contain w-3 aspect-[0.55]" />
                                    <span>Previous</span>
                                </a>
                            @endif

                            <!-- Page Numbers -->
                            <div class="flex gap-5 items-center self-stretch">
                                @foreach ($stockAdjustments->getUrlRange(1, $stockAdjustments->lastPage()) as $page => $url)
                                    @if ($page == $stockAdjustments->currentPage())
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

                            <!-- Next Page -->
                            @if ($stockAdjustments->hasMorePages())
                                <a href="{{ $stockAdjustments->nextPageUrl() }}" class="flex gap-3.5 items-center btn-hover">
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
        </div>
    </section>

    <!-- Delete Confirmation Modal -->
    @include('partials.confirmation')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                const adjustmentId = $(this).data('id');
                showConfirmationModal(
                    'Hapus Penyesuaian Stok',
                    `Apakah kamu yakin akan menghapus penyesuaian stok dengan ID: ${adjustmentId}?`,
                    () => {
                        $(this).closest('form').submit();
                    }
                );
            });
        });
    </script>
@endsection