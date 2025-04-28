@extends('layouts.store')
@section('content')
    <main class="flex-1 px-8 py-2 w-full h-full">
        <!-- Table Section -->
        <section class="p-6 rounded-xl overflow-x-auto h-full">
            <section class="flex w-full mb-8">
                <h2 class="self-start text-4xl font-bold text-blue-950 w-1/2">
                    Karyawan
                </h2>
                <div class="w-1/4 flex justify-center items-center">
                    <div
                        class="bg-[#F1F1F9] py-4 px-6 text-[#37496A] flex justify-between items-center rounded-2xl hover:shadow-lg">
                        <svg width="25" height="25" viewBox="0 0 29 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="me-3">
                            <path
                                d="M19.6251 28.9617C19.6934 29.4742 19.5226 30.0208 19.1297 30.3796C18.9716 30.5379 18.7839 30.6636 18.5773 30.7493C18.3706 30.835 18.149 30.8792 17.9253 30.8792C17.7016 30.8792 17.48 30.835 17.2734 30.7493C17.0667 30.6636 16.879 30.5379 16.7209 30.3796L9.87052 23.5292C9.68431 23.347 9.54271 23.1242 9.45677 22.8782C9.37084 22.6323 9.34289 22.3698 9.3751 22.1112V13.3646L1.19219 2.8925C0.914766 2.53636 0.789589 2.0849 0.844006 1.63676C0.898424 1.18861 1.12801 0.780225 1.4826 0.500833C1.80719 0.261667 2.16594 0.125 2.54177 0.125H26.4584C26.8343 0.125 27.193 0.261667 27.5176 0.500833C27.8722 0.780225 28.1018 1.18861 28.1562 1.63676C28.2106 2.0849 28.0854 2.53636 27.808 2.8925L19.6251 13.3646V28.9617ZM6.02677 3.54167L12.7918 12.1858V21.6158L16.2084 25.0325V12.1687L22.9734 3.54167H6.02677Z"
                                fill="#37496A" />
                        </svg>
                        <button class="font-bold">Filter</button>
                    </div>
                </div>
                <div class="w-1/4 flex justify-center items-center">
                    <a href="{{ route('manager.worker.create') }}"
                        class="bg-[#37496A] inline-flex justify-center items-center text-white font-bold px-3 py-4 rounded-2xl hover:shadow-lg"><span
                            class="me-2">+</span>Tambah Karyawan</a>
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
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#37496A',
                    customClass: {
                        popup: 'rounded-xl'
                    }
                });
            @endif

            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // prevent default form submission

                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Aksi ini akan menghapus data karyawan?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#FF0000',
                        cancelButtonColor: '#C2C2C2',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // proceed with deletion
                        }
                    });
                });
            });

            // Display selected file name
            const inputFile = document.getElementById('projectPhoto');
            const fileNameDisplay = document.getElementById('fileNameDisplay');
            if (inputFile) {
                inputFile.addEventListener('change', function() {
                    const fileName = this.files[0] ? this.files[0].name : "No file chosen";
                    fileNameDisplay.textContent = fileName;
                });
            }
        });
    </script>
@endsection
