@extends('layouts.store')

@section('styles')
    <style>
        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(55, 73, 106, 0.2);
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .form-input {
            transition: all 0.2s ease-in-out;
            border: 1px solid #D1D5DB;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            width: 100%;
        }

        .form-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(55, 73, 106, 0.2);
            border-color: #64748B;
        }
    </style>
@endsection

@section('content')
    <section><!-- Add Employee Form -->
        <form class="mx-10" action="{{ route('manager.worker.store') }}" method="POST" enctype="multipart/form-data">
            <h2 class="mt-8 text-4xl font-bold text-blue-950 ">Tambah Karyawan</h2>
            @csrf
            <div class="mt-8">
                <label for="name" class="block text-xl font-medium text-zinc-400 mb-2">Nama Lengkap</label>
                <input type="text" id="name" name="name"
                    class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
            </div>

            <div class="mt-5 max-md:mt-10">
                <label for="username" class="block text-xl font-medium text-zinc-400 mb-2">Username</label>
                <input type="text" id="username" name="username"
                    class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
            </div>

            <div class="flex flex-wrap gap-10 mt-5">
                <div class="flex-1">
                    <label for="email" class="block text-xl font-medium text-zinc-400 mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
                </div>
                <div class="flex-1">
                    <label for="password" class="block text-xl font-medium text-zinc-400 mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
                </div>
            </div>

            <div class="mt-5">
                <label for="role" class="block form-label text-xl font-medium text-zinc-400 mb-2">Role</label>
                <select id="role" name="role" class="w-full text-lg py-2 form-input">
                    <option value="-" selected disabled>Pilih Role</option>
                    <option value="cashier">Kasir</option>
                    <option value="warehouse">Gudang</option>
                </select>
            </div>

            <div class="mt-5">
                <label for="projectPhoto" class="block text-xl font-medium text-zinc-400 mb-2">Foto Profil</label>
                <div class="flex items-center gap-3">
                    <label for="projectPhoto"
                        class="px-6 py-2 border border-zinc-600 text-sm font-medium cursor-pointer hover:bg-slate-100">Choose
                        file</label>
                    <span id="fileNameDisplay" class="text-zinc-500 text-sm">No file chosen</span>
                    <input type="file" id="projectPhoto" name="photo" class="hidden" />
                </div>
            </div>

            <div class="flex items-center gap-5 mt-7">
                <a href="{{ route('manager.worker.index') }}"
                    class="px-9 py-5 border border-zinc-600 text-sm font-medium rounded-lg hover:bg-slate-100 btn-hover">Batal</a>
                <button type="submit" class="px-5 py-4 text-xl font-bold text-white rounded-2xl bg-slate-600 btn-hover">
                    Tambah Karyawan
                </button>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script>
        // Display selected file name
        document.getElementById("projectPhoto").addEventListener("change", function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : "No file chosen";
            document.getElementById("fileNameDisplay").textContent = fileName;
        });

        // Highlight active nav link on click (optional)
        document.querySelectorAll("nav a").forEach((link) => {
            link.addEventListener("click", (e) => {
                document.querySelectorAll("nav a").forEach((el) =>
                    el.classList.remove("bg-white", "text-slate-600")
                );
                e.currentTarget.classList.add("bg-white", "text-slate-600");
            });
        });
    </script>
@endsection
