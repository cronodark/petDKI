@extends('layouts.store')

@section('content')
<!-- Main Content Area -->
<section class="ml-10 my-5 max-md:ml-0 max-md:w-full">
    <div class="flex flex-col items-start mt-2 w-full max-md:mt-10 max-md:max-w-full">
        <!-- Add Product Form -->
        <h1 class="mt-5 text-4xl font-bold text-blue-950 max-md:mt-10">Tambah Produk</h1>

        <form action="{{ route('warehouse.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 w-full max-w-3xl">
            @csrf

            <!-- Product Name -->
            <div class="mb-6">
                <label for="product_name" class="block text-xl font-medium text-zinc-400 mb-3">
                    Nama Produk
                </label>
                <input
                    type="text"
                    id="product_name"
                    name="product_name"
                    value="{{ old('product_name') }}"
                    placeholder="Masukkan nama produk"
                    class="w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                />
                @error('product_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- SKU -->
            <div class="mb-6">
                <label for="sku" class="block text-xl font-medium text-zinc-400 mb-3">
                    SKU
                </label>
                <input
                    type="text"
                    id="sku"
                    name="sku"
                    value="{{ old('sku') }}"
                    placeholder="Masukkan kode SKU"
                    class="w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                />
                @error('sku')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price and Stock (2-column layout) -->
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <div class="flex-1">
                    <label for="price" class="block text-xl font-medium text-zinc-400 mb-3">
                        Harga
                    </label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="{{ old('price') }}"
                        placeholder="0"
                        class="w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                    @error('price')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex-1">
                    <label for="stock" class="block text-xl font-medium text-zinc-400 mb-3">
                        Stok
                    </label>
                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        value="{{ old('stock') }}"
                        placeholder="0"
                        class="w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                    @error('stock')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label for="category_id" class="block text-xl font-medium text-zinc-400 mb-3">
                    Kategori
                </label>
                <select
                    id="category_id"
                    name="category_id"
                    class="w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white"
                    required
                >
                    <option value="" disabled selected>Pilih kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-xl font-medium text-zinc-400 mb-3">
                    Deskripsi
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="Masukkan deskripsi produk"
                    class="w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Photo -->
            <div class="mb-6">
                <label for="photo" class="block text-xl font-medium text-zinc-400 mb-3">
                    Foto Produk
                </label>
                <div class="flex items-center gap-3">
                    <label
                        for="photo"
                        class="px-6 py-3 text-lg border border-gray-400 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors"
                    >
                        Pilih File
                    </label>
                    <span id="file-name" class="text-lg text-gray-500">Tidak ada file yang dipilih</span>
                </div>
                <input
                    type="file"
                    id="photo"
                    name="photo"
                    accept="image/*"
                    class="hidden"
                />
                @error('photo')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="px-6 py-4 mt-4 text-xl font-bold text-white rounded-2xl bg-slate-600 hover:brightness-110 transition-all"
            >
                Simpan
            </button>
        </form>
    </div>
</section>

<script>
    // Display selected filename
    document.getElementById('photo').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Tidak ada file yang dipilih';
        document.getElementById('file-name').textContent = fileName;
    });
</script>
@endsection
