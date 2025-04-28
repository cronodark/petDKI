<!doctype html>
<html lang="en">
@extends('layouts.app')
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet DKI Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css" />
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Initialize Intersection Observer for animations
        const observer = new IntersectionObserver(
          (entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting) {
                entry.target.classList.add("animate-fade-in");

                // Animate progress bars when in view
                const progressBar = entry.target.querySelector(".progress-bar");
                if (progressBar) {
                  progressBar.classList.add("animate");
                }
              }
            });
          },
          { threshold: 0.1 },
        );

        // Observe all cards and sections
        document
          .querySelectorAll(".stats-card, .graph-container, .recent-stock")
          .forEach((el) => {
            observer.observe(el);
          });

        // Simulate graph loading
        const graphContainer = document.querySelector(".graph-container");
        const graphLoading = document.querySelector(".graph-loading");

        if (graphContainer && graphLoading) {
          graphLoading.classList.add("active");
          setTimeout(() => {
            graphLoading.classList.remove("active");
          }, 1500);
        }
      });
    </script>

<style>
/* Base styles */
.font-paytone {
  font-family:
    "Paytone One",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
}

/* Animation Keyframes */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
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

@keyframes progressBar {
  from {
    width: 0;
  }
}

@keyframes pulse {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0.6;
  }
  100% {
    opacity: 1;
  }
}

/* Animation Classes */
.animate-fade-in {
  opacity: 0;
  animation: fadeIn 0.6s ease-out forwards;
}

.animate-scale-in {
  opacity: 0;
  animation: scaleIn 0.5s ease-out forwards;
}

.animate-progress {
  animation: progressBar 1s ease-out forwards;
}

.loading {
  animation: pulse 1.5s infinite;
}

/* Stagger delays for cards */
.stats-card:nth-child(1) {
  animation-delay: 0.1s;
}
.stats-card:nth-child(2) {
  animation-delay: 0.2s;
}
.stats-card:nth-child(3) {
  animation-delay: 0.3s;
}

/* Enhanced transitions */
a,
button {
  transition: all 0.3s ease;
}

a:hover,
button:hover {
  opacity: 0.9;
  transform: translateY(-2px);
}

.nav-item {
  transition: all 0.3s ease;
}

.nav-item:hover {
  background-color: rgba(255, 255, 255, 0.1);
  transform: translateX(5px);
}

/* Progress bar animations */
.progress-bar {
  width: 0;
  transition: width 1s ease-in-out;
}

.progress-bar.animate {
  width: 100%;
}

/* Graph loading animation */
.graph-container {
  position: relative;
}

.graph-loading {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(51, 65, 85, 0.9);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.graph-loading.active {
  opacity: 1;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .max-md\:flex-col {
    flex-direction: column;
  }
}

</style>

  </head>
  <body class="bg-white">
    <main class="overflow-hidden pt-16 pr-16 bg-white max-md:pr-5">
      <div class="flex gap-5 max-md:flex-col">
        <!-- Sidebar Navigation -->
        <nav class="w-[27%] max-md:ml-0 max-md:w-full">
  <div class="flex flex-col grow items-center text-2xl font-medium text-white max-md:mt-10">
    <header class="text-6xl text-slate-600 max-md:text-4xl">
      <span class="font-paytone text-[#37496A]">Pet</span>
      <span class="font-paytone">DKI</span>
    </header>

    <h1 class="mt-7 font-bold">PET DKI</h1>

    <div class="flex flex-col self-stretch py-20 pl-6 mt-1.5 w-full rounded-none bg-slate-600 max-md:pl-5">
      <a href="#" class="nav-item flex items-center gap-4 px-8 py-3.5 whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600 max-md:px-5">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ad5fb5ea4f01b2f1fa23e3175d998204927def8dcb98708cf18ded71aa6099da" alt="Dashboard icon" class="object-contain w-[46px] aspect-square">
        <span>Dashboard</span>
      </a>

      <a href="#" class="nav-item flex items-center gap-4 mt-9 px-8 text-white">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/7b6e8336facbbf64e12d30c6f03c59d4dbadb14e0ce2c2f4a1e2e3cc6a7f02ae" alt="Product icon" class="object-contain w-14 aspect-square">
        <span>Product</span>
      </a>

      <a href="#" class="nav-item flex items-center gap-4 mt-11 px-8 text-white">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6fee9d8c13b08f33f05f6f94f26a1607d10c062a3aad86220366f1a76fb166b0" alt="Category icon" class="object-contain w-[54px] aspect-square">
        <span>Category</span>
      </a>

      <a href="#" class="nav-item flex items-center gap-4 mt-10 px-8 text-white">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/02d5db70d7b9cfec707b0c46460e9c4cb78ae0bfad4ba091eb99df309de6bdcf" alt="Supplier icon" class="object-contain w-[39px] aspect-square">
        <span>Supplier</span>
      </a>

      <a href="#" class="nav-item flex items-center gap-4 mt-72 px-8 text-white max-md:mt-10">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a59312e49fa0f69fcea2bc744ed7cc093a0dec6e9b93cf04a408bdfab9b8a93d" alt="Logout icon" class="object-contain w-[34px] aspect-square">
        <span>Log out</span>
      </a>
    </div>
  </div>
</nav>


        <!-- Main Content -->
        <section class="ml-5 w-[73%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col self-stretch my-auto w-full max-md:mt-10 max-md:max-w-full"
          >
            <!-- Header with Search and Profile -->
            <header
              class="flex flex-wrap gap-10 w-full whitespace-nowrap max-md:mr-1 max-md:max-w-full"
            >
              <div
                class="flex flex-wrap flex-auto gap-10 px-8 py-2.5 text-xl text-gray-400 rounded-3xl bg-slate-100 max-md:px-5 max-md:max-w-full"
              >
                <input
                  type="search"
                  placeholder="Search"
                  class="bg-transparent outline-none"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/c088c1e8e05d8cec874c3fb675968377fa9767b8245cc01b8c3ac7ad58b57075?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="Search"
                  class="object-contain shrink-0 w-10 aspect-square"
                />
              </div>

              <div class="flex shrink gap-5 basis-auto grow-0 text-slate-600">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/b08577e4bd3b5d02a7a299862de11ab76c30ca9d07f81f99bd859ec74bdf63b2?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="Admin profile"
                  class="object-contain shrink-0 rounded-full aspect-square w-[59px]"
                />
                <div class="flex flex-col self-start mt-1">
                  <h2 class="self-start text-xl font-bold">Admin</h2>
                  <p class="mt-3.5 text-base">LoremIpsum@gmail.com</p>
                </div>
              </div>
            </header>

            <h1
              class="self-start mt-20 text-4xl font-bold text-blue-950 max-md:mt-10"
            >
              Dashboard
            </h1>

            <!-- Stats Cards -->
            <section class="mt-11 max-md:mt-10 max-md:max-w-full">
              <div class="flex gap-5 max-md:flex-col">
                <!-- Stock Card -->
                <article
                  class="stats-card w-[33%] max-md:ml-0 max-md:w-full animate-scale-in"
                >
                  <div
                    class="flex flex-col grow items-start px-6 pt-5 pb-8 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-9"
                  >
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/3b01d7d9c73fc73368b029d24eca4e07f4c497bbefc721458fe15b33208766de?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                      alt="Stock icon"
                      class="object-contain w-10 aspect-square"
                    />
                    <strong class="mt-3 text-3xl font-extrabold text-amber-200"
                      >5.200</strong
                    >
                    <h3 class="mt-6 text-xl text-white">Stock</h3>
                    <div
                      class="flex flex-col items-start self-stretch mt-9 w-full bg-white rounded-[40px]"
                    >
                      <div
                        class="progress-bar flex shrink-0 bg-amber-200 h-[18px] rounded-[40px]"
                        style="--target-width: 186px"
                      ></div>
                    </div>
                  </div>
                </article>

                <!-- Category Card -->
                <article
                  class="stats-card w-[33%] max-md:ml-0 max-md:w-full animate-scale-in"
                >
                  <div
                    class="flex flex-col grow items-start px-6 pt-5 pb-8 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-9"
                  >
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba716eb38d206e034a199cf87545f042b9e5b01a096ee3ffc5386f8cd16fcce6?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                      alt="Category icon"
                      class="object-contain aspect-square w-[37px]"
                    />
                    <strong
                      class="mt-3.5 text-3xl font-extrabold text-amber-200"
                      >10</strong
                    >
                    <h3 class="mt-6 text-xl text-white">Category</h3>
                    <div
                      class="flex flex-col items-start self-stretch mt-8 bg-white rounded-[40px]"
                    >
                      <div
                        class="progress-bar flex shrink-0 bg-amber-200 h-[18px] rounded-[40px]"
                        style="--target-width: 147px"
                      ></div>
                    </div>
                  </div>
                </article>

                <!-- Supplier Card -->
                <article
                  class="stats-card w-[33%] max-md:ml-0 max-md:w-full animate-scale-in"
                >
                  <div
                    class="flex flex-col grow items-start px-6 pt-5 pb-8 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-9"
                  >
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/abe59c4fd7158d3e8eae339b598959764d8f2b53672165cbcd6211b7211963b5?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                      alt="Supplier icon"
                      class="object-contain aspect-square w-[38px]"
                    />
                    <strong class="mt-4 text-3xl font-extrabold text-amber-200"
                      >5</strong
                    >
                    <h3 class="mt-6 text-xl text-white">Supplier</h3>
                    <div
                      class="flex flex-col items-start self-stretch mt-7 w-full bg-white rounded-[40px]"
                    >
                      <div
                        class="progress-bar flex shrink-0 bg-amber-200 h-[18px] rounded-[40px]"
                        style="--target-width: 93px"
                      ></div>
                    </div>
                  </div>
                </article>
              </div>
            </section>

            <!-- Analytics Section -->
            <section class="mt-9 max-md:max-w-full">
              <div class="flex gap-5 max-md:flex-col">
                <!-- Graph -->
                <article class="w-[67%] max-md:ml-0 max-md:w-full">
                  <div
                    class="flex overflow-hidden flex-col items-start px-8 py-10 mx-auto w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-7 max-md:max-w-full"
                  >
                    <strong
                      class="text-4xl font-bold tracking-tighter leading-none text-amber-200"
                      >320</strong
                    >
                    <h3 class="mt-6 text-xl text-white">Stock</h3>
                    <div
                      class="flex flex-wrap gap-4 self-stretch mt-20 max-md:mt-10"
                    >
                      <div
                        class="flex flex-col items-start self-end mt-11 text-xs font-medium tracking-tight leading-loose whitespace-nowrap text-slate-400 max-md:mt-10"
                      >
                        <span>110</span>
                        <span class="self-stretch mt-10">100</span>
                        <span class="mt-10">80</span>
                        <span class="mt-10">50</span>
                      </div>
                      <div
                        class="graph-container overflow-hidden grow shrink-0 basis-0 h-[191px] w-fit max-md:max-w-full"
                      >
                        <div class="graph-loading">
                          <div class="loading text-amber-200 text-xl">
                            Loading...
                          </div>
                        </div>
                        <img
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/c93217b7-bd57-4c5c-be80-cf1c815e5bb3?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                          alt="Analytics graph"
                          class="object-contain max-w-full aspect-[2.49] w-[529px]"
                        />
                      </div>
                    </div>
                  </div>
                </article>

                <!-- Recent Stock -->
                <aside class="w-[33%] max-md:ml-0 max-md:w-full">
                  <div
                    class="flex overflow-hidden flex-col grow items-start pt-5 pr-16 pb-8 pl-7 w-full text-xs tracking-tight leading-loose text-white rounded-3xl bg-slate-600 max-md:px-5 max-md:mt-7"
                  >
                    <h3
                      class="text-xl font-bold tracking-tight leading-relaxed text-amber-200"
                    >
                      Recent Stock
                    </h3>
                    <h4
                      class="mt-4 text-sm font-bold tracking-tight leading-6 text-white"
                    >
                      Product 1
                    </h4>
                    <p>Total Product : 200</p>
                    <p class="mt-9">Total Product : 200</p>
                    <p class="mt-9">Total Product : 200</p>
                    <p class="mt-9">Total Product : 200</p>
                    <p class="mt-9">Total Product : 200</p>
                    <p class="mt-9">Total Product : 200</p>
                  </div>
                </aside>
              </div>
            </section>
          </div>
        </section>
      </div>
    </main>
  </body>
</html>
