@extends('layouts.store')

@section('styles')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Paytone+One&display=swap"
        rel="stylesheet" />
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css" />
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
            Tambah Supplier
        </h2>

        <form class="max-w-full" action="{{ route('warehouse.suppliers.store') }}" method="POST">
            @csrf
            <div class="mb-14">
                <input type="text" name="name" placeholder="Nama supplier"
                    class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent" />
            </div>

            <div class="mb-14">
                <input type="text" placeholder="Alamat" name="address"
                    class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent" />
            </div>

            <div class="flex gap-20 mb-14 max-sm:flex-col max-sm:gap-5">
                <div class="flex-1">
                    <input type="text" placeholder="Latitude" name="latitude"
                        class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent" />
                </div>
                <div class="flex-1">
                    <input type="text" placeholder="Longitude" name="longitude"
                        class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent" />
                </div>
            </div>

            <div class="mb-14">
                <input type="text" placeholder="Nomor HP" name="phone"
                    class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent" />
            </div>

            <div class="flex">
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
