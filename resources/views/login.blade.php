@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-8">
        <h1 class="text-4xl font-bold text-center text-blue-700">Pet DKI</h1>

        <!-- Form -->
        <form action="{{ route('login') }}" method="POST" class="mt-6">
            @csrf
            <!-- Input Username -->
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" id="username" name="username" required
                    class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your username">
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your password">
            </div>

            <!-- Tombol Login -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg transition">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
