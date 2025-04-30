<main class="flex-1 py-2 w-full h-full">
    <!-- Table Section -->
    <section class="p-2 rounded-xl overflow-x-auto h-full">
        @include('partials.flash-messages')
        <section class="flex w-full mb-8">
            <h2 class="self-start text-4xl font-bold text-blue-950 w-1/2">
                Karyawan
            </h2>
            <div class="w-full flex justify-end items-end">
                <div
                    class="bg-[#F1F1F9] me-3 text-[#37496A] flex justify-between items-center rounded-2xl hover:shadow-lg">
                    <button id="filterButton" type="button"
                        class="btn-hover bg-slate-100 px-3 py-3 rounded-xl flex items-center gap-2 text-slate-600"
                        onclick="toggleFilterDropdown()">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5fceb2b38570db72ffd3900e2dcc53fdd3b9d6da59bad07f63c84cc6caa5a517"
                            class="w-5" />
                        <span>Filter</span>
                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="filterDropdown"
                        class="hidden absolute right-37 mt-40 w-48 bg-white border rounded-lg shadow-lg z-10">
                        <button wire:click="sortBy('name')"
                            class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800 rounded-lg">
                            Nama
                        </button>
                        <button wire:click="sortBy('role')"
                            class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800 rounded-lg">
                            Role
                        </button>
                        <button wire:click="sortBy('email')"
                            class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800 rounded-lg">
                            Email
                        </button>
                        <button wire:click="sortBy('username')"
                            class="block w-full text-left px-4 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-800 rounded-lg">
                            Username
                        </button>
                    </div>
                </div>
                <div class="flex justify-center items-center hover:shadow-lg">
                    <a href="{{ route('manager.worker.create') }}"
                        class="bg-[#37496A] inline-flex justify-center items-center text-white font-bold py-3 px-3 rounded-2xl "><span
                            class="me-2">+</span>Tambah Karyawan</a>
                </div>
            </div>
        </section>
        <section class="bg-gray-100 w-full rounded-2xl">
            <!-- Table Header -->
            <div class="hidden lg:grid grid-cols-6 gap-4 font-bold text-white bg-gray-600 p-4 rounded-xl">
                <span class="px-2">Foto</span>
                <span class="px-2">Nama</span>
                <span class="px-2">Username</span>
                <span class="px-2">Email</span>
                <span class="px-2">Role</span>
                <span class="px-2">Aksi</span>
            </div>

            @foreach ($workers as $worker)
                <!-- Table Rows -->
                <div class="flex flex-col gap-4 mt-4">
                    <div class="grid grid-cols-1 lg:grid-cols-6 gap-4 items-center bg-white p-4 rounded-xl shadow">
                        <div class="flex justify-center lg:justify-start px-2">
                            @if ($worker->photo)
                                <img src="{{ 'storage/' . $worker->photo }}" alt="{{ $worker->name }}"
                                    class="w-12 h-12 rounded-full object-cover" />
                            @else
                                <img src="{{ asset('images/defaultProfile.png') }}" alt="{{ $worker->name }}"
                                    class="w-12 h-12 rounded-full object-cover" />
                            @endif
                        </div>
                        <span class="text-gray-700 font-medium px-2">{{ $worker->name }}</span>
                        <span class="text-gray-600 px-2">{{ $worker->username }}</span>
                        <span
                            class="text-gray-600 px-2 truncate whitespace-nowrap min-w-[150px]">{{ $worker->email }}</span>
                        <span class="text-gray-600 px-2">{{ $worker->role }}</span>
                        <div class="flex gap-2 px-2">
                            <a href="{{ route('manager.worker.show', $worker->id) }}"
                                class="px-4 py-2 border-gray-600 text-gray-600 rounded-lg border-2 text-sm">Edit</a>
                            <form action="{{ route('manager.worker.destroy', $worker->id) }}" method="POST"
                                class="inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm delete-button">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-6">
                @if ($workers->hasPages())
                    <nav class="flex flex-wrap gap-5 justify-between items-start mt-9 mr-7 ml-7 text-xl font-medium whitespace-nowrap text-slate-600 max-md:mr-2.5 max-md:max-w-full fade-in"
                        aria-label="Pagination" style="animation-delay: 0.6s">

                        <!-- Previous Page -->
                        @if ($workers->onFirstPage())
                            <span class="flex gap-3 items-center cursor-not-allowed text-gray-400">
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                                    alt="Prev" class="object-contain w-3 aspect-[0.55]" />
                                <span>Previous</span>
                            </span>
                        @else
                            <a href="{{ $workers->previousPageUrl() }}" class="flex gap-3 items-center btn-hover">
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207"
                                    alt="Prev" class="object-contain w-3 aspect-[0.55]" />
                                <span>Previous</span>
                            </a>
                        @endif

                        <!-- Page Numbers -->
                        <div class="flex gap-5 items-center self-stretch">
                            @foreach ($workers->getUrlRange(1, $workers->lastPage()) as $page => $url)
                                @if ($page == $workers->currentPage())
                                    <span
                                        class="self-stretch px-3 py-1 text-white rounded-md bg-slate-600 text-center pulse-effect"
                                        aria-current="page">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="btn-hover"
                                        aria-label="Go to page {{ $page }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <!-- Next Page -->
                        @if ($workers->hasMorePages())
                            <a href="{{ $workers->nextPageUrl() }}" class="flex gap-3.5 items-center btn-hover">
                                <span>Next</span>
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d15578e15c255f9ec78c7db8e35631674a3faa8b"
                                    alt="Next" class="object-contain w-3 aspect-[0.55]" />
                            </a>
                        @else
                            <span class="flex gap-3 items-center cursor-not-allowed text-gray-400">
                                <span>Next</span>
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d15578e15c255f9ec78c7db8e35631674a3faa8b"
                                    alt="Next" class="object-contain w-3 aspect-[0.55]" />
                            </span>
                        @endif
                    </nav>
                @endif
            </div>
        </section>
    </section>
</main>
