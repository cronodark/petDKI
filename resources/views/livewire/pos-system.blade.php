<div wire:poll.keep-alive wire:ignore.self class="flex flex-col lg:flex-row bg-white w-full">
    <!-- Cart Side -->
    <section class="lg:w-[36%] w-full pt-5 border-2 shadow-lg min-h-screen max-h-fit">
        <div class="px-6 pb-4">
            <div class="flex items-start gap-4 mb-3 border-b-2 pb-5">
                <a href="{{ route('transactions.index') }}">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/20fcf4da14866723cf79e7a82e2cb4ce9b8bbe1d?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                        class="w-[18px] sm:w-[23px] mt-2" alt="Order icon" />
                </a>
                <div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-blue-950">
                        Point Of Sale</h1>
                    <time class="block mt-2 text-sm sm:text-base text-slate-600">Tanggal
                        {{ now() }}</time>
                </div>
            </div>

            <div class="mt-6">
                <!-- Display Cart -->
                <div id="cartDisplay">
                    @forelse($cart as $productId => $item)
                        <div class="flex justify-between items-center border-b-2 py-2 pb-5">
                            <div class="flex flex-col text-left">
                                <div class="flex justify-center items-center text-xl text-[#213559] font-bold">
                                    <span class="me-2">X {{ $item['quantity'] }}</span>
                                    <span>{{ $item['name'] }}</span>
                                </div>
                                <div class="flex gap-2 text-sm text-gray-500">
                                    {{-- <button wire:click="decreaseQuantity({{ $productId }})"
                                        class="px-2 bg-gray-300 rounded hover:bg-gray-400">-</button>
                                    <span>{{ $item['quantity'] }}</span>
                                    <button wire:click="increaseQuantity({{ $productId }})"
                                        class="px-2 bg-gray-300 rounded hover:bg-gray-400">+</button> --}}
                                    <span>{{ number_format($item['price']) }}</span>
                                </div>
                            </div>
                            <div class="text-right text-xl text-[#213559] font-bold">
                                <div class="flex items-center justify-center">
                                    <span
                                        class="me-3">Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                                    {{-- delete item button --}}
                                    <button wire:click="removeItem({{ $productId }})">
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14.2047 3.04386V2.02924C14.2047 1.49105 13.9909 0.974907 13.6103 0.594351C13.2298 0.213794 12.7136 0 12.1754 0H6.08772C5.54953 0 5.03339 0.213794 4.65283 0.594351C4.27227 0.974907 4.05848 1.49105 4.05848 2.02924V3.04386H1.01462C0.745526 3.04386 0.487453 3.15076 0.297175 3.34104C0.106897 3.53131 0 3.78939 0 4.05848C0 4.32757 0.106897 4.58565 0.297175 4.77592C0.487453 4.9662 0.745526 5.0731 1.01462 5.0731H2.02924V16.2339C2.02924 17.0412 2.34993 17.8154 2.92077 18.3863C3.4916 18.9571 4.26582 19.2778 5.0731 19.2778H13.1901C13.9973 19.2778 14.7716 18.9571 15.3424 18.3863C15.9132 17.8154 16.2339 17.0412 16.2339 16.2339V5.0731H17.2485C17.5176 5.0731 17.7757 4.9662 17.966 4.77592C18.1563 4.58565 18.2632 4.32757 18.2632 4.05848C18.2632 3.78939 18.1563 3.53131 17.966 3.34104C17.7757 3.15076 17.5176 3.04386 17.2485 3.04386H14.2047ZM12.1754 2.02924H6.08772V3.04386H12.1754V2.02924ZM14.2047 5.0731H4.05848V16.2339C4.05848 16.503 4.16538 16.7611 4.35566 16.9514C4.54593 17.1416 4.80401 17.2485 5.0731 17.2485H13.1901C13.4592 17.2485 13.7172 17.1416 13.9075 16.9514C14.0978 16.7611 14.2047 16.503 14.2047 16.2339V5.0731Z"
                                                fill="#B2B6BB" />
                                            <path
                                                d="M6.08777 7.10229H8.11701V15.2193H6.08777V7.10229ZM10.1462 7.10229H12.1755V15.2193H10.1462V7.10229Z"
                                                fill="#B2B6BB" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-400">Belum ada barang.</p>
                    @endforelse

                    <div
                        class="mt-6 flex justify-between font-bold text-lg border-b-2 border-dashed border-[#B2B6BB] pb-3 text-[#213559]">
                        <span>Total:</span>
                        <span>Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- Hidden Printable Receipt -->
                <div id="receipt" class="hidden print:block text-center items-center">
                    <div class="text-center border-b-2 border-black py-2">
                        <p class="font-bold">Struk Pembelian</p>
                        <p class="font-bold">PET DKI</p>
                        <p class="text-[8px] text-center">Jl. Kembang Lio No.12, RT.04/RW.019, Depok, Kec. Pancoran Mas,
                            Kota Depok, Jawa Barat 16431</p>
                        <p class="text-sm">{{ now() }}</p>
                    </div>

                    <div class="space-y-2 my-4">
                        @foreach ($cart as $productId => $item)
                            <div class="flex justify-between text-sm">
                                <div>{{ $item['name'] }} x{{ $item['quantity'] }}</div>
                                <div>Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t border-gray-400 my-2"></div>
                    <div class="flex justify-between font-bold text-sm">
                        <span>Total:</span>
                        <span>Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
                    </div>
                    <div class="text-center mt-4 text-xs">Terima Kasih!</div>
                </div>

                <input wire:model.debounce.300ms="searchSku" type="text" id="searchSku" autofocus
                    class="border-b-2 p-2 w-full mt-5" placeholder="SKU" />

                <button wire:click="payNow" id="payNowButton"
                    class="mt-6 w-full py-3 px-5 bg-slate-600 text-white text-lg font-semibold rounded hover:bg-slate-700 transition">
                    <div class="flex justify-between"><span>Bayar</span><span>Rp{{ number_format($totalPrice, 0, ',', '.') }}</span></div>
                </button>
            </div>
        </div>
    </section>

    <!-- Product Side -->
    <section class="lg:w-[64%] w-full">
        <header class="py-6 bg-slate-600 text-white text-2xl font-bold text-center">
            PET DKI
        </header>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6">
            @foreach ($products as $product)
                <div wire:click="addToCart({{ $product->id }})"
                    class="cursor-pointer bg-white rounded-lg shadow hover:shadow-lg transition">
                    @if ($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->product_name }}"
                            class="w-full h-40 object-cover rounded-t-lg" />
                    @else
                        <img src="{{ asset('images/default.jpg') }}" alt="{{ $product->product_name }}"
                            class="w-full h-40 object-cover rounded-t-lg" />
                    @endif
                    <div class="bg-slate-600 text-white p-3 rounded-b-lg text-center font-semibold">
                        {{ $product->product_name }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

@push('scripts')
    <script>
        window.addEventListener('print-receipt', function() {
            console.log('Print receipt event triggered');
            // let printContents = document.getElementById('receipt').innerHTML;
            // let originalContents = document.body.innerHTML;

            // document.body.innerHTML = printContents;
            // window.print();
            // document.body.innerHTML = originalContents;
            // window.location.reload();
            const printContents = document.getElementById('receipt').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = `<div class="p-4" style="width:80mm">${printContents}</div>`;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();;
        });

        window.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchSku');
            searchInput.focus();

            document.addEventListener('keypress', function(e) {
                if (e.target.tagName !== 'INPUT') {
                    searchInput.focus();
                }
            });
        });
    </script>
@endpush
