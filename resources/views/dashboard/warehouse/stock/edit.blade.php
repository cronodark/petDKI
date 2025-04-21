<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Product - PetDKI Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap"
      rel="stylesheet"
    />
    <style>
      .paytone-font {
        font-family:
          "Paytone One",
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 400;
      }
      .paytone-blue {
        color: rgba(55, 73, 106, 1);
      }
    </style>
  </head>
  <body class="bg-white">
    <div class="pt-16 pr-16 bg-white max-md:pr-5" data-el="ui-edit-stock">
      <div class="flex gap-5 max-md:flex-col">
        <!-- Sidebar -->
        <aside class="w-[27%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col grow items-center text-2xl font-medium text-white max-md:mt-10"
          >
            <!-- Logo -->
            <header class="text-6xl text-slate-600 max-md:text-4xl">
              <span class="paytone-font paytone-blue">Pet</span>
              <span class="paytone-font">DKI</span>
            </header>
            <h2 class="mt-7 font-bold">PET DKI</h2>

            <!-- Navigation Menu -->
            <nav
              class="flex flex-col items-start self-stretch py-24 pl-6 mt-1.5 w-full rounded-none bg-slate-600 max-md:pt-24 max-md:pl-5"
            >
              <!-- Dashboard -->
              <a
                href="#"
                class="flex gap-6 ml-8 whitespace-nowrap max-md:ml-2.5 items-center hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 rounded-md p-2"
                aria-label="Dashboard"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/8eba9542dfd6c4b68e040005284adc0ea420d6ee?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 aspect-square w-[46px]"
                  aria-hidden="true"
                />
                <span class="my-auto basis-auto">Dashboard</span>
              </a>

              <!-- Product (Active) -->
              <a
                href="#"
                class="flex gap-6 self-stretch px-5 py-2.5 mt-7 whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600 max-md:px-5 items-center focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-opacity-50"
                aria-label="Product"
                aria-current="page"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/7c5b7d79407c5d48dbb45b7fdc33a6f8e67a996e?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 w-14 aspect-square"
                  aria-hidden="true"
                />
                <span class="grow shrink my-auto w-[204px]">Product</span>
              </a>

              <!-- Category -->
              <a
                href="#"
                class="flex gap-7 mt-6 ml-5 whitespace-nowrap max-md:ml-2.5 items-center hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 rounded-md p-2"
                aria-label="Category"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/548b707ddd96eedffe6992b0b8fe49a0a246a96e?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 aspect-square w-[54px]"
                  aria-hidden="true"
                />
                <span class="my-auto basis-auto">Category</span>
              </a>

              <!-- Supplier -->
              <a
                href="#"
                class="flex gap-9 mt-10 ml-7 whitespace-nowrap max-md:mt-10 max-md:ml-2.5 items-center hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 rounded-md p-2"
                aria-label="Supplier"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/fa02d89afe22dc32abdedbcba692863d0533535d?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 aspect-square w-[39px]"
                  aria-hidden="true"
                />
                <span class="my-auto basis-auto">Supplier</span>
              </a>

              <!-- Log out -->
              <a
                href="#"
                class="flex gap-7 mt-72 ml-7 max-md:mt-10 max-md:ml-2.5 items-center hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 rounded-md p-2"
                aria-label="Log out"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/04ad8c16e664b76d36b2c490786e60f8324c8ef9?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 aspect-[0.89] w-[34px]"
                  aria-hidden="true"
                />
                <span class="self-start">Log out</span>
              </a>
            </nav>
          </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-5 w-[73%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col items-start mt-2 w-full max-md:mt-10 max-md:max-w-full"
          >
            <!-- Top Bar with Search and Profile -->
            <header
              class="flex flex-wrap gap-10 self-stretch w-full whitespace-nowrap max-md:max-w-full"
            >
              <!-- Search Bar -->
              <div
                class="flex flex-wrap flex-auto gap-10 px-8 py-2.5 text-xl text-gray-400 rounded-3xl bg-slate-100 max-md:px-5 max-md:max-w-full"
              >
                <label for="search" class="sr-only">Search</label>
                <span class="my-auto">Search</span>
                <button
                  type="button"
                  aria-label="Search"
                  class="focus:outline-none focus:ring-2 focus:ring-slate-400"
                >
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6aca5d100837687e9f315d38b6dd97d8c6544c12?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                    alt=""
                    class="object-contain shrink-0 w-10 aspect-square"
                    aria-hidden="true"
                  />
                </button>
              </div>

              <!-- Admin Profile -->
              <div class="flex shrink gap-5 basis-auto grow-0 text-slate-600">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/78b5def8285e555841750262ff5e88d725c9056a?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Admin profile picture"
                  class="object-contain shrink-0 rounded-full aspect-square w-[59px]"
                />
                <div class="flex flex-col self-start mt-1">
                  <h2 class="self-start text-xl font-bold">Admin</h2>
                  <p class="mt-3.5 text-base">LoremIpsum@gmail.com</p>
                </div>
              </div>
            </header>

            <!-- Edit Product Form -->
            <form>
              <h1 class="mt-20 text-4xl font-bold text-blue-950 max-md:mt-10">
                Edit Product
              </h1>

              <!-- Product Name Field -->
              <div class="mt-16 max-md:mt-10">
                <label
                  for="product-name"
                  class="text-xl font-medium text-zinc-400"
                  >Product Name</label
                >
                <div class="relative">
                  <input
                    type="text"
                    id="product-name"
                    class="w-full mt-2 pb-1 focus:outline-none"
                    aria-required="true"
                  />
                  <div
                    class="shrink-0 mt-2 max-w-full h-px border border-gray-400 border-solid w-[914px]"
                  ></div>
                </div>
              </div>

              <!-- SKU Field -->
              <div class="mt-14 max-md:mt-10">
                <label for="sku" class="text-xl font-medium text-zinc-400"
                  >SKU</label
                >
                <div class="relative">
                  <input
                    type="text"
                    id="sku"
                    class="w-full mt-2 pb-1 focus:outline-none"
                    aria-required="true"
                  />
                  <div
                    class="shrink-0 mt-2 max-w-full h-px border border-gray-400 border-solid w-[914px]"
                  ></div>
                </div>
              </div>

              <!-- Price and Stock Fields (side by side) -->
              <div
                class="flex flex-wrap gap-10 mt-16 max-w-full text-xl font-medium whitespace-nowrap text-zinc-400 w-[915px] max-md:mt-10"
              >
                <!-- Price Field -->
                <div class="flex flex-col flex-1 grow shrink-0 basis-0 w-fit">
                  <label for="price" class="self-start">Price</label>
                  <div class="relative">
                    <input
                      type="text"
                      id="price"
                      class="w-full mt-2 pb-1 focus:outline-none"
                      aria-required="true"
                    />
                    <div
                      class="shrink-0 mt-2 max-w-full h-px border border-gray-400 border-solid w-[417px]"
                    ></div>
                  </div>
                </div>

                <!-- Stock Field -->
                <div
                  class="flex flex-col flex-1 grow shrink-0 self-start basis-0 w-fit"
                >
                  <label for="stock" class="self-start">Stock</label>
                  <div class="relative">
                    <input
                      type="text"
                      id="stock"
                      class="w-full mt-2 pb-1 focus:outline-none"
                      aria-required="true"
                    />
                    <div
                      class="shrink-0 mt-1 max-w-full h-px border border-gray-400 border-solid w-[417px]"
                    ></div>
                  </div>
                </div>
              </div>

              <!-- Category Field with Dropdown -->
              <div class="mt-16 max-md:mt-10">
                <div
                  class="flex flex-wrap gap-5 justify-between max-w-full text-xl font-medium whitespace-nowrap text-zinc-400 w-[904px]"
                >
                  <label for="category" class="self-start">Category</label>
                  <button
                    type="button"
                    aria-label="Open category dropdown"
                    class="focus:outline-none focus:ring-2 focus:ring-slate-400 rounded"
                  >
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/b3b2d34d0646fedc6499723e797c71622c0a489b?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                      alt=""
                      class="object-contain shrink-0 self-start mt-2 aspect-[1.75] w-[21px]"
                      aria-hidden="true"
                    />
                  </button>
                </div>
                <div class="relative">
                  <select
                    id="category"
                    class="w-full mt-2 pb-1 opacity-0 absolute"
                    aria-required="true"
                  >
                    <option value="">Select a category</option>
                  </select>
                  <div
                    class="shrink-0 mt-2 max-w-full h-px border border-gray-400 border-solid w-[914px]"
                  ></div>
                </div>
              </div>

              <!-- Description Field -->
              <div class="mt-14 max-md:mt-10">
                <label
                  for="description"
                  class="text-xl font-medium text-zinc-400"
                  >Deskripsi</label
                >
                <div class="relative">
                  <textarea
                    id="description"
                    class="w-full mt-2 pb-1 focus:outline-none"
                    rows="1"
                  ></textarea>
                  <div
                    class="shrink-0 mt-1 max-w-full h-px border border-gray-400 border-solid w-[914px]"
                  ></div>
                </div>
              </div>

              <!-- Project Photo Upload -->
              <div class="mt-14 max-md:mt-10">
                <label
                  for="project-photo"
                  class="text-xl font-medium text-zinc-400"
                  >Project Photo</label
                >
                <div class="flex gap-3 mt-6 text-xl text-zinc-400">
                  <label
                    for="project-photo"
                    class="px-9 py-1.5 border border-solid border-zinc-600 max-md:px-5 cursor-pointer hover:bg-slate-100 focus-within:ring-2 focus-within:ring-slate-400"
                  >
                    Chose file
                    <input
                      type="file"
                      id="project-photo"
                      class="hidden"
                      accept="image/*"
                    />
                  </label>
                  <span class="my-auto basis-auto" id="file-name"
                    >No file chosen</span
                  >
                </div>
              </div>

              <!-- Submit Button -->
              <button
                type="submit"
                class="px-5 py-7 mt-8 text-xl font-bold text-white rounded-2xl bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-opacity-50 transition-colors"
                aria-label="Save changes to product"
              >
                Edit Product
              </button>
            </form>
          </div>
        </main>
      </div>
    </div>

    <script>
      // File upload handling
      document
        .getElementById("project-photo")
        .addEventListener("change", function (e) {
          const fileName = e.target.files[0]
            ? e.target.files[0].name
            : "No file chosen";
          document.getElementById("file-name").textContent = fileName;
        });

      // Initialize the page
      (() => {
        const state = {};
        let nodesToDestroy = [];
        let pendingUpdate = false;

        function destroyAnyNodes() {
          nodesToDestroy.forEach((el) => el.remove());
          nodesToDestroy = [];
        }

        function update() {
          if (pendingUpdate === true) {
            return;
          }
          pendingUpdate = true;

          document
            .querySelectorAll("[data-el='ui-edit-stock']")
            .forEach((el) => {
              el.setAttribute("space", 49);
            });

          destroyAnyNodes();
          pendingUpdate = false;
        }

        // Update with initial state on first load
        update();
      })();
    </script>
  </body>
</html>
