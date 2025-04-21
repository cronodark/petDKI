<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet DKI Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-white">
    <main class="min-h-screen flex bg-white">
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


      <!-- Main Content -->
      <section class="flex-1 p-10 max-md:p-5">
        <!-- Title & Actions -->
        <div class="flex justify-between items-center mb-8 flex-wrap gap-4">
          <h1 class="text-4xl font-bold text-blue-950">Supplier</h1>
          <div class="flex gap-4">
            <button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100">
              <i class="ti ti-filter text-xl text-slate-600"></i>
              <span class="text-slate-600 font-semibold">Filter</span>
            </button>
            <button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-600 text-white">
              <i class="ti ti-plus text-xl"></i>
              <span class="font-semibold">Add Supplier</span>
            </button>
          </div>
        </div>

        <!-- Table -->
        <div class="rounded-2xl bg-slate-100 overflow-auto">
          <div class="p-4 bg-slate-600 rounded-t-2xl min-w-[640px] grid grid-cols-4 gap-6 text-center text-amber-200 font-semibold text-xl">
            <div>Supplier Name</div>
            <div>Latitude</div>
            <div>Longitude</div>
            <div>Phone Number</div>
          </div>
          <div id="supplierTableBody" class="p-6 min-w-[640px]">
            <div class="grid grid-cols-4 gap-6 py-4 border-b border-slate-300 text-center text-slate-800">
              <div>ABC Supplier</div>
              <div>-6.200000</div>
              <div>106.816666</div>
              <div>+62 812-3456-7890</div>
            </div>
            <!-- Add more rows here -->
          </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6 flex-wrap gap-4">
          <button class="flex items-center gap-2 text-slate-600 hover:text-slate-800">
            <svg width="12" height="21" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M0.48795 9.81461L9.91628 0.386274L12.2729 2.74294L4.02295 10.9929L12.2729 19.2429L9.91628 21.5996L0.48795 12.1713C0.175498 11.8587 -2.76566e-05 11.4349 -2.76566e-05 10.9929C-2.76566e-05 10.551 0.175498 10.1272 0.48795 9.81461Z"
                fill="#37496A" />
            </svg>
            <span class="text-xl">Previous</span>
          </button>
          <div class="flex gap-2 items-center">
            <a href="#" class="text-xl text-slate-600 hover:text-slate-800">1</a>
            <a href="#" class="text-xl text-white rounded-md bg-slate-600 w-8 h-8 flex items-center justify-center">2</a>
            <a href="#" class="text-xl text-slate-600 hover:text-slate-800">3</a>
          </div>
          <button class="flex items-center gap-2 text-slate-600 hover:text-slate-800">
            <span class="text-xl">Next</span>
            <svg width="12" height="21" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M0.48795 9.81461L9.91628 0.386274L12.2729 2.74294L4.02295 10.9929L12.2729 19.2429L9.91628 21.5996L0.48795 12.1713C0.175498 11.8587 -2.76566e-05 11.4349 -2.76566e-05 10.9929C-2.76566e-05 10.551 0.175498 10.1272 0.48795 9.81461Z"
                fill="#37496A" />
            </svg>
          </button>
        </div>
      </section>
    </main>

      <!-- Success Modal -->
      <div
        class="fixed top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 w-[748px] z-[1001]"
      >
        <div
          class="p-10 text-center bg-white rounded-3xl shadow-[0_0_8px_rgba(0,0,0,0.2)]"
        >
          <div class="relative mx-auto my-0 mt-0 h-[204px] w-[204px]">
            <svg
              width="204"
              height="204"
              viewBox="0 0 204 204"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="102" cy="102" r="102" fill="#D7F6D4"></circle>
            </svg>
            <svg
              style="
                position: absolute;
                top: 42px;
                left: 50%;
                transform: translateX(-50%);
              "
              width="107"
              height="107"
              viewBox="0 0 107 107"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M91.2622 25.1008C93.0009 26.8396 93.0009 29.6037 91.2622 31.3425L40.7047 81.9C40.2966 82.313 39.8107 82.6409 39.275 82.8647C38.7393 83.0885 38.1644 83.2038 37.5839 83.2038C37.0033 83.2038 36.4285 83.0885 35.8927 82.8647C35.357 82.6409 34.8711 82.313 34.463 81.9L15.738 63.175C15.325 62.7669 14.9971 62.281 14.7733 61.7453C14.5495 61.2095 14.4342 60.6347 14.4342 60.0541C14.4342 59.4736 14.5495 58.8987 14.7733 58.363C14.9971 57.8273 15.325 57.3413 15.738 56.9333C16.1461 56.5203 16.632 56.1924 17.1677 55.9686C17.7035 55.7448 18.2783 55.6295 18.8588 55.6295C19.4394 55.6295 20.0142 55.7448 20.55 55.9686C21.0857 56.1924 21.5716 56.5203 21.9797 56.9333L37.5839 72.5375L85.0205 25.1008C85.4286 24.6878 85.9145 24.3599 86.4502 24.1361C86.986 23.9123 87.5608 23.797 88.1414 23.797C88.7219 23.797 89.2967 23.9123 89.8325 24.1361C90.3682 24.3599 90.8541 24.6878 91.2622 25.1008ZM81.8551 15.6491L37.5839 59.9204L25.1451 47.4816C21.6676 44.0041 16.0055 44.0041 12.528 47.4816L6.28635 53.7233C2.80885 57.2008 2.80885 62.8629 6.28635 66.3404L31.253 91.3071C34.7305 94.7846 40.3926 94.7846 43.8701 91.3071L100.714 34.5079C104.191 31.0304 104.191 25.3683 100.714 21.8908L94.4722 15.6491C90.9501 12.1716 85.3326 12.1716 81.8551 15.6491Z"
                fill="#05CD99"
              ></path>
            </svg>
          </div>
          <h3 class="mx-0 my-5 text-4xl font-bold text-slate-600">
            Supplier added successfully!
          </h3>
          <p class="text-2xl text-slate-600">
            The Supplier has been successfully added
          </p>
        </div>
      </div>

      <!-- Modal Backdrop -->
      <div
        class="flex fixed top-0 left-0 justify-center items-center backdrop-blur-[7.5px] bg-black bg-opacity-40 size-full z-[1000]"
      ></div>
    </div>

    <script>
      // Simple script to handle modal closing
      document.addEventListener("DOMContentLoaded", function () {
        const modal = document.querySelector(".fixed.top-2\\/4");
        const backdrop = document.querySelector(".backdrop-blur-\\[7\\.5px\\]");

        if (backdrop) {
          backdrop.addEventListener("click", function () {
            modal.style.display = "none";
            backdrop.style.display = "none";
          });
        }
      });
    </script>
  </body>
</html>
