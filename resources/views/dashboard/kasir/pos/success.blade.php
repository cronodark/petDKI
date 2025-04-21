<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet DKI - POS System</title>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Paytone+One&display=swap"
      rel="stylesheet"
    />
    <!-- Tabler Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css"
    />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body {
        font-family: "Montserrat", sans-serif;
      }
      .search-input:focus {
        outline: none;
      }
      .success-circle {
        position: absolute;
        width: 100%;
        height: 100%;
      }
      .success-check {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
    </style>
  </head>
  <body class="m-0 p-0">
    <div
      class="relative mx-auto w-full max-w-none h-screen bg-white max-md:max-w-[991px] max-sm:max-w-screen-sm"
    >
      <!-- Order Panel (Left Side) -->
      <aside
        class="flex fixed top-0 left-0 flex-col h-screen bg-white shadow-sm w-[489px] max-md:relative max-md:w-full max-md:h-auto"
      >
        <!-- Order Header -->
        <header class="px-14 py-7 text-blue-950">
          <h1 class="text-4xl font-bold">#Order-7</h1>
          <p class="mt-1.5 text-base text-slate-600">
            Opened 19/2/2025 -- 19:00
          </p>
        </header>

        <!-- Order Items -->
        <section class="p-5 border-t border-solid border-t-gray-400">
          <!-- Item 1 -->
          <article class="flex items-start px-7 py-0 mb-8">
            <div class="text-2xl font-bold text-blue-950">x 1</div>
            <div class="ml-2.5">
              <h3 class="text-2xl font-bold text-blue-950">Product A</h3>
              <p class="mt-1.5 text-base text-slate-600">Category 1</p>
            </div>
            <div class="ml-auto text-2xl font-bold text-blue-950">250.000</div>
            <button aria-label="Remove item" class="ml-4">
              <i class="ti ti-trash text-lg text-gray-400"></i>
            </button>
          </article>

          <!-- Item 2 -->
          <article class="flex items-start px-7 py-0 mb-8">
            <div class="text-2xl font-bold text-blue-950">x 1</div>
            <div class="ml-2.5">
              <h3 class="text-2xl font-bold text-blue-950">Product A</h3>
              <p class="mt-1.5 text-base text-slate-600">Category 1</p>
            </div>
            <div class="ml-auto text-2xl font-bold text-blue-950">250.000</div>
            <button aria-label="Remove item" class="ml-4">
              <i class="ti ti-trash text-lg text-gray-400"></i>
            </button>
          </article>

          <!-- Item 3 -->
          <article class="flex items-start px-7 py-0 mb-8">
            <div class="text-2xl font-bold text-blue-950">x 1</div>
            <div class="ml-2.5">
              <h3 class="text-2xl font-bold text-blue-950">Product A</h3>
              <p class="mt-1.5 text-base text-slate-600">Category 1</p>
            </div>
            <div class="ml-auto text-2xl font-bold text-blue-950">250.000</div>
            <button aria-label="Remove item" class="ml-4">
              <i class="ti ti-trash text-lg text-gray-400"></i>
            </button>
          </article>

          <!-- Item 4 -->
          <article class="flex items-start px-7 py-0 mb-8">
            <div class="text-2xl font-bold text-blue-950">x 1</div>
            <div class="ml-2.5">
              <h3 class="text-2xl font-bold text-blue-950">Product A</h3>
              <p class="mt-1.5 text-base text-slate-600">Category 1</p>
            </div>
            <div class="ml-auto text-2xl font-bold text-blue-950">250.000</div>
            <button aria-label="Remove item" class="ml-4">
              <i class="ti ti-trash text-lg text-gray-400"></i>
            </button>
          </article>
        </section>

        <!-- Order Summary -->
        <section class="px-7 py-5 border-t border-solid border-t-gray-400">
          <div class="flex justify-between mb-5">
            <h3 class="text-base font-semibold text-blue-950">Sub Total</h3>
            <p class="text-base font-semibold text-blue-950">Rp. 1.000.000</p>
          </div>
          <div class="flex justify-between mb-5">
            <h3 class="text-base font-semibold text-blue-950">Total Discont</h3>
            <p class="text-base font-semibold text-blue-950">-Rp 0</p>
          </div>
          <div class="flex justify-between mt-8 mb-5">
            <h3 class="text-2xl font-bold text-blue-950">Total</h3>
            <p class="text-2xl font-bold text-blue-950">-Rp 1.000.000</p>
          </div>
        </section>

        <!-- Add Section -->
        <section class="px-7 py-5 border-t border-solid border-t-gray-400">
          <h3 class="text-2xl font-bold text-blue-950">ADD</h3>
          <div class="flex gap-5 justify-end mt-2.5 text-base text-blue-950">
            <button>Discount</button>
            <button>SKU</button>
          </div>
        </section>

        <!-- SKU Input -->
        <section class="px-7 py-5">
          <label for="sku-code" class="text-xl text-zinc-400">SKU Code</label>
          <div class="mt-2.5 h-px bg-gray-400"></div>
          <input id="sku-code" type="text" class="hidden" />
        </section>

        <!-- Pay Now Button -->
        <button
          class="flex justify-between p-5 mx-7 my-5 text-2xl font-medium text-white rounded-2xl bg-slate-600"
        >
          <span>Pay Now</span>
          <span class="font-bold">Rp 1.000.000</span>
        </button>

        <!-- Logout Button -->
        <div class="mx-7 my-5">
          <button aria-label="Log out">
            <svg
              width="288"
              height="38"
              viewBox="0 0 288 38"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M0 4.22222C0 1.9 1.69962 0 3.77694 0H18.8847V4.22222H3.77694V33.7778H18.8847V38H3.77694C1.69962 38 0 36.1 0 33.7778V4.22222ZM26.7709 16.8889L21.9818 11.5351L24.6521 8.55L34 19L24.6521 29.45L21.9818 26.4649L26.7709 21.1111H14.3335V16.8889H26.7709Z"
                fill="white"
              ></path>
              <text
                fill="white"
                xml:space="preserve"
                style="white-space: pre"
                font-family="Montserrat"
                font-size="24"
                font-weight="500"
                letter-spacing="0em"
              >
                <tspan x="60" y="26.6089">Log out</tspan>
              </text>
            </svg>
          </button>
        </div>
      </aside>

      <!-- Main Content (Right Side) -->
      <main class="p-5 ml-[489px] max-md:ml-0">
        <!-- Header -->
        <header class="flex justify-between items-center p-5 bg-slate-600">
          <h1 class="text-4xl text-white">Pet DKI</h1>

          <!-- Search Bar -->
          <div
            class="flex items-center p-5 rounded-3xl bg-slate-100 w-[757px] max-sm:w-full"
          >
            <input
              type="text"
              placeholder="Search"
              class="w-full text-2xl text-gray-400 border-none bg-transparent search-input"
            />
            <i class="ti ti-search ml-2.5 text-2xl text-gray-400"></i>
          </div>

          <!-- Scan Button -->
          <button
            aria-label="Scan"
            class="flex justify-center items-center rounded-2xl bg-slate-600 h-[83px] w-[83px]"
          >
            <i class="ti ti-scan text-4xl text-white"></i>
          </button>
        </header>

        <!-- Product Grid -->
        <section
          class="grid gap-5 p-5 grid-cols-[repeat(4,1fr)] max-md:grid-cols-[repeat(2,1fr)] max-sm:grid-cols-[1fr]"
        >
          <!-- Product 1 -->
          <article class="overflow-hidden bg-white rounded-md shadow-sm">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/442d65330d7d09f4cca5f207d0abdb286a65beba"
              alt="Product"
              class="object-contain p-2.5 w-full h-[154px]"
            />
            <h3
              class="p-3 text-base font-bold text-center text-white bg-slate-600"
            >
              Product A
            </h3>
          </article>

          <!-- Product 2 -->
          <article class="overflow-hidden bg-white rounded-md shadow-sm">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/b74c81df3416605ca9dd830a6d0fb74f77540970"
              alt="Product"
              class="object-contain p-2.5 w-full h-[154px]"
            />
            <h3
              class="p-3 text-base font-bold text-center text-white bg-slate-600"
            >
              Product A
            </h3>
          </article>

          <!-- Product 3 -->
          <article class="overflow-hidden bg-white rounded-md shadow-sm">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/b9da324d45009499ada05a740ce85461c39ec3b8"
              alt="Product"
              class="object-contain p-2.5 w-full h-[154px]"
            />
            <h3
              class="p-3 text-base font-bold text-center text-white bg-slate-600"
            >
              Product A
            </h3>
          </article>

          <!-- Product 4 -->
          <article class="overflow-hidden bg-white rounded-md shadow-sm">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba856e799cc14ce83857b354a77eb9e71e230056"
              alt="Product"
              class="object-contain p-2.5 w-full h-[154px]"
            />
            <h3
              class="p-3 text-base font-bold text-center text-white bg-slate-600"
            >
              Product A
            </h3>
          </article>

          <!-- Product 5 -->
          <article class="overflow-hidden bg-white rounded-md shadow-sm">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/e9078013de31cbd0635a85dedb42afb4dde685e6"
              alt="Product"
              class="object-contain p-2.5 w-full h-[154px]"
            />
            <h3
              class="p-3 text-base font-bold text-center text-white bg-slate-600"
            >
              Product A
            </h3>
          </article>

          <!-- Product 6 -->
          <article class="overflow-hidden bg-white rounded-md shadow-sm">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/7fb1a50e69cdf9f984b0f79b8b1932a46bffdf6a"
              alt="Product"
              class="object-contain p-2.5 w-full h-[154px]"
            />
            <h3
              class="p-3 text-base font-bold text-center text-white bg-slate-600"
            >
              Product A
            </h3>
          </article>
        </section>
      </main>

      <!-- Payment Success Modal -->
      <div
        class="flex fixed top-0 left-0 justify-center items-center size-full z-[1000]"
      >
        <div
          class="absolute top-0 left-0 backdrop-blur-[7.5px] bg-black bg-opacity-40 size-full"
        ></div>
        <div
          class="relative p-10 pb-9 text-center bg-white rounded-3xl w-[748px] max-sm:p-5 max-sm:w-[90%]"
        >
          <div class="relative mx-auto my-0 mb-10 h-[204px] w-[204px]">
            <!-- Success Circle -->
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

            <!-- Success Check -->
            <svg
              width="107"
              height="107"
              viewBox="0 0 107 107"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="success-check"
            >
              <path
                d="M91.2622 25.1003C93.0009 26.8391 93.0009 29.6032 91.2622 31.342L40.7047 81.8995C40.2966 82.3125 39.8107 82.6404 39.275 82.8642C38.7393 83.088 38.1644 83.2033 37.5839 83.2033C37.0033 83.2033 36.4285 83.088 35.8927 82.8642C35.357 82.6404 34.8711 82.3125 34.463 81.8995L15.738 63.1745C15.325 62.7664 14.9971 62.2805 14.7733 61.7448C14.5495 61.209 14.4342 60.6342 14.4342 60.0536C14.4342 59.4731 14.5495 58.8983 14.7733 58.3625C14.9971 57.8268 15.325 57.3409 15.738 56.9328C16.1461 56.5198 16.632 56.1919 17.1677 55.9681C17.7035 55.7443 18.2783 55.629 18.8588 55.629C19.4394 55.629 20.0142 55.7443 20.55 55.9681C21.0857 56.1919 21.5716 56.5198 21.9797 56.9328L37.5839 72.537L85.0205 25.1003C85.4286 24.6873 85.9145 24.3594 86.4502 24.1356C86.986 23.9118 87.5608 23.7965 88.1414 23.7965C88.7219 23.7965 89.2967 23.9118 89.8325 24.1356C90.3682 24.3594 90.8541 24.6873 91.2622 25.1003ZM81.8551 15.6487L37.5839 59.9199L25.1451 47.4811C21.6676 44.0036 16.0055 44.0036 12.528 47.4811L6.28635 53.7228C2.80885 57.2003 2.80885 62.8624 6.28635 66.3399L31.253 91.3066C34.7305 94.7841 40.3926 94.7841 43.8701 91.3066L100.714 34.5074C104.191 31.0299 104.191 25.3678 100.714 21.8903L94.4722 15.6487C90.9501 12.1712 85.3326 12.1712 81.8551 15.6487Z"
                fill="#05CD99"
              ></path>
            </svg>
          </div>

          <h2 class="mb-5 text-4xl font-bold text-slate-600">
            Payment successful!
          </h2>
          <p class="text-2xl text-slate-600">
            Thank you for shopping at Pet DKI
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
