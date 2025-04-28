@extends('layouts.store')
@section('styles')
@endsection

@section('content')
    <section class="mx-10">
        <!-- Add Employee Form -->
        <form class="w-full" action="{{ route('manager.worker.update', $worker->id) }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            <h2 class="mt-7 text-4xl font-bold text-blue-950">Edit Karyawan</h2>
            <div class="mt-10">
                <label for="fullName" class="block text-xl font-medium text-zinc-400 mb-2">Nama Lengkap</label>
                <input type="text" id="fullName" name="fullName"
                    class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" value="{{ $worker->name }}" />
            </div>

            <div class="mt-5">
                <label for="username" class="block text-xl font-medium text-zinc-400 mb-2">Username</label>
                <input type="text" id="username" name="username"
                    class="w-full border-b border-gray-400 focus:outline-none text-lg py-2"
                    value="{{ $worker->username }}" />
            </div>

            <div class="flex flex-wrap gap-10 mt-5">
                <div class="flex-1">
                    <label for="email" class="block text-xl font-medium text-zinc-400 mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full border-b border-gray-400 focus:outline-none text-lg py-2"
                        value="{{ $worker->email }}" />
                </div>
                <div class="flex-1">
                    <label for="password" class="block text-xl font-medium text-zinc-400 mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border-b border-gray-400 focus:outline-none text-lg py-2"
                        placeholder="Biarkan kosong jika tidak merubah password" />
                </div>
            </div>

            <div class="mt-5">
                <label for="role" class="block text-xl font-medium text-zinc-400 mb-2">Role</label>
                <select id="role" name="role" class="w-full focus:outline-none text-lg py-2">
                    <option value="-" disabled {{ old('role', $worker->role ?? '') == '-' ? 'selected' : '' }}>Pilih
                        Role</option>
                    <option value="cashier" {{ old('role', $worker->role ?? '') == 'cashier' ? 'selected' : '' }}>Kasir
                    </option>
                    <option value="warehouse" {{ old('role', $worker->role ?? '') == 'warehouse' ? 'selected' : '' }}>Gudang
                    </option>
                </select>
            </div>

            <div class="mt-5">
                <label for="projectPhoto" class="block text-xl font-medium text-zinc-400 mb-2">Foto Profil</label>
                <div class="flex items-center gap-3">
                    <label for="projectPhoto"
                        class="px-6 py-2 border border-zinc-600 text-sm font-medium cursor-pointer hover:bg-slate-100">
                        Choose file
                    </label>
                    <span id="fileNameDisplay" class="text-zinc-500 text-sm">No file chosen</span>
                    <input type="file" id="projectPhoto" name="photo" class="hidden" />
                </div>
            </div>
            <div class="flex items-center gap-5 mt-7">
                <a href="{{ route('manager.worker.index') }}"
                    class="px-9 py-5 border border-zinc-600 text-sm font-medium rounded-lg hover:bg-slate-100 btn-hover">Batal</a>
                <button type="submit"
                    class="px-5 py-4 mt-1 text-xl font-bold text-white rounded-2xl bg-slate-600 btn-hover">
                    Edit Karyawan
                </button>
            </div>
        </form>
    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputFile = document.getElementById('projectPhoto');
            console.log(inputFile);

            const fileNameDisplay = document.getElementById('fileNameDisplay');
            console.log(fileNameDisplay);

            if (inputFile) {
                inputFile.addEventListener('change', function() {
                    const fileName = this.files[0] ? this.files[0].name : "No file chosen";
                    fileNameDisplay.textContent = fileName;
                });
            }
        });
    </script>
@endsection
