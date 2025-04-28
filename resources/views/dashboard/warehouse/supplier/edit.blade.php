<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet DKI - Edit Supplier</title>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Paytone+One&display=swap"
      rel="stylesheet"
    />
    <!-- Tabler Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css"
    />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
    <style>
      body {
        font-family: "Montserrat", sans-serif;
      }
      input:focus {
        outline: none;
      }
    </style>
  </head>
  <body class="bg-white">
    <main class="pt-16 pr-16 bg-white max-md:pr-5">
      <div class="flex gap-5 max-md:flex-col">
        <!-- Sidebar Navigation -->
        <aside class="w-[27%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col grow items-center text-2xl font-medium text-white max-md:mt-10"
          >
            <!-- Logo -->
            <h1 class="text-6xl text-slate-600 max-md:text-4xl">
              <span
                style="
                  font-family:
                    &quot;Paytone One&quot;,
                    -apple-system,
                    Roboto,
                    Helvetica,
                    sans-serif;
                  font-weight: 400;
                  color: rgba(55, 73, 106, 1);
                "
              >
                Pet
              </span>
              <span
                style="
                  font-family:
                    &quot;Paytone One&quot;,
                    -apple-system,
                    Roboto,
                    Helvetica,
                    sans-serif;
                  font-weight: 400;
                "
              >
                DKI
              </span>
            </h1>
            <p class="mt-7 font-bold">PET DKI</p>

            <!-- Navigation Menu -->
            <nav
              class="flex flex-col items-start self-stretch py-24 pl-6 mt-1.5 w-full rounded-none bg-slate-600 max-md:pt-24 max-md:pl-5"
            >
              <!-- Dashboard Link -->
              <a
                href="#"
                class="flex gap-6 ml-8 whitespace-nowrap max-md:ml-2.5 hover:bg-slate-500 hover:text-white transition-colors
"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/8eba9542dfd6c4b68e040005284adc0ea420d6ee?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Dashboard icon"
                  class="object-contain shrink-0 aspect-square w-[46px]"
                />
                <span class="my-auto basis-auto">Dashboard</span>
              </a>

              <!-- Product Link -->
              <a
                href="#"
                class="flex gap-6 mt-8 ml-5 whitespace-nowrap max-md:ml-2.5 hover:bg-slate-500 hover:text-white transition-colors
"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/e3ef52a45bf51982d6b8274d2c0594b418e2a285?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Product icon"
                  class="object-contain shrink-0 w-14 aspect-square"
                />
                <span class="my-auto">Product</span>
              </a>

              <!-- Category Link -->
              <a
                href="#"
                class="flex gap-6 mt-8 ml-5 whitespace-nowrap max-md:ml-2.5 hover:bg-slate-500 hover:text-white transition-colors"
              >
                <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/237f308df8c058ea93ea187bfa2a5d451aba436e?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
              alt="Category icon"
              class="object-contain shrink-0 aspect-square w-[57px] filter invert brightness-0"
            />

                <span class="grow shrink my-auto w-[217px]">Category</span>
              </a>

              <!-- Supplier Link (Now Active Style) -->
              <a
                href="#"
                class="flex gap-9 self-stretch px-3 py-2 mt-8 whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600"
              >
              <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/fa02d89afe22dc32abdedbcba692863d0533535d?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
            alt="Supplier icon"
            class="object-contain shrink-0 aspect-square w-[39px] filter sepia-0 hue-rotate-180 saturate-200"
          />


                <span class="grow shrink my-auto w-[217px]">Supplier</span>
              </a>


              <!-- Logout Link -->
              <a
                href="#"
                class="flex gap-7 mt-72 ml-7 max-md:mt-10 max-md:ml-2.5 hover:bg-slate-500 hover:text-white transition-colors
"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/04ad8c16e664b76d36b2c490786e60f8324c8ef9?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Logout icon"
                  class="object-contain shrink-0 aspect-[0.89] w-[34px]"
                />
                <span class="self-start">Log out</span>
              </a>
            </nav>
          </div>
        </aside>

        <!-- Main Content Area -->
        <section class="ml-5 w-[73%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col items-start mt-2 w-full max-md:mt-10 max-md:max-w-full"
          >
            <!-- Header with Search and Profile -->
            <header
              class="flex flex-wrap gap-10 self-stretch w-full whitespace-nowrap max-md:max-w-full"
            >
              <!-- Search Bar -->
              <div
                class="flex flex-wrap flex-auto gap-10 px-8 py-2.5 text-xl text-gray-400 rounded-3xl bg-slate-100 max-md:px-5 max-md:max-w-full"
              >
                <span class="my-auto">Search</span>
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/6aca5d100837687e9f315d38b6dd97d8c6544c12?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Search icon"
                  class="object-contain shrink-0 w-10 aspect-square"
                />
              </div>

              <!-- Admin Profile -->
              <div class="flex shrink gap-5 basis-auto grow-0 text-slate-600">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/78b5def8285e555841750262ff5e88d725c9056a?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Admin profile"
                  class="object-contain shrink-0 rounded-full aspect-square w-[59px]"
                />
                <div class="flex flex-col self-start mt-1">
                  <h2 class="self-start text-xl font-bold">Admin</h2>
                  <p class="mt-3.5 text-base">LoremIpsum@gmail.com</p>
                </div>
              </div>
            </header>

      <!-- Main Content - Add Supplier Form -->
      <section class="px-5 pt-12 pb-12 w-full">

        <h2 class="mb-12 text-4xl font-bold text-blue-950 max-sm:text-3xl">
          Edit Supplier
        </h2>

        <form class="max-w-[914px]">
          <div class="mb-14">
            <input
              type="text"
              placeholder="Supplier Name"
              class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
            />
          </div>

          <div class="mb-14">
            <input
              type="text"
              placeholder="Address"
              class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
            />
          </div>

          <div class="flex gap-20 mb-14 max-sm:flex-col max-sm:gap-5">
            <div class="flex-1">
              <input
                type="text"
                placeholder="Latitude"
                class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
              />
            </div>
            <div class="flex-1">
              <input
                type="text"
                placeholder="Longitude"
                class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
              />
            </div>
          </div>

          <div class="mb-14">
            <input
              type="text"
              placeholder="Phone Number"
              class="pb-2.5 w-full text-xl border-b border-solid border-b-gray-400 text-zinc-400 bg-transparent"
            />
          </div>

          <button
            type="submit"
            class="text-xl font-bold text-white rounded-2xl cursor-pointer bg-slate-600 border-[none] h-[73px] w-[171px]"
          >
            Edit Supplier
          </button>
        </form>
      </section>
    </main>
  </body>
</html>
