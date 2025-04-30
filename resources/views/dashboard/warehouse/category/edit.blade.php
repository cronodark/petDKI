@extends('layouts.store')
@section('content')
    <section class="ml-10 max-md:ml-0 max-md:w-full">
        <div class="flex flex-col items-start mt-2 w-full max-md:mt-10 max-md:max-w-full">
            <!-- Edit Category Form -->
            <h1 class="mt-5 text-4xl font-bold text-blue-950 max-md:mt-10">
                Edit Kategori
            </h1>

            @include('partials.flash-messages')

            <form method="POST" action="{{ route('warehouse.categories.update', $category->id) }}" class="w-full">
                @csrf
                @method('PATCH')
                <label for="category-name" class="mt-20 text-xl font-medium text-zinc-400 block max-md:mt-10">
                    Nama Kategori
                </label>
                <input type="text" id="category-name" name="category_name"
                    value="{{ old('category_name', $category->category_name) }}" placeholder="Masukkan nama kategori"
                    class="mt-3 w-[914px] max-w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('category_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <button type="submit"
                    class="px-8 py-3 mt-8 text-xl font-bold text-white rounded-2xl bg-slate-600 hover:bg-slate-700 transition-colors">
                    Simpan
                </button>
            </form>
        </div>
    </section>
@endsection
