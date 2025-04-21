<!doctype html>
<html lang="en">
@extends('layouts.app')

<style>
@import url("https://fonts.googleapis.com/css2?family=Paytone+One&display=swap");

.font-paytone {
  font-family: "Paytone One", -apple-system, Roboto, Helvetica, sans-serif;
}

.nav-link {
  transition: all 0.2s ease-in-out;
}
.nav-link:hover {
  transform: translateX(5px);
  background-color: rgba(255, 255, 255, 0.1);
}
.search-input {
  transition: all 0.2s ease-in-out;
}
.search-input:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(55, 73, 106, 0.2);
}
.table-row {
  transition: all 0.2s ease-in-out;
}
.table-row:hover {
  background-color: rgba(241, 245, 249, 0.5);
}
.btn-hover {
  transition: all 0.2s ease-in-out;
}
.btn-hover:hover {
  transform: translateY(-2px);
  box-shadow:
    0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -1px rgba(0, 0, 0, 0.06);
}
</style>

<body class="bg-white text-slate-600">
  <div class="flex flex-col min-h-screen w-full">
    <div class="w-full max-w-screen-xl mx-auto px-4 md:px-6 lg:px-8 pt-10">
      <!-- Header -->
      <header class="flex flex-col md:flex-row items-center justify-between gap-6">
  <!-- Left: Title -->
  <div class="flex items-center gap-6">
    <h1 class="text-6xl text-slate-600 max-md:text-4xl font-paytone">
      <span style="color: rgba(55, 73, 106, 1)">Pet</span> DKI
    </h1>
  </div>

  <!-- Center: Search Bar -->
  <div class="flex justify-center flex-1">
    <div class="flex items-center gap-4 rounded-3xl bg-slate-100 px-4 py-2">
      <input
        type="search"
        placeholder="Search"
        class="bg-transparent text-xl search-input"
      />
      <img
        src="https://cdn.builder.io/api/v1/image/assets/TEMP/c088c1e8e05d8cec874c3fb675968377fa9767b8245cc01b8c3ac7ad58b57075"
        alt="Search"
        class="w-8 h-8"
      />
    </div>
  </div>

  <!-- Right: Admin Info -->
  <div class="flex items-center gap-4">
    <img
      src="https://cdn.builder.io/api/v1/image/assets/TEMP/b08577e4bd3b5d02a7a299862de11ab76c30ca9d07f81f99bd859ec74bdf63b2"
      alt="Admin"
      class="w-12 h-12 rounded-full object-cover"
    />
    <div>
      <div class="text-lg font-bold">Admin</div>
      <div class="text-sm">LoremIpsum@gmail.com</div>
    </div>
  </div>
</header>

      <!-- Main Layout -->
      <div class="flex flex-col md:flex-row mt-10 gap-0">
        <!-- Sidebar -->
        <div class="overflow-hidden pt-16 bg-white">
      <div class="flex gap-5 max-md:flex-col">
        <nav class="w-[27%] max-md:ml-0 max-md:w-full">
      <div class="flex flex-col grow items-center max-md:mt-10">

        <div
          class="flex flex-col items-start self-stretch pt-24 pl-6 mt-1.5 w-full rounded-none bg-slate-600 pb-[533px] max-md:py-24 max-md:pl-5"
        >
          <a
            href="#"
            class="flex gap-6 self-stretch px-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600 max-md:px-5 nav-link"
          >
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/ad5fb5ea4f01b2f1fa23e3175d998204927def8dcb98708cf18ded71aa6099da?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
              class="object-contain shrink-0 aspect-square w-[46px]"
              alt="Dashboard icon"
            />
            <span class="grow shrink self-start mt-2.5 w-[196px]"
              >Dashboard</span
            >
          </a>

          <div class="flex gap-6 mt-5 ml-5 max-md:ml-2.5">
            <div>
              <a href="#" class="nav-link flex items-center">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/8c5c839fd7a9aee984156118f70162f2241146ff31feeeea95822c1c37f77588?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  class="object-contain w-14 aspect-square"
                  alt="Product icon"
                />
              </a>
              <a href="#" class="nav-link flex items-center mt-9">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/ad68e20161d2e1516b80af4271ca8e89521928208635b785844e7c3a3aa5d9d4?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  class="object-contain aspect-square w-[46px] max-md:mr-1.5"
                  alt="Transaction icon"
                />
              </a>
            </div>
            <div
              class="flex flex-col my-auto text-2xl font-medium text-white whitespace-nowrap"
            >
              <a href="#" class="nav-link">Product</a>
              <a href="#" class="nav-link mt-16 max-md:mt-10">Transaction</a>
            </div>
          </div>

          <a
            href="#"
            class="flex gap-8 mt-10 ml-7 text-2xl font-medium text-white whitespace-nowrap max-md:ml-2.5 nav-link"
          >
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/f43c72e31022eacad887b8cbe7881d11e539f0ab5c3ac0d820bfea3131d6eec1?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
              class="object-contain shrink-0 aspect-[1.18] w-[46px]"
              alt="Employee icon"
            />
            <span class="my-auto">Employee</span>
          </a>

          <a
            href="#"
            class="flex gap-7 mt-80 mb-0 ml-7 text-2xl font-medium text-white max-md:mt-10 max-md:mb-2.5 max-md:ml-2.5 nav-link"
          >
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/a59312e49fa0f69fcea2bc744ed7cc093a0dec6e9b93cf04a408bdfab9b8a93d?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
              class="object-contain shrink-0 aspect-[0.89] w-[34px]"
              alt="Logout icon"
            />
            <span>Log out</span>
          </a>
        </div>
      </div>
    </nav>

        <!-- Main Content -->
        <main class="w-full md:w-3/4">
          <div class="flex flex-col gap-6">
            <div class="flex justify-between items-center">
              <h2 class="text-3xl font-bold text-blue-950">Product</h2>
              <div class="flex gap-2">
                <button class="btn-hover bg-slate-100 px-4 py-2 rounded-xl flex items-center gap-2 text-slate-600">
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5fceb2b38570db72ffd3900e2dcc53fdd3b9d6da59bad07f63c84cc6caa5a517" class="w-5" />
                  <span>Filter</span>
                </button>
                <button class="btn-hover bg-slate-100 px-4 py-2 rounded-xl flex items-center gap-2 text-slate-600">
                  <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5fceb2b38570db72ffd3900e2dcc53fdd3b9d6da59bad07f63c84cc6caa5a517" class="w-5" />
                  <span>Export</span>
                </button>
              </div>
            </div>

            <!-- Table Section -->
            <section class="bg-slate-100 p-6 rounded-2xl w-full overflow-auto">
              <div class="bg-slate-600 text-white px-4 py-3 rounded-t-xl text-lg">
                <table class="w-full text-left border-collapse">
                  <thead>
                    <tr>
                      <th class="px-4 py-2">Image</th>
                      <th class="px-4 py-2">SKU</th>
                      <th class="px-4 py-2">Product Name</th>
                      <th class="px-4 py-2">Category</th>
                      <th class="px-4 py-2">Price</th>
                    </tr>
                  </thead>
                  <tbody class="text-slate-600 bg-white">
                    <!-- Repeat rows as needed -->
                    <tr class="border-b">
                      <td class="px-4 py-2">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ab02fa0d485e0052a3178022cdfc72b9e1f61ca03348749d87918bd12a88778" class="rounded-full w-12 h-12 object-cover" />
                      </td>
                      <td class="px-4 py-2">KS93528TUT</td>
                      <td class="px-4 py-2">Product 1</td>
                      <td class="px-4 py-2">Category A</td>
                      <td class="px-4 py-2">Rp.200.000</td>
                    </tr>
                    
                      <td class="px-4 py-2">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ab02fa0d485e0052a3178022cdfc72b9e1f61ca03348749d87918bd12a88778" class="rounded-full w-12 h-12 object-cover" />
                      </td>
                      <td class="px-4 py-2">KS93528TUT</td>
                      <td class="px-4 py-2">Product 1</td>
                      <td class="px-4 py-2">Category A</td>
                      <td class="px-4 py-2">Rp.200.000</td>
                    </tr>
                    
                      <td class="px-4 py-2">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ab02fa0d485e0052a3178022cdfc72b9e1f61ca03348749d87918bd12a88778" class="rounded-full w-12 h-12 object-cover" />
                      </td>
                      <td class="px-4 py-2">KS93528TUT</td>
                      <td class="px-4 py-2">Product 1</td>
                      <td class="px-4 py-2">Category A</td>
                      <td class="px-4 py-2">Rp.200.000</td>
                    </tr>
                    <!-- More rows... -->
                  </tbody>
                </table>
              </div>
            </section>

            <!-- Pagination -->
            <nav class="flex justify-between items-center text-lg mt-4 text-slate-600">
              <button class="flex items-center gap-2 btn-hover">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f9eeb852c9228af465aad9202d63771acf8cbcb06142bf0338c68c844ecb442" class="w-3" />
                Previous
              </button>
              <div class="flex gap-3 items-center">
                <button class="btn-hover">1</button>
                <button class="bg-slate-600 text-white px-3 py-1 rounded">2</button>
                <button class="btn-hover">3</button>
              </div>
              <button class="flex items-center gap-2 btn-hover">
                Next
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/856aa508a88fbfce4ee4850206428da9a4a53d1bdfce483454f6838c42d9bcbb" class="w-3" />
              </button>
            </nav>
          </div>
        </main>
      </div>
    </div>
  </div>
</body>
</html>
