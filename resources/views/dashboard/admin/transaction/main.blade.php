<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet DKI - Transaction Dashboard</title>
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
      .paytone-slate {
        font-family:
          "Paytone One",
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 400;
        color: rgba(55, 73, 106, 1);
      }

      /* Animation and transition styles */
      .fade-in {
        animation: fadeIn 0.5s ease-in-out;
      }

      .slide-in {
        animation: slideIn 0.4s ease-out;
      }

      .scale-in {
        animation: scaleIn 0.3s ease-out;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
        }
        to {
          opacity: 1;
        }
      }

      @keyframes slideIn {
        from {
          transform: translateY(20px);
          opacity: 0;
        }
        to {
          transform: translateY(0);
          opacity: 1;
        }
      }

      @keyframes scaleIn {
        from {
          transform: scale(0.95);
          opacity: 0;
        }
        to {
          transform: scale(1);
          opacity: 1;
        }
      }

      /* Loading spinner animation */
      .spinner {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top-color: #475569;
        animation: spin 1s infinite linear;
      }

      @keyframes spin {
        to {
          transform: rotate(360deg);
        }
      }

      /* Loading overlay */
      .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 50;
        opacity: 0;
        visibility: hidden;
        transition:
          opacity 0.3s,
          visibility 0.3s;
      }

      .loading-overlay.active {
        opacity: 1;
        visibility: visible;
      }

      /* Hover effects for buttons and links */
      .nav-item {
        transition:
          background-color 0.2s,
          transform 0.2s;
      }

      .nav-item:hover:not(.active-nav) {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateX(5px);
      }

      .btn-hover {
        transition:
          transform 0.2s,
          box-shadow 0.2s;
      }

      .btn-hover:hover {
        transform: translateY(-2px);
        box-shadow:
          0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
      }

      /* Table row hover effect */
      .table-row {
        transition: background-color 0.2s;
      }

      .table-row:hover {
        background-color: rgba(226, 232, 240, 0.5);
      }

      /* Page transition effect */
      .page-transition {
        transition:
          opacity 0.3s,
          transform 0.3s;
      }

      .page-transition.loading {
        opacity: 0.6;
        transform: scale(0.98);
      }

      /* Staggered animation for table rows */
      .stagger-item {
        opacity: 0;
        transform: translateY(10px);
      }

      .stagger-item.animate {
        animation: staggerIn 0.4s ease-out forwards;
      }

      @keyframes staggerIn {
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Pulse animation for active elements */
      .pulse-effect {
        animation: pulse 2s infinite;
      }

      @keyframes pulse {
        0% {
          box-shadow: 0 0 0 0 rgba(71, 85, 105, 0.4);
        }
        70% {
          box-shadow: 0 0 0 10px rgba(71, 85, 105, 0);
        }
        100% {
          box-shadow: 0 0 0 0 rgba(71, 85, 105, 0);
        }
      }
    </style>
  </head>
  <body>
    <div
      class="overflow-hidden pt-16 pr-12 bg-white max-md:pr-5 fade-in"
      id="ui-transaction"
    >
      <div class="flex gap-5 max-md:flex-col">
        <!-- Sidebar Navigation -->
        <aside class="w-[27%] max-md:ml-0 max-md:w-full slide-in">
          <div
            class="flex flex-col grow items-center text-2xl font-medium text-white max-md:mt-10"
          >
            <!-- Logo -->
            <h1 class="text-6xl text-slate-600 max-md:text-4xl scale-in">
              <span class="paytone-slate">Pet</span
              ><span class="paytone-font">DKI</span>
            </h1>
            <div class="mt-7 font-bold">PET DKI</div>

            <!-- Navigation Menu -->
            <nav
              class="flex flex-col items-start self-stretch py-24 pl-6 mt-1.5 w-full rounded-none bg-slate-600 max-md:pt-24 max-md:pl-5"
            >
              <!-- Dashboard Link -->
              <a
                href="#"
                class="flex gap-6 ml-8 whitespace-nowrap max-md:ml-2.5 nav-item"
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

              <!-- Product Link -->
              <a
                href="#"
                class="flex gap-6 mt-8 ml-5 whitespace-nowrap max-md:ml-2.5 nav-item"
                aria-label="Product"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/9ad6664831c02c1c7f3160dcdad834acb51e65ce?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 w-14 aspect-square"
                  aria-hidden="true"
                />
                <span class="my-auto">Product</span>
              </a>

              <!-- Transaction Link (Active) -->
              <a
                href="#"
                class="flex gap-8 self-stretch px-6 py-3.5 mt-5 whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600 max-md:px-5 active-nav"
                aria-label="Transaction"
                aria-current="page"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/3d8145e9fc5807d0bcbc06a36d1ebd2855729d36?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 aspect-square w-[46px]"
                  aria-hidden="true"
                />
                <span class="grow shrink my-auto w-[202px]">Transaction</span>
              </a>

              <!-- Employee Link -->
              <a
                href="#"
                class="flex gap-8 mt-7 ml-7 whitespace-nowrap max-md:ml-2.5 nav-item"
                aria-label="Employee"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/ea41ebc2e4007e5e1507c15959d4b35f37c1215e?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 aspect-[1.18] w-[46px]"
                  aria-hidden="true"
                />
                <span class="my-auto basis-auto">Employee</span>
              </a>

              <!-- Logout Link -->
              <a
                href="#"
                class="flex gap-7 mt-80 ml-7 max-md:mt-10 max-md:ml-2.5 nav-item"
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

        <!-- Main Content Area -->
        <main
          class="ml-5 w-[73%] max-md:ml-0 max-md:w-full slide-in"
          style="animation-delay: 0.2s"
        >
          <div
            class="mt-2 w-full max-md:mt-10 max-md:max-w-full page-transition"
            id="main-content"
          >
            <!-- Header with Search and Profile -->
            <header
              class="flex flex-wrap gap-10 w-full whitespace-nowrap max-md:mr-2.5 max-md:max-w-full"
            >
              <!-- Search Bar -->
              <form
                role="search"
                class="flex flex-wrap flex-auto gap-10 px-8 py-2.5 text-xl text-gray-400 rounded-3xl bg-slate-100 max-md:px-5 max-md:max-w-full btn-hover"
                id="search-form"
              >
                <label for="search-input" class="sr-only">Search</label>
                <input
                  id="search-input"
                  type="search"
                  placeholder="Search"
                  class="my-auto bg-transparent border-none outline-none"
                />
                <button type="submit" aria-label="Search" id="search-button">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6aca5d100837687e9f315d38b6dd97d8c6544c12?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                    alt=""
                    class="object-contain shrink-0 w-10 aspect-square"
                    aria-hidden="true"
                  />
                </button>
              </form>

              <!-- User Profile -->
              <div
                class="flex shrink gap-5 basis-auto grow-0 text-slate-600 scale-in"
                style="animation-delay: 0.3s"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/78b5def8285e555841750262ff5e88d725c9056a?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Admin profile picture"
                  class="object-contain shrink-0 rounded-full aspect-square w-[59px]"
                />
                <div class="flex flex-col self-start mt-1">
                  <div class="self-start text-xl font-bold">Admin</div>
                  <div class="mt-3.5 text-base">LoremIpsum@gmail.com</div>
                </div>
              </div>
            </header>

            <!-- Transaction Section Header -->
            <section
              class="flex flex-wrap gap-5 justify-between mt-14 w-full font-bold whitespace-nowrap max-md:mt-10 max-md:mr-2.5 max-md:max-w-full fade-in"
              style="animation-delay: 0.4s"
            >
              <h2 class="my-auto text-4xl text-blue-950">Transaction</h2>

              <!-- Action Buttons -->
              <div class="flex gap-8 text-xl text-slate-600">
                <!-- Filter Button -->
                <button
                  class="flex gap-5 items-start px-8 py-5 rounded-2xl bg-slate-100 max-md:px-5 btn-hover"
                  aria-label="Filter transactions"
                  id="filter-button"
                >
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/79b06fa2143a2bb4e5e38ba8c04f684cc5405367?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                    alt=""
                    class="object-contain shrink-0 aspect-[0.87] w-[27px]"
                    aria-hidden="true"
                  />
                  <span>Filter</span>
                </button>

                <!-- Export Button -->
                <button
                  class="flex gap-2.5 px-6 py-4 rounded-2xl bg-slate-100 max-md:px-5 btn-hover"
                  aria-label="Export transactions"
                  id="export-button"
                >
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/b673e6e08da8f4cb0c541921eb49dd3c2f10d48d?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                    alt=""
                    class="object-contain shrink-0 aspect-square w-[43px]"
                    aria-hidden="true"
                  />
                  <span class="my-auto">Export</span>
                </button>
              </div>
            </section>

            <!-- Transaction Table -->
            <section
  class="flex flex-col pb-7 mt-9 w-full text-xl font-medium rounded-2xl bg-slate-100 text-slate-600 max-md:max-w-full relative"
  aria-label="Transaction list"
  id="transaction-table"
>
  <!-- Loading Overlay -->
  <div class="loading-overlay" id="table-loading">
    <div class="spinner"></div>
    <p class="sr-only">Loading transactions...</p>
  </div>

  <!-- Table Header -->
  <div class="grid grid-cols-4 gap-4 px-10 py-6 text-center text-amber-200 bg-slate-600 rounded-t-2xl max-md:px-4">
    <div>ID</div>
    <div>Date</div>
    <div>User ID</div>
    <div>Action</div>
  </div>

  <!-- Table Rows -->
  <div id="table-rows" class="divide-y divide-slate-300">
    <!-- Row 1 -->
    <div class="grid grid-cols-4 gap-4 items-center px-10 py-5 text-center max-md:px-4">
      <div>Trans-220</div>
      <div>19/2/2025</div>
      <div>Lorem1426</div>
      <a href="#" class="px-5 py-2 rounded-xl border-2 border-slate-600 btn-hover inline-block">
        Detail
      </a>
    </div>

    <!-- Row 2 -->
    <div class="grid grid-cols-4 gap-4 items-center px-10 py-5 text-center max-md:px-4">
      <div>Trans-221</div>
      <div>20/2/2025</div>
      <div>Ipsum5678</div>
      <a href="#" class="px-5 py-2 rounded-xl border-2 border-slate-600 btn-hover inline-block">
        Detail
      </a>
    </div>

    <!-- Add more rows as needed -->
  </div>
</section>


            <!-- Pagination -->
            <nav
              class="flex flex-wrap gap-5 justify-between items-start mt-9 mr-7 ml-7 text-xl font-medium whitespace-nowrap text-slate-600 max-md:mr-2.5 max-md:max-w-full fade-in"
              aria-label="Pagination"
              style="animation-delay: 0.6s"
              id="pagination"
            >
              <!-- Previous Page -->
              <a
                href="#"
                class="flex gap-3 btn-hover"
                aria-label="Go to previous page"
                id="prev-page"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 self-start w-3 aspect-[0.55]"
                  aria-hidden="true"
                />
                <span>Previous</span>
              </a>

              <!-- Page Numbers -->
              <div class="flex gap-5 items-start self-stretch">
                <a
                  href="#"
                  class="btn-hover"
                  aria-label="Go to page 1"
                  id="page-1"
                  >1</a
                >
                <a
                  href="#"
                  class="self-stretch px-2 pt-px pb-2.5 text-white rounded-md bg-slate-600 h-[25px] w-[25px] text-center pulse-effect"
                  aria-label="Current page, page 2"
                  aria-current="page"
                  id="page-2"
                  >2</a
                >
                <a
                  href="#"
                  class="btn-hover"
                  aria-label="Go to page 3"
                  id="page-3"
                  >3</a
                >
              </div>

              <!-- Next Page -->
              <a
                href="#"
                class="flex gap-3.5 items-start btn-hover"
                aria-label="Go to next page"
                id="next-page"
              >
                <span>next</span>
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/d15578e15c255f9ec78c7db8e35631674a3faa8b?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt=""
                  class="object-contain shrink-0 w-3 aspect-[0.55]"
                  aria-hidden="true"
                />
              </a>
            </nav>
          </div>
        </main>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Elements
        const mainContent = document.getElementById("main-content");
        const tableLoading = document.getElementById("table-loading");
        const tableRows = document.querySelectorAll(".stagger-item");
        const searchForm = document.getElementById("search-form");
        const searchButton = document.getElementById("search-button");
        const filterButton = document.getElementById("filter-button");
        const exportButton = document.getElementById("export-button");
        const paginationLinks = document.querySelectorAll("#pagination a");
        const prevPage = document.getElementById("prev-page");
        const nextPage = document.getElementById("next-page");

        // Show loading state
        function showLoading() {
          tableLoading.classList.add("active");
          mainContent.classList.add("loading");
          // Announce loading state for screen readers
          const loadingAnnouncement = document.createElement("div");
          loadingAnnouncement.setAttribute("aria-live", "polite");
          loadingAnnouncement.textContent = "Loading data, please wait...";
          document.body.appendChild(loadingAnnouncement);

          setTimeout(() => {
            document.body.removeChild(loadingAnnouncement);
          }, 1000);
        }

        // Hide loading state
        function hideLoading() {
          tableLoading.classList.remove("active");
          mainContent.classList.remove("loading");

          // Animate table rows with staggered effect
          tableRows.forEach((row, index) => {
            setTimeout(() => {
              row.classList.add("animate");
            }, 100 * index);
          });

          // Announce completion for screen readers
          const completionAnnouncement = document.createElement("div");
          completionAnnouncement.setAttribute("aria-live", "polite");
          completionAnnouncement.textContent = "Data loaded successfully";
          document.body.appendChild(completionAnnouncement);

          setTimeout(() => {
            document.body.removeChild(completionAnnouncement);
          }, 1000);
        }

        // Simulate initial page load
        setTimeout(() => {
          // Animate table rows with staggered effect
          tableRows.forEach((row, index) => {
            setTimeout(() => {
              row.classList.add("animate");
            }, 100 * index);
          });
        }, 500);

        // Search functionality with loading state
        searchForm.addEventListener("submit", function (e) {
          e.preventDefault();
          showLoading();

          // Simulate search delay
          setTimeout(() => {
            hideLoading();
          }, 1200);
        });

        // Filter button click handler
        filterButton.addEventListener("click", function () {
          showLoading();

          // Simulate filter processing
          setTimeout(() => {
            hideLoading();
          }, 800);
        });

        // Export button click handler
        exportButton.addEventListener("click", function () {
          // Add a temporary pulse effect
          this.classList.add("pulse-effect");

          // Remove the effect after animation completes
          setTimeout(() => {
            this.classList.remove("pulse-effect");
          }, 2000);

          // Show a brief loading state
          const exportText = this.querySelector("span");
          const originalText = exportText.textContent;
          exportText.textContent = "Exporting...";

          setTimeout(() => {
            exportText.textContent = originalText;
          }, 1500);
        });

        // Pagination functionality
        paginationLinks.forEach((link) => {
          link.addEventListener("click", function (e) {
            e.preventDefault();

            // Don't do anything if clicking the current page
            if (this.getAttribute("aria-current") === "page") {
              return;
            }

            // Show loading state
            showLoading();

            // Remove current page indicator
            document
              .querySelector('[aria-current="page"]')
              .removeAttribute("aria-current");
            document
              .querySelector(".pulse-effect")
              .classList.remove("pulse-effect");

            // Reset all page links
            document.querySelectorAll("#pagination a").forEach((a) => {
              a.classList.remove(
                "self-stretch",
                "px-2",
                "pt-px",
                "pb-2.5",
                "text-white",
                "rounded-md",
                "bg-slate-600",
                "h-[25px]",
                "w-[25px]",
                "text-center",
              );
            });

            // Set new current page
            if (this.id.includes("page")) {
              this.classList.add(
                "self-stretch",
                "px-2",
                "pt-px",
                "pb-2.5",
                "text-white",
                "rounded-md",
                "bg-slate-600",
                "h-[25px]",
                "w-[25px]",
                "text-center",
                "pulse-effect",
              );
              this.setAttribute("aria-current", "page");
            } else {
              // If prev/next was clicked, update the appropriate page number
              const currentPage = parseInt(
                document.querySelector('[aria-current="page"]')?.textContent ||
                  "2",
              );
              let newPage;

              if (this.id === "prev-page") {
                newPage = Math.max(currentPage - 1, 1);
              } else {
                newPage = Math.min(currentPage + 1, 3);
              }

              const pageElement = document.getElementById(`page-${newPage}`);
              pageElement.classList.add(
                "self-stretch",
                "px-2",
                "pt-px",
                "pb-2.5",
                "text-white",
                "rounded-md",
                "bg-slate-600",
                "h-[25px]",
                "w-[25px]",
                "text-center",
                "pulse-effect",
              );
              pageElement.setAttribute("aria-current", "page");
            }

            // Simulate page change delay
            setTimeout(() => {
              // Reset animation on table rows
              tableRows.forEach((row) => {
                row.classList.remove("animate");
              });

              // Re-animate rows with staggered effect
              setTimeout(() => {
                tableRows.forEach((row, index) => {
                  setTimeout(() => {
                    row.classList.add("animate");
                  }, 100 * index);
                });
              }, 100);

              hideLoading();
            }, 800);
          });
        });

        // Add focus styles for keyboard navigation
        const focusableElements = document.querySelectorAll("a, button, input");
        focusableElements.forEach((el) => {
          el.addEventListener("focus", function () {
            this.style.outline = "2px solid #475569";
            this.style.outlineOffset = "2px";
          });

          el.addEventListener("blur", function () {
            this.style.outline = "none";
          });
        });

        // Simulate data refresh on interval (for demo purposes)
        let refreshInterval;

        function startAutoRefresh() {
          refreshInterval = setInterval(() => {
            const randomRow = Math.floor(Math.random() * tableRows.length);
            const targetRow = tableRows[randomRow];

            // Add a subtle highlight effect to simulate data update
            targetRow.style.backgroundColor = "rgba(226, 232, 240, 0.8)";
            setTimeout(() => {
              targetRow.style.backgroundColor = "";
            }, 1000);
          }, 10000); // Refresh random row every 10 seconds
        }

        // Start auto-refresh after initial page load
        setTimeout(startAutoRefresh, 2000);

        // Cleanup interval when page is hidden
        document.addEventListener("visibilitychange", function () {
          if (document.hidden) {
            clearInterval(refreshInterval);
          } else {
            startAutoRefresh();
          }
        });

        // Keyboard shortcuts for navigation
        document.addEventListener("keydown", function (e) {
          // Left arrow for previous page
          if (e.key === "ArrowLeft" && e.altKey) {
            prevPage.click();
          }

          // Right arrow for next page
          if (e.key === "ArrowRight" && e.altKey) {
            nextPage.click();
          }

          // F key for filter
          if (e.key === "f" && e.altKey) {
            e.preventDefault();
            filterButton.click();
          }

          // S key for search focus
          if (e.key === "s" && e.altKey) {
            e.preventDefault();
            document.getElementById("search-input").focus();
          }
        });

        // Announce keyboard shortcuts for screen reader users
        const keyboardHelpButton = document.createElement("button");
        keyboardHelpButton.textContent = "?";
        keyboardHelpButton.className =
          "fixed bottom-4 right-4 w-8 h-8 rounded-full bg-slate-600 text-white flex items-center justify-center";
        keyboardHelpButton.setAttribute(
          "aria-label",
          "Keyboard shortcuts help",
        );
        document.body.appendChild(keyboardHelpButton);

        keyboardHelpButton.addEventListener("click", function () {
          const helpText =
            "Keyboard shortcuts: Alt+Left Arrow for previous page, Alt+Right Arrow for next page, Alt+F for filter, Alt+S to focus search";
          alert(helpText);
        });
      });
    </script>
  </body>
</html>
