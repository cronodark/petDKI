@extends('layouts.store')
@include('layouts.app')
@section('content')
<section class="py-20 ml-5 max-md:ml-0 max-md:w-full">
    <div class="mt-3.5 w-full font-medium max-md:mt-10 max-md:max-w-full">
        @include('partials.flash-messages')
        
        <div class="flex flex-wrap gap-5 justify-between w-full font-bold max-md:max-w-full">
            <h2 class="my-auto text-4xl text-blue-950">Categories</h2>
            <div class="flex gap-8 text-xl max-md:max-w-full">
                <a href="{{ route('warehouse.categories.create') }}"
                   class="flex gap-4 px-6 py-3 text-white rounded-2xl bg-slate-600 max-md:px-5 transition-all hover:brightness-110">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/047a16e4226a215254279b8d74a91fce1448fade?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                         alt="Add icon" class="object-contain shrink-0 w-6 aspect-square">
                    <span class="basis-auto">Add Category</span>
                </a>
            </div>
        </div>
        <div class="flex flex-col pb-8 mt-10 w-full text-xl rounded-2xl bg-slate-100 max-md:max-w-full">
            <div class="flex items-center px-20 py-7 w-full text-amber-200 rounded-2xl bg-slate-600 max-md:px-5 max-md:max-w-full">
                <div class="w-[25%] text-left">ID</div>
                <div class="w-[45%] text-left flex items-center gap-2">
                    <span>Category Name</span>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bfc8ac303e495365091f5c7686d5c013283816d4?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                         alt="Sort icon" class="w-[7px] mt-1">
                </div>
                <div class="w-[30%] text-center">Action</div>
            </div>
            @foreach($categories as $category)
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
                                    data-id="{{ $category->id }}">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            <hr class="mt-8 border border-gray-300 w-full max-w-full"/>
            <div class="mt-8 mr-7 ml-7 max-md:mr-2.5">
                {{ $categories->links() }}
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
                'Delete Category',
                `Are you sure you want to delete category ID: ${categoryId}?`,
                () => {
                    $(this).closest('form').submit();
                }
            );
        });
    });
</script>
@endsection