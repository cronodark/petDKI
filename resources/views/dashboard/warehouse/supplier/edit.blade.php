@extends('layouts.store')

@section('styles')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Paytone+One&display=swap"
        rel="stylesheet" />
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: "Montserrat", sans-serif;
        }

        input:focus {
            outline: none;
        }
    </style>
@endsection

@section('content')
    <section class="px-5 pt-12 pb-12 w-full">

        <h2 class="mb-12 text-4xl font-bold text-blue-950 max-sm:text-3xl">
            Edit Supplier
        </h2>

        <form class="max-w-full" action="{{ route('warehouse.suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
            {{-- CSRF Token --}}
            @csrf
            @method('PUT')
            <div class="mb-6">
                <input type="text" name="name" placeholder="Nama supplier"
                    class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
                    value="{{ $supplier->name }}" />
            </div>

            <div class="mb-6">
                <input type="text" placeholder="Alamat" name="address"
                    class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
                    value="{{ $supplier->address }}" />
            </div>

            <div class="flex gap-20 mb-6 max-sm:flex-col max-sm:gap-5">
                <div class="flex-1">
                    <input type="text" placeholder="Latitude" name="latitude"
                        class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
                        value="{{ $supplier->latitude }}" />
                </div>
                <div class="flex-1">
                    <input type="text" placeholder="Longitude" name="longitude"
                        class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
                        value="{{ $supplier->longitude }}" />
                </div>
            </div>

            <div class="mb-6">
                <input type="text" placeholder="Nomor HP" name="phone"
                    class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
                    value="{{ $supplier->phone }}" />
            </div>

            <div class="mb-5">
                <select name="category" id="category" class="w-full text-xl bg-transparent border-b-2 py-3">
                    <option value="" disabled hidden>Pilih kategori</option>
                    <option value="Toko Pusat" {{ $supplier->category === 'Toko Pusat' ? 'selected' : '' }}>Toko Pusat
                    </option>
                    <option value="Toko Cabang" {{ $supplier->category === 'Toko Cabang' ? 'selected' : '' }}>Toko Cabang
                    </option>
                    <option value="Partner" {{ $supplier->category === 'Partner' ? 'selected' : '' }}>Partner</option>
                </select>
            </div>

            <div class="mb-3">
                <textarea name="description" id="description" class="border w-full resize-none py-1" placeholder="Deskripsi">{{ $supplier->description }}</textarea>
            </div>

            <div class="flex flex-col gap-2">
                <input type="file" name="photo_url" id="photo_url" class="hidden" accept="image/*" />

                <button type="button" onclick="document.getElementById('photo_url').click()"
                    class="px-4 py-2 bg-slate-600 text-white rounded hover:bg-slate-700 transition">
                    Upload Foto Supplier
                </button>

                <label id="file-name" class="text-sm text-gray-500">Belum ada file dipilih</label>
            </div>

            <div class="flex mt-5">
                <a href="{{ route('warehouse.suppliers.index') }}"
                    class="flex justify-center align-items-center text-xl font-bold text-[#37496A] rounded-2xl cursor-pointer bg-slate-100 border-2 py-5 px-9 me-3">
                    Batal
                </a>
                <button type="submit"
                    class="text-xl font-bold text-white rounded-2xl cursor-pointer bg-slate-600 border-[none] py-5 px-9">
                    Simpan
                </button>
            </div>
        </form>
    </section>
@endsection

@section('script')
    <script>
        const fileInput = document.getElementById('photo_url');
        const fileNameLabel = document.getElementById('file-name');

        fileInput.addEventListener('change', function() {
            const fileName = this.files.length > 0 ? this.files[0].name : 'Belum ada file dipilih';
            fileNameLabel.textContent = fileName;
        });
    </script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ["Montserrat", "sans-serif"],
                        paytone: ['"Paytone One"', "sans-serif"],
                    },
                },
            },
        };
    </script>
@endsection
