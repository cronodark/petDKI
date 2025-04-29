@if ($paginator->hasPages())
    <nav class="flex justify-between items-center text-lg mt-8 text-slate-600 mx-7">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="flex items-center gap-2 opacity-50 cursor-not-allowed" disabled>
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f9eeb852c9228af465aad9202d63771acf8cbcb06142bf0338c68c844ecb442"
                    class="w-3" />
                Previous
            </button>
        @else
            <button wire:click="previousPage" wire:loading.attr="disabled" class="flex items-center gap-2 btn-hover">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f9eeb852c9228af465aad9202d63771acf8cbcb06142bf0338c68c844ecb442"
                    class="w-3" />
                Previous
            </button>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex gap-3 items-center">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="bg-slate-600 text-white px-3 py-1 rounded">{{ $page }}</span>
                        @else
                            <button wire:click="gotoPage({{ $page }})"
                                class="btn-hover">{{ $page }}</button>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled" class="flex items-center gap-2 btn-hover">
                Next
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/856aa508a88fbfce4ee4850206428da9a4a53d1bdfce483454f6838c42d9bcbb"
                    class="w-3" />
            </button>
        @else
            <button class="flex items-center gap-2 opacity-50 cursor-not-allowed" disabled>
                Next
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/856aa508a88fbfce4ee4850206428da9a4a53d1bdfce483454f6838c42d9bcbb"
                    class="w-3" />
            </button>
        @endif
    </nav>
@endif
