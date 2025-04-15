@extends('layouts.app')

@section('content')
<link
  href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Montserrat:wght@400;500;700&display=swap"
  rel="stylesheet"
/>
<main class="flex w-full h-screen bg-white min-h-[720px] max-md:flex-col">
  <!-- Background Section -->
  <section
    class="relative max-w-[1280px] max-md:w-full max-md:h-[300px] max-sm:h-[200px]"
  >
    <img
      src="https://cdn.builder.io/api/v1/image/assets/TEMP/e3c860a263c834a46500108bd471e7f1653f0eed"
      alt="Background"
      class="object-cover rounded-none size-full max-md:rounded-none"
    />
    <h1
      class="absolute text-6xl text-white font-['Paytone_One'] left-[61px] top-[66px] max-md:text-4xl max-md:left-[30px] max-md:top-[30px] max-sm:top-5 max-sm:left-5 max-sm:text-3xl"
    >
      Pet DKI
    </h1>
  </section>

  <!-- Login Form Section -->
  <section class="flex flex-1 justify-center items-center">
    <div
      class="p-5 w-[500px] max-md:px-3 max-md:py-20 max-md:w-full max-md:max-w-[500px]"
    >
      <h2
        class="mb-10 text-3xl font-bold font-['Montserrat'] text-center text-blue-950 max-md:mb-10 max-md:text-4xl max-sm:mb-8 max-sm:text-3xl"
      >
        Login
      </h2>

      <!-- Form -->
      <form action="{{ route('auth') }}" method="POST" class="flex flex-col gap-6">
        @csrf

        <!-- Username Input -->
        <input
          type="text"
          id="identifier"
          name="identifier"
          placeholder="Username/Email"
          aria-label="Username/Email"
          required
          class="px-6 py-0 w-full h-12 text-xl font-['Montserrat'] rounded-xl border-2 border-solid border-slate-600 text-slate-600 max-sm:text-lg max-sm:h-[60px]"
        />

        <!-- Password Input -->
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Password"
          aria-label="Password"
          required
          class="px-6 py-0 w-full h-12 text-xl font-['Montserrat'] rounded-xl border-2 border-solid border-slate-600 text-slate-600 max-sm:text-lg max-sm:h-[60px]"
        />

        <!-- Login Button -->
        <button
          type="submit"
          class="text-xl font-bold font-['Montserrat'] text-white rounded-2xl cursor-pointer bg-slate-600 border-[none] h-[50px] w-[240px] max-sm:mt-8 max-sm:w-full max-sm:text-lg max-sm:h-[50px] hover:bg-slate-700 transition-colors"
        >
          Login
        </button>
      </form>
    </div>
  </section>
</main>
@endsection