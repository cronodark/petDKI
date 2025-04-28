<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- You can also use @vite('resources/css/app.css') if you use Vite -->
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Daftar Produk</h1>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    @if ($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->product_name }}"
                            class="w-full h-48 object-cover">
                    @else
                        <img src="https://via.placeholder.com/300x200.png?text=No+Image" alt="No Image"
                            class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">{{ $product->product_name }}</h2>
                        <p class="text-gray-600">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-gray-600">SKU: {{ $product->sku }}</p>
                        <p class="text-gray-600">Stok: {{ $product->stock }}</p>
                        <p class="text-gray-600">
                            Kategori: {{ $product->category ? $product->category->category_name : 'N/A' }}
                        </p>
                        <a href="{{ route('products.show', $product->id) }}"
                            class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</body>

</html>
