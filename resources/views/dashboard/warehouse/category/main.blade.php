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

    <!-- Success notification -->
    <div
      id="success-notification"
      class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md transition-all transform translate-x-full opacity-0"
    >
      <div class="flex items-center">
        <svg
          class="h-6 w-6 mr-2"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5 13l4 4L19 7"
          ></path>
        </svg>
        <span id="success-message">Operation completed successfully!</span>
      </div>
    </div>

    <!-- Error notification -->
    <div
      id="error-notification"
      class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md transition-all transform translate-x-full opacity-0"
    >
      <div class="flex items-center">
        <svg
          class="h-6 w-6 mr-2"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
          ></path>
        </svg>
        <span id="error-message">An error occurred. Please try again.</span>
      </div>
    </div>

    <!-- Confirmation modal -->
    <div
      id="confirmation-modal"
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300"
    >
      <div
        class="bg-white rounded-lg p-6 max-w-md w-full transform transition-transform duration-300 scale-95"
      >
        <h3 class="text-xl font-bold text-slate-600 mb-4" id="modal-title">
          Confirm Action
        </h3>
        <p class="text-slate-600 mb-6" id="modal-message">
          Are you sure you want to perform this action?
        </p>
        <div class="flex justify-end gap-4">
          <button
            id="modal-cancel"
            class="px-4 py-2 bg-slate-100 text-slate-600 rounded-lg transition-all hover-scale"
          >
            Cancel
          </button>
          <button
            id="modal-confirm"
            class="px-4 py-2 bg-slate-600 text-white rounded-lg transition-all hover-brightness"
          >
            Confirm
            <span class="loading-indicator hidden ml-2">
              <svg
                class="animate-spin h-4 w-4 inline-block"
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
        </div>
      </div>
    </div>

    <script>
      (() => {
        // State management
        const state = {
          loading: false,
          currentPage: 2,
          categories: [
            { id: "Trans-220", name: "Category 1" },
            { id: "Trans-221", name: "Category 2" },
            { id: "Trans-222", name: "Category 3" },
            { id: "Trans-223", name: "Category 4" },
            { id: "Trans-224", name: "Category 5" },
          ],
          filter: "",
          pendingAction: null,
        };

        // DOM Elements
        const appBody = document.getElementById("app-body");
        const mainContent = document.getElementById("main-content");
        const globalLoader = document.getElementById("global-loader");
        const tableLoader = document.getElementById("table-loader");
        const tableContainer = document.getElementById("table-container");
        const filterButton = document.getElementById("filter-button");
        const addProductButton = document.getElementById("add-product-button");
        const pagination = document.getElementById("pagination");
        const paginationLinks = document.querySelectorAll(".pagination-link");
        const editButtons = document.querySelectorAll(".edit-button");
        const deleteButtons = document.querySelectorAll(".delete-button");
        const successNotification = document.getElementById(
          "success-notification",
        );
        const errorNotification = document.getElementById("error-notification");
        const confirmationModal = document.getElementById("confirmation-modal");
        const modalTitle = document.getElementById("modal-title");
        const modalMessage = document.getElementById("modal-message");
        const modalCancel = document.getElementById("modal-cancel");
        const modalConfirm = document.getElementById("modal-confirm");

        // Helper functions
        function showGlobalLoader() {
          globalLoader.classList.add("active");
        }

        function hideGlobalLoader() {
          globalLoader.classList.remove("active");
        }

        function showTableLoader() {
          tableLoader.classList.add("active");
        }

        function hideTableLoader() {
          tableLoader.classList.remove("active");
        }

        function showButtonLoader(button) {
          const textSpan = button.querySelector(".button-text");
          const loaderSpan = button.querySelector(".loading-indicator");

          if (textSpan) textSpan.classList.add("hidden");
          if (loaderSpan) loaderSpan.classList.remove("hidden");

          button.disabled = true;
        }

        function hideButtonLoader(button) {
          const textSpan = button.querySelector(".button-text");
          const loaderSpan = button.querySelector(".loading-indicator");

          if (textSpan) textSpan.classList.remove("hidden");
          if (loaderSpan) loaderSpan.classList.add("hidden");

          button.disabled = false;
        }

        function showNotification(type, message) {
          const notification =
            type === "success" ? successNotification : errorNotification;
          const messageEl = notification.querySelector(`#${type}-message`);

          if (messageEl) messageEl.textContent = message;

          notification.style.transform = "translateX(0)";
          notification.style.opacity = "1";

          setTimeout(() => {
            notification.style.transform = "translateX(100%)";
            notification.style.opacity = "0";
          }, 3000);
        }

        function showConfirmationModal(title, message, confirmCallback) {
          modalTitle.textContent = title;
          modalMessage.textContent = message;

          state.pendingAction = confirmCallback;

          confirmationModal.style.opacity = "1";
          confirmationModal.style.pointerEvents = "auto";
          confirmationModal.querySelector("div").style.transform = "scale(1)";
        }

        function hideConfirmationModal() {
          confirmationModal.style.opacity = "0";
          confirmationModal.style.pointerEvents = "none";
          confirmationModal.querySelector("div").style.transform =
            "scale(0.95)";
          state.pendingAction = null;
        }

        function simulateNetworkDelay(min = 500, max = 1500) {
          const delay = Math.floor(Math.random() * (max - min + 1)) + min;
          return new Promise((resolve) => setTimeout(resolve, delay));
        }

        // Initialize page
        function initPage() {
          // Show initial loading state
          showGlobalLoader();

          // Simulate initial page load
          setTimeout(() => {
            hideGlobalLoader();
            appBody.classList.add("page-loaded");
          }, 800);
        }

        // Event handlers
        function handleFilterClick(e) {
          e.preventDefault();

          showButtonLoader(filterButton);
          showTableLoader();

          // Simulate filtering operation
          simulateNetworkDelay(800, 1200).then(() => {
            hideButtonLoader(filterButton);
            hideTableLoader();
            showNotification("success", "Categories filtered successfully");
          });
        }

        function handleAddProductClick(e) {
          e.preventDefault();

          showButtonLoader(addProductButton);

          // Simulate adding product
          simulateNetworkDelay().then(() => {
            hideButtonLoader(addProductButton);
            showNotification("success", "Product added successfully");
          });
        }

        function handleEditClick(e) {
          e.preventDefault();
          const button = e.currentTarget;
          const id = button.getAttribute("data-id");

          showConfirmationModal(
            "Edit Category",
            `Are you sure you want to edit category with ID: ${id}?`,
            () => {
              showButtonLoader(button);

              // Simulate edit operation
              simulateNetworkDelay().then(() => {
                hideButtonLoader(button);
                showNotification(
                  "success",
                  `Category ${id} updated successfully`,
                );
              });
            },
          );
        }

        function handleDeleteClick(e) {
          e.preventDefault();
          const button = e.currentTarget;
          const id = button.getAttribute("data-id");

          showConfirmationModal(
            "Delete Category",
            `Are you sure you want to delete category with ID: ${id}? This action cannot be undone.`,
            () => {
              showButtonLoader(button);

              // Simulate delete operation
              simulateNetworkDelay().then(() => {
                hideButtonLoader(button);

                // Animate row removal
                const row = button.closest(".table-row");
                if (row) {
                  row.style.opacity = "0";
                  row.style.transform = "translateX(20px)";
                  setTimeout(() => {
                    row.style.height = "0";
                    row.style.marginTop = "0";
                    row.style.overflow = "hidden";
                  }, 300);
                }

                showNotification(
                  "success",
                  `Category ${id} deleted successfully`,
                );
              });
            },
          );
        }

        function handlePaginationClick(e) {
          e.preventDefault();
          const link = e.currentTarget;
          const page = link.getAttribute("data-page");

          if (page === "prev" && state.currentPage === 1) return;
          if (page === "next" && state.currentPage === 3) return;

          showTableLoader();

          // Simulate page change
          simulateNetworkDelay(600, 1000).then(() => {
            // Update active page
            document
              .querySelector(".pagination-link.active")
              .classList.remove("active");

            if (page === "prev") {
              state.currentPage--;
              document
                .querySelector(
                  `.pagination-link[data-page="${state.currentPage}"]`,
                )
                .classList.add("active");
            } else if (page === "next") {
              state.currentPage++;
              document
                .querySelector(
                  `.pagination-link[data-page="${state.currentPage}"]`,
                )
                .classList.add("active");
            } else {
              state.currentPage = parseInt(page);
              link.classList.add("active");
            }

            hideTableLoader();

            // Animate table rows
            const tableRows = document.querySelectorAll(".table-row");
            tableRows.forEach((row, index) => {
              row.style.opacity = "0";
              row.style.transform = "translateY(10px)";

              setTimeout(
                () => {
                  row.style.opacity = "1";
                  row.style.transform = "translateY(0)";
                },
                100 + index * 50,
              );
            });
          });
        }

        function handleModalConfirm() {
          if (state.pendingAction) {
            hideConfirmationModal();
            state.pendingAction();
          }
        }

        function handleModalCancel() {
          hideConfirmationModal();
        }

        // Event listeners
        filterButton.addEventListener("click", handleFilterClick);
        addProductButton.addEventListener("click", handleAddProductClick);

        editButtons.forEach((button) => {
          button.addEventListener("click", handleEditClick);
        });

        deleteButtons.forEach((button) => {
          button.addEventListener("click", handleDeleteClick);
        });

        paginationLinks.forEach((link) => {
          link.addEventListener("click", handlePaginationClick);
        });

        modalConfirm.addEventListener("click", handleModalConfirm);
        modalCancel.addEventListener("click", handleModalCancel);

        // Initialize the page
        initPage();

        let nodesToDestroy = [];
        let pendingUpdate = false;

        function destroyAnyNodes() {
          // destroy current view template refs before rendering again
          nodesToDestroy.forEach((el) => el.remove());
          nodesToDestroy = [];
        }

        // Function to update data bindings and loops
        function update() {
          if (pendingUpdate === true) {
            return;
          }
          pendingUpdate = true;

          destroyAnyNodes();

          pendingUpdate = false;
        }

        // Update with initial state on first load
        update();
      })();
    </script>
  </body>
</html>
