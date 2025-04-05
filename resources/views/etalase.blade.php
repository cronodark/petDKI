<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etalase Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="flex items-center justify-between px-10 py-4 bg-white mb-10">
        {{-- Logo --}}
        <div class="text-2xl font-bold text-gray-800">
            <a href="{{ route('company-profile.index') }}"><span class="text-[#37496A]">Pet</span> <span class="text-[#37496A]">DKI</span></a>
        </div>

        {{-- Search Bar --}}
        <div class="relative w-1/3">
            <input type="text" placeholder="Search ..."
                class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400">
            <img src="{{ asset('images/Search.svg') }}" alt="Search Icon"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400">
        </div>
    </nav>


    <!-- Container Utama -->
    <div class="max-w-screen-xl mx-auto flex gap-6 m-10 w-2/3">

        <!-- Etalase / Sidebar -->
        <div class="w-1/4 bg-white p-6 rounded-lg shadow-lg border-2 border-gray">
            <h2 class="text-lg font-bold mb-4">Etalase</h2>
            <ul class="space-y-2">
                <li class="font-semibold">Semua</li>
                @foreach ($categories as $categorie)
                    <li class="font-semibold">{{ $categorie->category_name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Konten Produk -->
        <div class="w-3/4 grid grid-cols-3 gap-6">
            <!-- Produk 1 -->
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                <img src="{{ asset('images/wiskes (1).svg') }}" alt="Produk 1" class="w-full h-40 object-cover rounded">
                <p class="mt-2 text-center font-semibold">Whiskas Junior Ocean Fish</p>
            </div>

            <!-- Produk 2 -->
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                <img src="{{ asset('images/wiskes (2).svg') }}" alt="Produk 2" class="w-full h-40 object-cover rounded">
                <p class="mt-2 text-center font-semibold">Whiskas 1+</p>
            </div>

            <!-- Produk 3 -->
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                <img src="{{ asset('images/wiskes (3).svg') }}" alt="Produk 3" class="w-full h-40 object-cover rounded">
                <p class="mt-2 text-center font-semibold">Whiskas Junior Mackerel</p>
            </div>

            <!-- Produk 4 -->
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                <img src="{{ asset('images/wiskes (4).svg') }}" alt="Produk 4" class="w-full h-40 object-cover rounded">
                <p class="mt-2 text-center font-semibold">Tasty Mix</p>
            </div>

            <!-- Produk 5 -->
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                <img src="{{ asset('images/wiskes (5).svg') }}" alt="Produk 5" class="w-full h-40 object-cover rounded">
                <p class="mt-2 text-center font-semibold">Whiskas</p>
            </div>

            <!-- Produk 6 -->
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                <img src="{{ asset('images/wiskes (6).svg') }}" alt="Produk 6" class="w-full h-40 object-cover rounded">
                <p class="mt-2 text-center font-semibold">Whiskas 1+ Ocean Fish</p>
            </div>

            <!-- Produk 7 -->
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                <img src="{{ asset('images/wiskes (7).svg') }}" alt="Produk 6" class="w-full h-40 object-cover rounded">
                <p class="mt-2 text-center font-semibold">Whiskas Mackerel</p>
            </div>

            <!-- Produk 8 -->
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                <img src="{{ asset('images/wiskes (8).svg') }}" alt="Produk 6" class="w-full h-40 object-cover rounded">
                <p class="mt-2 text-center font-semibold">Whiskas 1+ Tuna</p>
            </div>
        </div>

    </div>


    @include('partials.comfooter')

</body>

</html>
