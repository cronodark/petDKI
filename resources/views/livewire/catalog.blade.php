<div>
    <!-- Navigation -->
    <nav class="flex items-center justify-between px-10 py-4 bg-white mb-10">
        <!-- Logo -->
        <div class="text-2xl font-bold text-gray-800">
            <a href="{{ route('company-profile.index') }}">
                <span class="text-[#37496A]">Pet</span>
                <span class="text-[#37496A]">DKI</span>
            </a>
        </div>

        <!-- Search Bar -->
        <div class="relative w-1/3">
            <input type="text" placeholder="Search ..." wire:model.live="searchTerm"
                class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400">
            <img src="{{ asset('images/Search.svg') }}" alt="Search Icon"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400">
        </div>
    </nav>

    <!-- Main Container -->
    <div class="max-w-screen-xl mx-auto flex gap-6 m-10 w-2/3">
        <!-- Sidebar / Categories -->
        <div class="w-1/4 bg-white p-6 rounded-lg shadow-lg border border-gray-300">
            <h2 class="text-lg font-bold mb-4">Etalase</h2>
            <ul class="space-y-2">
                <li class="font-semibold">
                    <a href="#" wire:click.prevent="$set('selectedCategory', 'all')"
                        class="{{ $selectedCategory === 'all' ? 'text-blue-600' : '' }}">Semua</a>
                </li>
                @foreach ($categories as $category)
                    <li class="font-semibold">
                        <a href="#" wire:click.prevent="$set('selectedCategory', '{{ $category->id }}')"
                            class="{{ $selectedCategory == $category->id ? 'text-blue-600' : '' }}">
                            {{ $category->category_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Product Content -->
        <div class="w-3/4 grid grid-cols-3 gap-6">
            @forelse ($products as $product)
                <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}"
                        class="w-full h-40 object-cover rounded">
                    <p class="mt-2 text-center font-semibold">{{ $product->product_name }}</p>
                </div>
            @empty
                <div class="col-span-3 text-center">No products found.</div>
            @endforelse
        </div>
    </div>
</div>

