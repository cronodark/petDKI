<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Product - PetDKI Admin Dashboard</title>
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

      /* Enhanced animations for sidebar items */
      .sidebar-item {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }

      .sidebar-item:hover:not(.active) {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 30px 0 0 30px;
        transform: translateX(5px);
      }

      .sidebar-item::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: rgba(255, 255, 255, 0.5);
        transition: width 0.3s ease;
      }

      .sidebar-item:hover::after {
        width: 100%;
      }

      /* Form input animations */
      .form-input {
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        transition: all 0.3s ease;
      }

      .form-input:focus {
        border-color: #475569;
        transform: translateY(-2px);
        box-shadow: 0 2px 0 rgba(71, 85, 105, 0.2);
      }

      .input-container {
        position: relative;
      }

      .input-container label {
        transition: all 0.3s ease;
      }

      .input-container:focus-within label {
        color: #475569;
        transform: translateY(-5px) scale(0.95);
      }

      /* Loading spinner animation */
      .spinner {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top-color: #fff;
        animation: spin 1s infinite linear;
        display: none;
      }

      @keyframes spin {
        to {
          transform: rotate(360deg);
        }
      }

      /* Button animations */
      .btn-submit {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }

      .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .btn-submit:active {
        transform: translateY(1px);
      }

      .btn-submit::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition:
          width 0.6s ease,
          height 0.6s ease;
      }

      .btn-submit:hover::before {
        width: 300px;
        height: 300px;
      }

      /* File input animation */
      .file-label {
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
      }

      .file-label:hover {
        background-color: rgba(71, 85, 105, 0.1);
      }

      /* Loading overlay */
      .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition:
          opacity 0.3s ease,
          visibility 0.3s ease;
      }

      .loading-overlay.active {
        opacity: 1;
        visibility: visible;
      }

      /* Page transition animation */
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(10px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .page-content {
        animation: fadeIn 0.5s ease-out;
      }

      @media (max-width: 768px) {
        .sidebar {
          height: auto;
        }
      }
    </style>
  </head>
  <body class="bg-white">
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loading-overlay">
      <div class="spinner"></div>
      <p class="text-white ml-4 text-xl">Processing...</p>
    </div>

    <main class="pt-16 pr-16 bg-white max-md:pr-5 page-content">
      <div class="flex gap-5 max-md:flex-col">
        <!-- Sidebar Navigation -->
        <aside class="w-[27%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col grow items-center text-2xl font-medium text-white max-md:mt-10"
          >
            <!-- Logo -->
            <header class="text-6xl text-slate-600 max-md:text-4xl">
              <span class="paytone-font" style="color: rgba(55, 73, 106, 1)"
                >Pet</span
              >
              <span class="paytone-font">DKI</span>
            </header>

            <h1 class="mt-7 font-bold">PET DKI</h1>

            <!-- Navigation Menu -->
            <nav
              class="flex flex-col items-start self-stretch py-24 pl-6 mt-1.5 w-full rounded-none bg-slate-600 max-md:pt-24 max-md:pl-5 sidebar"
            >
              <!-- Dashboard -->
              <a
                href="#"
                class="flex gap-6 ml-8 whitespace-nowrap max-md:ml-2.5 sidebar-item"
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
                class="flex gap-6 self-stretch px-5 py-2.5 mt-7 whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600 max-md:px-5 sidebar-item active"
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
                class="flex gap-7 mt-6 ml-5 whitespace-nowrap max-md:ml-2.5 sidebar-item"
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
                class="flex gap-9 mt-10 ml-7 whitespace-nowrap max-md:mt-10 max-md:ml-2.5 sidebar-item"
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
                class="flex gap-7 mt-72 ml-7 max-md:mt-10 max-md:ml-2.5 sidebar-item"
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
        <section class="ml-5 w-[73%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col items-start mt-2 w-full max-md:mt-10 max-md:max-w-full"
          >
            <!-- Top Bar with Search and Profile -->
            <div
              class="flex flex-wrap gap-10 self-stretch w-full whitespace-nowrap max-md:max-w-full"
            >
              <!-- Search Bar -->
              <div
                class="flex flex-wrap flex-auto gap-10 px-8 py-2.5 text-xl text-gray-400 rounded-3xl bg-slate-100 max-md:px-5 max-md:max-w-full hover:shadow-md transition-shadow"
                role="search"
              >
                <label for="search" class="sr-only">Search</label>
                <span class="my-auto">Search</span>
                <button
                  type="button"
                  aria-label="Search"
                  class="transition-transform hover:scale-110 active:scale-95"
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
                  class="object-contain shrink-0 rounded-full aspect-square w-[59px] hover:shadow-lg transition-shadow"
                />
                <div class="flex flex-col self-start mt-1">
                  <div class="self-start text-xl font-bold">Admin</div>
                  <div class="mt-3.5 text-base">LoremIpsum@gmail.com</div>
                </div>
              </div>
            </div>

            <!-- Form Section -->
            <h2 class="mt-20 text-4xl font-bold text-blue-950 max-md:mt-10">
              Add New Product
            </h2>

            <form id="product-form" class="w-full">
              <!-- Product Name Field -->
              <div class="mt-16 max-md:mt-10 input-container">
                <label
                  for="product-name"
                  class="text-xl font-medium text-zinc-400"
                  >Product Name</label
                >
                <input
                  id="product-name"
                  type="text"
                  class="w-full mt-2 pb-2 form-input border-b border-gray-400 focus:outline-none"
                  required
                />
              </div>

              <!-- SKU Field -->
              <div class="mt-14 max-md:mt-10 input-container">
                <label for="sku" class="text-xl font-medium text-zinc-400"
                  >SKU</label
                >
                <input
                  id="sku"
                  type="text"
                  class="w-full mt-2 pb-2 form-input border-b border-gray-400 focus:outline-none"
                  required
                />
              </div>

              <!-- Price and Stock Fields -->
              <div
                class="flex flex-wrap gap-10 mt-16 max-w-full text-xl font-medium whitespace-nowrap text-zinc-400 w-[915px] max-md:mt-10"
              >
                <!-- Price Field -->
                <div
                  class="flex flex-col flex-1 grow shrink-0 basis-0 w-fit input-container"
                >
                  <label for="price" class="self-start">Price</label>
                  <input
                    id="price"
                    type="number"
                    class="w-full mt-2 pb-2 form-input border-b border-gray-400 focus:outline-none"
                    required
                  />
                </div>

                <!-- Stock Field -->
                <div
                  class="flex flex-col flex-1 grow shrink-0 self-start basis-0 w-fit input-container"
                >
                  <label for="stock" class="self-start">Stock</label>
                  <input
                    id="stock"
                    type="number"
                    class="w-full mt-2 pb-2 form-input border-b border-gray-400 focus:outline-none"
                    required
                  />
                </div>
              </div>

              <!-- Category Field -->
              <div class="mt-16 max-md:mt-10 input-container">
                <div
                  class="flex flex-wrap gap-5 justify-between max-w-full text-xl font-medium whitespace-nowrap text-zinc-400 w-[904px]"
                >
                  <label for="category" class="self-start">Category</label>
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/b3b2d34d0646fedc6499723e797c71622c0a489b?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                    alt="Dropdown arrow"
                    class="object-contain shrink-0 self-start mt-2 aspect-[1.75] w-[21px] transition-transform duration-300 category-arrow"
                    aria-hidden="true"
                  />
                </div>
                <select
                  id="category"
                  class="w-full mt-2 pb-2 form-input border-b border-gray-400 focus:outline-none appearance-none bg-transparent"
                  required
                >
                  <option value="" selected disabled>Select a category</option>
                  <option value="food">Food</option>
                  <option value="toys">Toys</option>
                  <option value="accessories">Accessories</option>
                </select>
              </div>

              <!-- Description Field -->
              <div class="mt-14 max-md:mt-10 input-container">
                <label
                  for="description"
                  class="text-xl font-medium text-zinc-400"
                  >Deskripsi</label
                >
                <textarea
                  id="description"
                  class="w-full mt-2 pb-2 form-input border-b border-gray-400 focus:outline-none"
                  rows="3"
                ></textarea>
              </div>

              <!-- Product Photo Field -->
              <div class="mt-14 max-md:mt-10 input-container">
                <label
                  for="product-photo"
                  class="text-xl font-medium text-zinc-400"
                  >Project Photo</label
                >
                <div class="flex gap-3 mt-6 text-xl text-zinc-400">
                  <label
                    for="product-photo"
                    class="px-9 py-1.5 border border-solid border-zinc-600 max-md:px-5 cursor-pointer file-label hover:bg-slate-100"
                  >
                    Chose file
                  </label>
                  <span id="file-name" class="my-auto basis-auto"
                    >No file chosen</span
                  >
                  <input
                    type="file"
                    id="product-photo"
                    class="hidden"
                    accept="image/*"
                  />
                </div>
              </div>

              <!-- Submit Button -->
              <button
                type="submit"
                id="submit-btn"
                class="px-5 py-7 mt-8 text-xl font-bold text-white rounded-2xl bg-slate-600 hover:bg-slate-700 transition-all focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 btn-submit"
              >
                <span>Add Product</span>
                <div class="spinner ml-3 inline-block"></div>
              </button>
            </form>
          </div>
        </section>
      </div>
    </main>

    <script>
      // Handle file input display with animation
      document
        .getElementById("product-photo")
        .addEventListener("change", function (e) {
          const fileNameElement = document.getElementById("file-name");
          const fileName = e.target.files[0]
            ? e.target.files[0].name
            : "No file chosen";

          // Add fade out/in animation
          fileNameElement.style.opacity = "0";
          setTimeout(() => {
            fileNameElement.textContent = fileName;
            fileNameElement.style.opacity = "1";
          }, 300);
        });

      // Category dropdown animation
      document
        .getElementById("category")
        .addEventListener("focus", function () {
          document.querySelector(".category-arrow").style.transform =
            "rotate(180deg)";
        });

      document.getElementById("category").addEventListener("blur", function () {
        document.querySelector(".category-arrow").style.transform = "rotate(0)";
      });

      // Form submission handling with loading state
      document
        .getElementById("product-form")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          // Show loading overlay
          const loadingOverlay = document.getElementById("loading-overlay");
          const submitBtn = document.getElementById("submit-btn");
          const spinner = submitBtn.querySelector(".spinner");

          // Disable button and show spinner
          submitBtn.disabled = true;
          submitBtn.querySelector("span").style.opacity = "0.7";
          spinner.style.display = "inline-block";

          // Show loading overlay with delay for better UX
          setTimeout(() => {
            loadingOverlay.classList.add("active");
          }, 300);

          // Simulate form submission (replace with actual API call)
          setTimeout(() => {
            // Hide loading overlay
            loadingOverlay.classList.remove("active");

            // Reset button state
            submitBtn.disabled = false;
            submitBtn.querySelector("span").style.opacity = "1";
            spinner.style.display = "none";

            // Show success message
            showNotification("Product added successfully!", "success");

            // Reset form
            document.getElementById("product-form").reset();
            document.getElementById("file-name").textContent = "No file chosen";
          }, 2000);
        });

      // Notification system
      function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement("div");
        notification.className = `fixed top-5 right-5 px-6 py-3 rounded-lg shadow-lg text-white ${
          type === "success" ? "bg-green-500" : "bg-red-500"
        } transform transition-all duration-500 opacity-0 translate-y-[-20px]`;
        notification.textContent = message;

        // Add to DOM
        document.body.appendChild(notification);

        // Trigger animation
        setTimeout(() => {
          notification.style.opacity = "1";
          notification.style.transform = "translateY(0)";
        }, 10);

        // Remove after delay
        setTimeout(() => {
          notification.style.opacity = "0";
          notification.style.transform = "translateY(-20px)";

          setTimeout(() => {
            notification.remove();
          }, 500);
        }, 3000);
      }

      // Add animation to form inputs when focused
      const formInputs = document.querySelectorAll(".form-input");
      formInputs.forEach((input) => {
        // Add focus animation
        input.addEventListener("focus", function () {
          this.parentElement.classList.add("focused");
        });

        // Remove focus animation
        input.addEventListener("blur", function () {
          this.parentElement.classList.remove("focused");
        });
      });

      // Ensure keyboard navigation works properly
      const navItems = document.querySelectorAll(".sidebar-item");
      navItems.forEach((item) => {
        item.addEventListener("keydown", function (e) {
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            this.click();
          }
        });
      });

      // Add page transition effect when navigating
      document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", function (e) {
          // Only for demo purposes - prevent actual navigation
          if (!this.classList.contains("active")) {
            e.preventDefault();

            // Fade out current page
            document.querySelector(".page-content").style.opacity = "0";
            document.querySelector(".page-content").style.transform =
              "translateY(10px)";

            // Simulate page navigation after animation
            setTimeout(() => {
              // In a real app, this would navigate to the new page
              // For demo, we'll just reset the animation
              document.querySelector(".page-content").style.opacity = "1";
              document.querySelector(".page-content").style.transform =
                "translateY(0)";
            }, 500);
          }
        });
      });
    </script>
  </body>
</html>
