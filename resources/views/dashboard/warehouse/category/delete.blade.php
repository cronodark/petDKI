
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Category - PetDKI Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap"
      rel="stylesheet"
    />
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

              <!-- Category Link (Active) -->
              <a
                href="#"
                class="flex gap-7 self-stretch px-3 py-2 mt-6 whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/237f308df8c058ea93ea187bfa2a5d451aba436e?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Category icon"
                  class="object-contain shrink-0 aspect-square w-[57px]"
                />
                <span class="grow shrink my-auto w-[217px]">Category</span>
              </a>

              <!-- Supplier Link -->
              <a
                href="#"
                class="flex gap-9 mt-8 ml-7 whitespace-nowrap max-md:ml-2.5 hover:bg-slate-500 hover:text-white transition-colors
"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/fa02d89afe22dc32abdedbcba692863d0533535d?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Supplier icon"
                  class="object-contain shrink-0 aspect-square w-[39px]"
                />
                <span class="my-auto basis-auto">Supplier</span>
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


          <!-- Main Content Column -->
          <section class="ml-5 w-[73%] max-md:ml-0 max-md:w-full">
            <div
              class="mt-3.5 w-full font-medium max-md:mt-10 max-md:max-w-full"
            >
              <!-- Category Header -->
              <div
                class="flex flex-wrap gap-5 justify-between w-full font-bold max-md:max-w-full"
              >
                <h2 class="my-auto text-4xl text-blue-950">Category</h2>

                <!-- Action Buttons -->
                <div class="flex gap-8 text-xl max-md:max-w-full">
                  <button
                    class="flex gap-5 items-start px-8 py-5 whitespace-nowrap rounded-2xl bg-slate-100 text-slate-600 max-md:px-5 transition-all hover-scale"
                    id="filter-button"
                  >
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/79b06fa2143a2bb4e5e38ba8c04f684cc5405367?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                      alt="Filter icon"
                      class="object-contain shrink-0 aspect-[0.87] w-[27px]"
                    />
                    <span>Filter</span>
                    <span class="loading-indicator hidden ml-2">
                      <svg
                        class="animate-spin h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                      >
                        <circle
                          class="opacity-25"
                          cx="12"
                          cy="12"
                          r="10"
                          stroke="currentColor"
                          stroke-width="4"
                        ></circle>
                        <path
                          class="opacity-75"
                          fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        ></path>
                      </svg>
                    </span>
                  </button>
                  <button
                    class="flex gap-4 px-6 py-6 text-white rounded-2xl bg-slate-600 max-md:px-5 transition-all hover-brightness"
                    id="add-product-button"
                  >
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/047a16e4226a215254279b8d74a91fce1448fade?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                      alt="Add icon"
                      class="object-contain shrink-0 w-6 aspect-square"
                    />
                    <span class="basis-auto">Add Product</span>
                  </button>
                </div>
              </div>

              <!-- Category Table -->
              <div
                class="flex flex-col pb-8 mt-10 w-full text-xl rounded-2xl bg-slate-100 max-md:max-w-full"
              >
              <!-- Table Header -->
<div class="flex px-20 py-7 w-full text-amber-200 rounded-2xl bg-slate-600 max-md:px-5 max-md:max-w-full">
  <div class="w-[25%] text-left flex">ID</div>
  <div class="w-[45%] text-right flex items-center gap-2">
    <span>Category name</span>
    <img
      src="https://cdn.builder.io/api/v1/image/assets/TEMP/bfc8ac303e495365091f5c7686d5c013283816d4?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
      alt="Sort icon"
      class="w-[7px] mt-1"
    />
  </div>
  <div class="w-[30%] text-center">Action</div>
</div>

<!-- Table Row (Repeat this block for each row) -->
<div class="flex px-20 mt-7 w-full items-center max-md:px-5 max-w-full">
  <div class="w-[25%] text-left text-slate-600">Trans-220</div>
  <div class="w-[45%] text-left text-slate-600">Category 1</div>
  <div class="w-[30%] flex justify-center gap-4 whitespace-nowrap">
    <button
      class="px-6 py-2 rounded-xl border-2 border-slate-600 text-slate-600 transition-all hover:scale-105"
    >
      Edit
    </button>
    <button
      class="px-6 py-2 text-white bg-red-600 rounded-xl transition-all hover:brightness-110"
    >
      Delete
    </button>
  </div>
</div>

<div class="flex px-20 mt-7 w-full items-center max-md:px-5 max-w-full">
  <div class="w-[25%] text-left text-slate-600">Trans-220</div>
  <div class="w-[45%] text-left text-slate-600">Category 1</div>
  <div class="w-[30%] flex justify-center gap-4 whitespace-nowrap">
    <button
      class="px-6 py-2 rounded-xl border-2 border-slate-600 text-slate-600 transition-all hover:scale-105"
    >
      Edit
    </button>
    <button
      class="px-6 py-2 text-white bg-red-600 rounded-xl transition-all hover:brightness-110"
    >
      Delete
    </button>
  </div>
</div>

<div class="flex px-20 mt-7 w-full items-center max-md:px-5 max-w-full">
  <div class="w-[25%] text-left text-slate-600">Trans-220</div>
  <div class="w-[45%] text-left text-slate-600">Category 1</div>
  <div class="w-[30%] flex justify-center gap-4 whitespace-nowrap">
    <button
      class="px-6 py-2 rounded-xl border-2 border-slate-600 text-slate-600 transition-all hover:scale-105"
    >
      Edit
    </button>
    <button
      class="px-6 py-2 text-white bg-red-600 rounded-xl transition-all hover:brightness-110"
    >
      Delete
    </button>
  </div>
</div>

<div class="flex px-20 mt-7 w-full items-center max-md:px-5 max-w-full">
  <div class="w-[25%] text-left text-slate-600">Trans-220</div>
  <div class="w-[45%] text-left text-slate-600">Category 1</div>
  <div class="w-[30%] flex justify-center gap-4 whitespace-nowrap">
    <button
      class="px-6 py-2 rounded-xl border-2 border-slate-600 text-slate-600 transition-all hover:scale-105"
    >
      Edit
    </button>
    <button
      class="px-6 py-2 text-white bg-red-600 rounded-xl transition-all hover:brightness-110"
    >
      Delete
    </button>
  </div>
</div>

<div class="flex px-20 mt-7 w-full items-center max-md:px-5 max-w-full">
  <div class="w-[25%] text-left text-slate-600">Trans-220</div>
  <div class="w-[45%] text-left text-slate-600">Category 1</div>
  <div class="w-[30%] flex justify-center gap-4 whitespace-nowrap">
    <button
      class="px-6 py-2 rounded-xl border-2 border-slate-600 text-slate-600 transition-all hover:scale-105"
    >
      Edit
    </button>
    <button
      class="px-6 py-2 text-white bg-red-600 rounded-xl transition-all hover:brightness-110"
    >
      Delete
    </button>
  </div>
</div>

<!-- Divider -->
<hr class="mt-5 border border-gray-300 w-full max-w-full" />


              <!-- Pagination -->
              <nav
                aria-label="Pagination"
                class="flex flex-wrap gap-5 justify-between items-start mt-9 mr-7 ml-7 text-xl whitespace-nowrap text-slate-600 max-md:mr-2.5 max-md:max-w-full"
                id="pagination"
              >
                <a
                  href="#"
                  class="flex gap-3 transition-all hover-scale pagination-link"
                  data-page="prev"
                >
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                    alt="Previous arrow"
                    class="object-contain shrink-0 self-start w-3 aspect-[0.55]"
                  />
                  <span>Previous</span>
                </a>

                <div class="flex gap-5 items-start self-stretch">
                  <a
                    href="#"
                    class="page-number transition-all hover-scale pagination-link"
                    data-page="1"
                    >1</a
                  >
                  <a
                    href="#"
                    class="self-stretch px-2 pt-px pb-2.5 text-white rounded-md bg-slate-600 h-[25px] w-[25px] text-center transition-all hover-brightness pagination-link active"
                    data-page="2"
                    >2</a
                  >
                  <a
                    href="#"
                    class="page-number transition-all hover-scale pagination-link"
                    data-page="3"
                    >3</a
                  >
                </div>

                <a
                  href="#"
                  class="flex gap-3.5 items-start transition-all hover-scale pagination-link"
                  data-page="next"
                >
                  <span>next</span>
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/d15578e15c255f9ec78c7db8e35631674a3faa8b?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                    alt="Next arrow"
                    class="object-contain shrink-0 w-3 aspect-[0.55]"
                  />
                </a>
              </nav>
            </div>
          </section>
        </div>
      </div>
    </main>

    

      <!-- Delete Modal -->
      <div
        class="flex fixed top-0 left-0 justify-center items-center backdrop-blur-[7.5px] bg-black bg-opacity-40 size-full"
      >
        <div
          class="relative p-10 mt-24 text-center bg-white rounded-3xl w-[748px] max-sm:m-5 max-sm:w-[90%]"
        >
          <div class="absolute left-2/4 -translate-x-2/4 top-[-102px]">
            <svg
              width="204"
              height="204"
              viewBox="0 0 204 204"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="modal-circle"
            >
              <circle cx="102" cy="102" r="102" fill="#F6D5D4"></circle>
            </svg>
            <svg
              width="126"
              height="126"
              viewBox="0 0 126 126"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="modal-trash-icon absolute top-[39px] left-1/2 -translate-x-1/2"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M89.25 26.25V21C89.25 18.2152 88.1438 15.5445 86.1746 13.5754C84.2055 11.6062 81.5348 10.5 78.75 10.5H47.25C44.4652 10.5 41.7945 11.6062 39.8254 13.5754C37.8562 15.5445 36.75 18.2152 36.75 21V26.25H21C19.6076 26.25 18.2723 26.8031 17.2877 27.7877C16.3031 28.7723 15.75 30.1076 15.75 31.5C15.75 32.8924 16.3031 34.2277 17.2877 35.2123C18.2723 36.1969 19.6076 36.75 21 36.75H26.25V94.5C26.25 98.6772 27.9094 102.683 30.8631 105.637C33.8168 108.591 37.8228 110.25 42 110.25H84C88.1772 110.25 92.1832 108.591 95.1369 105.637C98.0906 102.683 99.75 98.6772 99.75 94.5V36.75H105C106.392 36.75 107.728 36.1969 108.712 35.2123C109.697 34.2277 110.25 32.8924 110.25 31.5C110.25 30.1076 109.697 28.7723 108.712 27.7877C107.728 26.8031 106.392 26.25 105 26.25H89.25ZM78.75 21H47.25V26.25H78.75V21ZM89.25 36.75H36.75V94.5C36.75 95.8924 37.3031 97.2277 38.2877 98.2123C39.2723 99.1969 40.6076 99.75 42 99.75H84C85.3924 99.75 86.7277 99.1969 87.7123 98.2123C88.6969 97.2277 89.25 95.8924 89.25 94.5V36.75Z"
                fill="#FF3A4C"
              ></path>
              <path
                d="M47.25 47.25H57.75V89.25H47.25V47.25ZM68.25 47.25H78.75V89.25H68.25V47.25Z"
                fill="#FF3A4C"
              ></path>
            </svg>
          </div>
          <div class="mt-32">
            <h2 class="mb-4 text-4xl font-bold text-slate-600">
              You are about to delete a Category
            </h2>
            <p class="mb-9 text-2xl text-slate-600">
              <span>This will delete your Category</span>
              <br />
              <span>are you sure?</span>
            </p>
            <div
              class="flex justify-between px-16 py-0 max-sm:flex-col max-sm:gap-4 max-sm:px-5 max-sm:py-0"
            >
              <button
                class="text-2xl font-bold rounded-2xl cursor-pointer bg-slate-100 border-[none] h-[73px] text-slate-600 w-[294px] max-sm:w-full"
              >
                Cancel
              </button>
              <button
                class="px-8 py-2.5 text-2xl font-bold text-white bg-red-600 rounded-2xl cursor-pointer border-[none] h-[73px] w-[294px] max-sm:w-full"
              >
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Simple script to toggle mobile menu
      document.addEventListener("DOMContentLoaded", function () {
        // Mobile menu toggle functionality could be added here
        // This is a placeholder for potential JavaScript functionality
      });
    </script>
  </body>
</html>
