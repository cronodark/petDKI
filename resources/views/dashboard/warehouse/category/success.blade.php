
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

      <!-- Success Modal -->
      <div
        class="flex fixed top-0 left-0 justify-center items-center backdrop-blur-[7.5px] bg-black bg-opacity-40 size-full z-[1000]"
      >
        <div class="relative h-[431px] w-[748px] max-sm:h-auto max-sm:w-[90%]">
          <!-- Success Icon -->
          <div class="absolute top-0 left-2/4 -translate-x-2/4">
            <svg
              width="204"
              height="204"
              viewBox="0 0 204 204"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="success-circle"
            >
              <circle cx="102" cy="102" r="102" fill="#D7F6D4"></circle>
            </svg>

            <svg
              width="107"
              height="107"
              viewBox="0 0 107 107"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="success-check"
              style="position: absolute; top: 42px; left: 48px"
            >
              <path
                d="M91.2622 25.1003C93.0009 26.8391 93.0009 29.6032 91.2622 31.342L40.7047 81.8995C40.2966 82.3125 39.8107 82.6404 39.275 82.8642C38.7393 83.088 38.1644 83.2033 37.5839 83.2033C37.0033 83.2033 36.4285 83.088 35.8927 82.8642C35.357 82.6404 34.8711 82.3125 34.463 81.8995L15.738 63.1745C15.325 62.7664 14.9971 62.2805 14.7733 61.7448C14.5495 61.209 14.4342 60.6342 14.4342 60.0536C14.4342 59.4731 14.5495 58.8983 14.7733 58.3625C14.9971 57.8268 15.325 57.3409 15.738 56.9328C16.1461 56.5198 16.632 56.1919 17.1677 55.9681C17.7035 55.7443 18.2783 55.629 18.8588 55.629C19.4394 55.629 20.0142 55.7443 20.55 55.9681C21.0857 56.1919 21.5716 56.5198 21.9797 56.9328L37.5839 72.537L85.0205 25.1003C85.4286 24.6873 85.9145 24.3594 86.4502 24.1356C86.986 23.9118 87.5608 23.7965 88.1414 23.7965C88.7219 23.7965 89.2967 23.9118 89.8325 24.1356C90.3682 24.3594 90.8541 24.6873 91.2622 25.1003ZM81.8551 15.6487L37.5839 59.9199L25.1451 47.4811C21.6676 44.0036 16.0055 44.0036 12.528 47.4811L6.28635 53.7228C2.80885 57.2003 2.80885 62.8624 6.28635 66.3399L31.253 91.3066C34.7305 94.7841 40.3926 94.7841 43.8701 91.3066L100.714 34.5074C104.191 31.0299 104.191 25.3678 100.714 21.8903L94.4722 15.6487C90.9501 12.1712 85.3326 12.1712 81.8551 15.6487Z"
                fill="#05CD99"
              ></path>
            </svg>
          </div>

          <!-- Success Message -->
          <div
            class="flex flex-col gap-4 justify-center items-center mt-24 bg-white rounded-3xl h-[335px] shadow-[0_0_8px_rgba(0,0,0,0.5)] w-[748px] max-sm:p-5 max-sm:w-full"
          >
            <h2
              class="text-4xl font-bold text-slate-600 max-sm:text-2xl max-sm:text-center"
            >
              Category added successfully!
            </h2>
            <p
              class="text-2xl font-medium text-slate-600 max-sm:text-lg max-sm:text-center"
            >
              The category has been successfully added
            </p>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
