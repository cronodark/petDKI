@extends('layouts.store')
@section('content')
    <section class="ml-10 max-md:ml-0 max-md:w-full">
        <div class="flex flex-col items-start mt-2 w-full max-md:mt-10 max-md:max-w-full">
            <!-- Edit Product Form -->
            <h1 class="mt-5 text-4xl font-bold text-blue-950 max-md:mt-10">
                Edit Produk
            </h1>
            @include('partials.flash-messages')
            <form method="POST" action="{{ route('warehouse.products.update', $product->id) }}" class="w-full" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Product Name Field -->
                <label for="product-name" class="mt-20 text-xl font-medium text-zinc-400 block max-md:mt-10">
                    Nama Produk
                </label>
                <input type="text" id="product-name" name="product_name"
                    value="{{ old('product_name', $product->product_name) }}" placeholder="Masukkan nama produk"
                    class="mt-3 w-[914px] max-w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('product_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- SKU Field -->
                <label for="sku" class="mt-10 text-xl font-medium text-zinc-400 block">
                    SKU
                </label>
                <input type="text" id="sku" name="sku"
                    value="{{ old('sku', $product->sku) }}" placeholder="Masukkan SKU"
                    class="mt-3 w-[914px] max-w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('sku')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Price and Stock Fields (side by side) -->
                <div class="flex flex-wrap gap-10 mt-10 w-full max-w-[914px]">
                    <!-- Price Field -->
                    <div class="flex-1">
                        <label for="price" class="text-xl font-medium text-zinc-400 block">
                            Harga
                        </label>
                        <input type="text" id="price" name="price"
                            value="{{ old('price', $product->price) }}" placeholder="Masukkan harga"
                            class="mt-3 w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('price')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock Field -->
                    <div class="flex-1">
                        <label for="stock" class="text-xl font-medium text-zinc-400 block">
                            Stok
                        </label>
                        <input type="text" id="stock" name="stock"
                            value="{{ old('stock', $product->stock) }}" placeholder="Masukkan stok"
                            class="mt-3 w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('stock')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Category Field with Dropdown -->
                <label for="category_id" class="mt-10 text-xl font-medium text-zinc-400 block">
                    Kategori
                </label>
                <select id="category_id" name="category_id"
                    class="mt-3 w-[914px] max-w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Description Field -->
                <label for="description" class="mt-10 text-xl font-medium text-zinc-400 block">
                    Deskripsi
                </label>
                <textarea id="description" name="description" placeholder="Masukkan deskripsi produk" rows="4"
                    class="mt-3 w-[914px] max-w-full px-4 py-3 text-lg border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Project Photo Upload -->
                <label for="product_photo" class="mt-10 text-xl font-medium text-zinc-400 block">
                    Foto Produk
                </label>
                <div class="flex flex-col mt-3">
                    @if($product->photo)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->product_name }}" class="w-32 h-32 object-cover rounded-lg">
                            <p class="text-sm text-gray-500 mt-1">Foto saat ini</p>
                        </div>
                    @endif
                    <div class="flex gap-3 text-xl text-zinc-400">
                        <label for="photo"
                            class="px-6 py-3 border border-gray-400 rounded-lg cursor-pointer hover:bg-slate-100 focus-within:ring-2 focus-within:ring-blue-500 transition-colors">
                            Pilih file
                            <input type="file" id="photo" name="photo" class="hidden" accept="image/*">
                        </label>
                        <span class="my-auto" id="file-name">Tidak ada file dipilih</span>
                    </div>
                </div>
                @error('photo')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Submit Button -->
                <button type="submit"
                    class="px-8 py-3 mt-8 text-xl font-bold text-white rounded-2xl bg-slate-600 hover:bg-slate-700 transition-colors">
                    Simpan
                </button>
            </form>
        </div>
    </section>

    <script>
        // File upload handling
        document.getElementById("photo").addEventListener("change", function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : "Tidak ada file dipilih";
            document.getElementById("file-name").textContent = fileName;
        });
    </script>
@endsection
