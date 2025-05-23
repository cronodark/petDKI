@extends('layouts.store')

@section('content')
    <!-- Main Content Area -->
    <section class="ml-10 max-md:ml-0 max-md:w-full">
        <div class="flex flex-col items-start mt-2 w-full max-md:mt-10 max-md:max-w-full">

            <!-- Add Category Form -->
            <h1 class="mt-5 text-4xl font-bold text-blue-950 max-md:mt-10">Tambah Kategori</h1>

            <form action="{{ route('warehouse.categories.store') }}" method="POST" class="mt-10 w-full max-w-3xl">
                @csrf

                <!-- Category Name Label -->
                <label for="category_name" class="block text-xl font-medium text-zinc-400 mb-3">
                    Nama Kategori
                </label>

                <!-- Input field -->
                <input type="text" id="category_name" name="category_name" value="{{ old('category_name') }}"
                    placeholder="Masukkan nama kategori"
                    class="w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />



                @error('category_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Submit Button -->
                <div class="flex items-center">
                    <a href="{{ route('warehouse.categories.index') }}"
                        class="px-8 py-3 mt-8 text-xl font-bold text-slate-600 rounded-2xl bg-transparent border border-slate-700 hover:shadow me-3">
                        Kembali
                    </a>
                    <button type="submit"
                        class="px-8 py-3 mt-8 text-xl font-bold text-white rounded-2xl bg-slate-600 hover:bg-slate-700 transition-colors">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </section>
@endsection
