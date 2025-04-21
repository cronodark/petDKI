<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
    </style>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            screens: {
              xs: "480px",
              sm: "640px",
              md: "768px",
              lg: "1024px",
              xl: "1280px",
              "2xl": "1536px",
            },
          },
        },
      };
    </script>
  </head>
  <body class="bg-white">
    <main class="bg-white">
      <header class="py-8 px-5 sm:px-8 md:px-16 lg:pl-64 text-4xl font-bold text-white bg-slate-600 max-w-full">
        PET DKI
      </header>

      <div class="mt-0 w-full max-w-[1398px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-6 mt-6">
          <!-- Order Product List - Left Column -->
          <section class="lg:w-[36%] w-full">
            <article class="flex flex-col grow pt-5 pb-24 w-full bg-white shadow-sm rounded-lg">
              <div class="w-full px-4 sm:px-6 md:px-8">
                <div class="flex items-start gap-4">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/20fcf4da14866723cf79e7a82e2cb4ce9b8bbe1d?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                    class="w-[18px] sm:w-[23px] mt-2"
                    alt="Order icon"
                  />
                  <div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-blue-950">#Order-7</h1>
                    <time class="block mt-2 text-sm sm:text-base text-slate-600">Date 19/2/2025 -- 19:00</time>
                  </div>
                </div>
                <hr class="mt-6 border border-gray-400 w-full" />
                <p class="mt-6 text-xl sm:text-2xl font-bold text-right text-blue-950">250.000</p>
              </div>

              <!-- Product List -->
              <div class="px-4 sm:px-6 md:px-8 mt-6 space-y-6">
                <!-- Example Product Item -->
                <div class="flex justify-between">
                  <div class="flex gap-3">
                    <p class="text-lg sm:text-xl font-bold text-blue-950">x 1</p>
                    <div>
                      <h2 class="text-lg sm:text-xl font-bold text-blue-950">Product A</h2>
                      <p class="text-sm text-slate-600">Category 1</p>
                    </div>
                  </div>
                  <p class="text-lg sm:text-xl font-bold text-blue-950">250.000</p>
                </div>

                <div class="flex justify-between">
                  <div class="flex gap-3">
                    <p class="text-lg sm:text-xl font-bold text-blue-950">x 1</p>
                    <div>
                      <h2 class="text-lg sm:text-xl font-bold text-blue-950">Product A</h2>
                      <p class="text-sm text-slate-600">Category 1</p>
                    </div>
                  </div>
                  <p class="text-lg sm:text-xl font-bold text-blue-950">250.000</p>
                </div>
              </div>

              <!-- Summary -->
              <div class="mt-10 px-4 sm:px-6 md:px-8">
                <div class="flex justify-between py-2">
                  <p class="text-sm sm:text-base font-semibold">Sub Total</p>
                  <p class="text-sm sm:text-base font-semibold">Rp. 1.000.000</p>
                </div>
                <div class="flex justify-between py-2">
                  <p class="text-sm sm:text-base font-semibold">Total Discount</p>
                  <p class="text-sm sm:text-base font-semibold">-Rp 0</p>
                </div>
                <div class="flex justify-between py-2">
                  <p class="text-sm sm:text-base font-semibold">Total</p>
                  <p class="text-sm sm:text-base font-semibold">Rp 1.000.000</p>
                </div>
              </div>



              <hr
                class="shrink-0 mt-4 sm:mt-6 md:mt-8 border-gray-400 border-dashed border-[3px] h-[3px] w-[90%] mx-auto"
              />
            </article>
          </section>

          <!-- Right Column - Product Catalog -->
          <section class="lg:w-[64%] w-full">
            <div class="self-stretch my-auto w-full">
              <!-- Search Bar -->
              <div
                class="flex flex-wrap gap-3 sm:gap-5 justify-between px-4 sm:px-6 md:px-10 py-3 sm:py-4 md:py-5 text-lg sm:text-xl md:text-2xl text-gray-400 whitespace-nowrap rounded-xl sm:rounded-2xl md:rounded-3xl bg-slate-100"
              >
                <label for="search" class="self-start">Search</label>
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/c156bbe1f96d6c0f7a24e3bd9192fedad69db7db?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  class="object-contain shrink-0 aspect-[1.02] w-[35px] sm:w-[40px] md:w-[45px]"
                  alt="Search icon"
                />
                <input
                  id="search"
                  type="text"
                  class="hidden"
                  aria-label="Search products"
                />
              </div>

              <!-- Product Grid - Row 1 -->
              <div class="mt-6 sm:mt-8 md:mt-9 mx-auto px-2">
                <div
                  class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-5"
                >
                  <div class="col-span-1">
                    <article
                      class="flex flex-col grow pt-4 sm:pt-5 md:pt-7 w-full text-sm sm:text-base font-bold text-center text-white bg-white rounded-md shadow-sm"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/e93fa90abafa1a8ecbb588a8ddfbaab6a2918288?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                        class="object-contain self-center max-w-full aspect-square w-[80px] sm:w-[100px] md:w-[113px]"
                        alt="Product A"
                      />
                      <h3
                        class="px-2 sm:px-8 md:px-14 pt-2 sm:pt-3 md:pt-3.5 pb-3 sm:pb-4 md:pb-5 mt-2 sm:mt-3 md:mt-4 rounded-none bg-slate-600"
                      >
                        Product A
                      </h3>
                    </article>
                  </div>
                  <div class="col-span-1">
                    <article
                      class="flex flex-col grow pt-3 sm:pt-4 md:pt-5 w-full text-sm sm:text-base font-bold text-center text-white bg-white rounded-md shadow-sm"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/bb639443e804936ef4c9b30479558411e1951fbe?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                        class="object-contain self-center max-w-full aspect-[1.02] w-[90px] sm:w-[110px] md:w-[136px]"
                        alt="Product A"
                      />
                      <h3
                        class="px-2 sm:px-8 md:px-12 pt-2 sm:pt-3 md:pt-3.5 pb-3 sm:pb-4 md:pb-5 rounded-none bg-slate-600"
                      >
                        Product A
                      </h3>
                    </article>
                  </div>
                  <div class="col-span-1">
                    <article
                      class="flex flex-col grow pt-3 sm:pt-3.5 md:pt-4 w-full text-sm sm:text-base font-bold text-center text-white bg-white rounded-md shadow-sm"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/9f459ab0e2b6abe02198d0b8a905ad6d45e31169?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                        class="object-contain self-center aspect-[0.75] w-[70px] sm:w-[80px] md:w-[93px]"
                        alt="Product A"
                      />
                      <h3
                        class="px-2 sm:px-8 md:px-14 pt-2 sm:pt-3 md:pt-3.5 pb-3 sm:pb-4 md:pb-5 mt-2 sm:mt-3 md:mt-3.5 rounded-none bg-slate-600"
                      >
                        Product A
                      </h3>
                    </article>
                  </div>
                  <div class="col-span-1">
                    <article
                      class="flex flex-col grow pt-2 sm:pt-2.5 md:pt-3 w-full text-sm sm:text-base font-bold text-center text-white bg-white rounded-md shadow-sm"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/5b28512ad4d5304da9a58f1a4b038e3951a9b524?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                        class="object-contain self-center max-w-full aspect-square w-[90px] sm:w-[110px] md:w-[130px]"
                        alt="Product A"
                      />
                      <h3
                        class="px-2 sm:px-8 md:px-14 pt-2 sm:pt-3 md:pt-3.5 pb-3 sm:pb-4 md:pb-5 mt-2 sm:mt-3 md:mt-3.5 rounded-none bg-slate-600"
                      >
                        Product A
                      </h3>
                    </article>
                  </div>
                </div>
              </div>

              <!-- Product Grid - Row 2 -->
              <div class="mt-6 sm:mt-8 md:mt-9 mx-auto px-2">
                <div
                  class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-5"
                >
                  <div class="col-span-1">
                    <article
                      class="flex flex-col grow pt-3 sm:pt-4 md:pt-5 w-full text-sm sm:text-base font-bold text-center text-white bg-white rounded-md shadow-sm"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/32a9206fe815dd46abbbef7b96fea166146ad1f7?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                        class="object-contain self-center max-w-full aspect-square w-[90px] sm:w-[110px] md:w-[129px]"
                        alt="Product A"
                      />
                      <h3
                        class="px-2 sm:px-8 md:px-14 pt-2 sm:pt-3 md:pt-3.5 pb-3 sm:pb-4 md:pb-5 mt-1 sm:mt-1.5 md:mt-2 rounded-none bg-slate-600"
                      >
                        Product A
                      </h3>
                    </article>
                  </div>
                  <div class="col-span-1">
                    <article
                      class="flex flex-col grow pt-2 sm:pt-3 md:pt-3.5 w-full text-sm sm:text-base font-bold text-center text-white bg-white rounded-md shadow-sm"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/509af023af99510f929aabbc9d2db43002575d3e?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                        class="object-contain self-center max-w-full aspect-square w-[90px] sm:w-[110px] md:w-[130px]"
                        alt="Product A"
                      />
                      <h3
                        class="px-2 sm:px-6 md:px-12 pt-2 sm:pt-3 md:pt-3.5 pb-3 sm:pb-4 md:pb-5 mt-1 sm:mt-2 md:mt-2.5 rounded-none bg-slate-600"
                      >
                        Product A
                      </h3>
                    </article>
                  </div>
                  <div class="col-span-1">
                    <div
                      class="flex shrink-0 mx-auto bg-white rounded-md shadow-sm h-[150px] sm:h-[175px] md:h-[200px] w-full"
                      aria-hidden="true"
                    ></div>
                  </div>
                  <div class="col-span-1">
                    <div
                      class="flex shrink-0 mx-auto bg-white rounded-md shadow-sm h-[150px] sm:h-[175px] md:h-[200px] w-full"
                      aria-hidden="true"
                    ></div>
                  </div>
                </div>
              </div>

              <!-- Product Grid - Row 3 (Empty Placeholders) -->
              <div class="mt-6 sm:mt-8 md:mt-10 mx-auto px-2">
                <div
                  class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-5"
                >
                  <div class="col-span-1">
                    <div
                      class="flex shrink-0 mx-auto bg-white rounded-md shadow-sm h-[150px] sm:h-[175px] md:h-[200px] w-full"
                      aria-hidden="true"
                    ></div>
                  </div>
                  <div class="col-span-1">
                    <div
                      class="flex shrink-0 mx-auto bg-white rounded-md shadow-sm h-[150px] sm:h-[175px] md:h-[200px] w-full"
                      aria-hidden="true"
                    ></div>
                  </div>
                  <div class="col-span-1">
                    <div
                      class="flex shrink-0 mx-auto bg-white rounded-md shadow-sm h-[150px] sm:h-[175px] md:h-[200px] w-full"
                      aria-hidden="true"
                    ></div>
                  </div>
                  <div class="col-span-1">
                    <div
                      class="flex shrink-0 mx-auto bg-white rounded-md shadow-sm h-[150px] sm:h-[175px] md:h-[200px] w-full"
                      aria-hidden="true"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </main>

    <script>
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

          destroyAnyNodes();
          pendingUpdate = false;
        }

        update();
      })();
    </script>
  </body>
</html>
