@extends('layouts.store')
@include('layouts.app')
@section('content')
    <section class="py-2 ml-5 max-md:ml-0 max-md:w-full">
        <div class="w-full font-medium max-md:max-w-full">
            @include('partials.flash-messages')

            <div class="flex flex-wrap gap-5 justify-between w-full font-bold max-md:max-w-full">
                <h2 class="my-auto text-4xl text-blue-950">Kategori</h2>
                <div class="flex gap-8 text-xl max-md:max-w-full">
                    <a href="{{ route('warehouse.categories.create') }}"
                        class="flex gap-4 px-6 py-3 text-white rounded-2xl bg-slate-600 max-md:px-5 transition-all hover:brightness-110">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/047a16e4226a215254279b8d74a91fce1448fade?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                            alt="Add icon" class="object-contain shrink-0 w-6 aspect-square">
                        <span class="basis-auto">Tambah Kategori</span>
                    </a>
                </div>
            </div>
            <div class="flex flex-col pb-8 mt-10 w-full text-xl rounded-2xl bg-slate-100 max-md:max-w-full">
                <div
                    class="flex items-center px-20 py-7 w-full text-amber-200 rounded-2xl bg-slate-600 max-md:px-5 max-md:max-w-full">
                    <div class="w-[25%] text-left">ID</div>
                    <div class="w-[45%] text-left flex items-center gap-2">
                        <span>Nama Kategori</span>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bfc8ac303e495365091f5c7686d5c013283816d4?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                            alt="Sort icon" class="w-[7px] mt-1">
                    </div>
                    <div class="w-[30%] text-center">Aksi</div>
                </div>
                @foreach ($categories as $category)
                    <div class="flex items-center px-20 mt-7 w-full max-md:px-5 max-w-full">
                        <div class="w-[25%] text-left text-slate-600">{{ $category->id }}</div>
                        <div class="w-[45%] text-left text-slate-600">{{ $category->category_name }}</div>
                        <div class="w-[30%] flex justify-center gap-4 whitespace-nowrap">
                            <a href="{{ route('warehouse.categories.edit', $category->id) }}"
                                class="px-6 py-2 rounded-xl border-2 border-slate-600 text-slate-600 transition-all hover:brightness-110">
                                Edit
                            </a>
                            <form action="{{ route('warehouse.categories.destroy', $category->id) }}" method="POST"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="px-6 py-2 text-white bg-red-600 rounded-xl transition-all hover:brightness-110 delete-button"
                                    data-id="{{ $category->category_name }}">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <hr class="mt-3 border border-gray-300 w-full max-w-full" />
                <div class="mt-3 mr-7 ml-7 max-md:mr-2.5">
                    @if ($categories->hasPages())
                        <nav class="flex flex-wrap gap-5 justify-between items-start mt-9 mr-7 ml-7 text-xl font-medium whitespace-nowrap text-slate-600 max-md:mr-2.5 max-md:max-w-full fade-in"
                            aria-label="Pagination" style="animation-delay: 0.6s">

                            <!-- Previous Page -->
                            @if ($categories->onFirstPage())
                                <span class="flex gap-3 items-center cursor-not-allowed text-gray-400">
                                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                                        alt="Prev" class="object-contain w-3 aspect-[0.55]" />
                                    <span>Previous</span>
                                </span>
                            @else
                                <a href="{{ $categories->previousPageUrl() }}" class="flex gap-3 items-center btn-hover">
                                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                                        alt="Prev" class="object-contain w-3 aspect-[0.55]" />
                                    <span>Previous</span>
                                </a>
                            @endif

                            <!-- Page Numbers -->
                            <div class="flex gap-5 items-center self-stretch">
                                @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                    @if ($page == $categories->currentPage())
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
                            @if ($categories->hasMorePages())
                                <a href="{{ $categories->nextPageUrl() }}" class="flex gap-3.5 items-center btn-hover">
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
                const categoryId = $(this).data('id');
                showConfirmationModal(
                    'Hapus Kategori',
                    `Apakah kamu yakin akan menghapus kategori dengan nama: ${categoryId}?`,
                    () => {
                        $(this).closest('form').submit();
                    }
                );
            });
        });
    </script>
@endsection
