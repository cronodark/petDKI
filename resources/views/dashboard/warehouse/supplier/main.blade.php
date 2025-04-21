<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet DKI - Edit Supplier</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Paytone+One&display=swap" rel="stylesheet" />
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css" />
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
  </body>

  <script>
    // Get DOM elements
    const searchInput = document.getElementById("searchInput");
    const supplierRows = document.querySelectorAll(".supplier-row");

    // Add event listener for search input
    searchInput.addEventListener("input", filterSuppliers);

    // Function to filter suppliers based on search input
    function filterSuppliers() {
      const searchTerm = searchInput.value.toLowerCase().trim();

      // If search term is empty, show all rows
      if (searchTerm === "") {
        supplierRows.forEach((row) => {
          row.style.display = "";
        });
        return;
      }

      // Loop through each supplier row
      supplierRows.forEach((row) => {
        const rowText = row.textContent.toLowerCase();

        // Check if row contains the search term
        if (rowText.includes(searchTerm)) {
          row.style.display = ""; // Show the row
        } else {
          row.style.display = "none"; // Hide the row
        }
      });

      // Display message if no results found
      const visibleRows = document.querySelectorAll(
        '.supplier-row:not([style*="display: none"])',
      );
      const tableBody = document.getElementById("supplierTableBody");

      // Remove existing "no results" message if it exists
      const existingMessage = document.getElementById("noResultsMessage");
      if (existingMessage) {
        existingMessage.remove();
      }

      // Add "no results" message if needed
      if (visibleRows.length === 0) {
        const noResultsMessage = document.createElement("div");
        noResultsMessage.id = "noResultsMessage";
        noResultsMessage.className = "py-8 text-center text-slate-600 text-xl";
        noResultsMessage.textContent =
          "No suppliers found matching your search.";
        tableBody.appendChild(noResultsMessage);
      }
    }
  </script>
</html>
