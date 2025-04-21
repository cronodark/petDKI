<!doctype html>
<html lang="en">
@extends('layouts.app')

<style>
@import url("https://fonts.googleapis.com/css2?family=Paytone+One&display=swap");

.font-paytone {
  font-family:
    "Paytone One",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
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

<div class="flex flex-wrap gap-10">
  <div
    class="flex overflow-hidden flex-col grow shrink-0 pt-16 bg-white basis-0 w-fit max-md:max-w-full"
  >
    <header
      class="flex gap-10 items-center self-center w-full max-w-[1315px] text-slate-600 max-md:max-w-full"
    >
      <h1 class="grow self-stretch text-6xl font-medium max-md:text-4xl">
        <span class="font-paytone" style="color: rgba(55, 73, 106, 1)"
          >Pet</span
        >
        <span class="font-paytone">DKI</span>
      </h1>

      <div
        class="flex flex-wrap gap-10 self-stretch px-8 py-2.5 my-auto text-xl text-gray-400 whitespace-nowrap rounded-3xl bg-slate-100 max-md:px-5 max-md:max-w-full"
      >
        <input
          type="search"
          placeholder="Search"
          class="bg-transparent search-input"
        />
        <img
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/c088c1e8e05d8cec874c3fb675968377fa9767b8245cc01b8c3ac7ad58b57075?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
          alt="Search"
          class="object-contain shrink-0 w-10 aspect-square"
        />
      </div>

      <div class="flex gap-5 self-stretch my-auto whitespace-nowrap">
        <img
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/b08577e4bd3b5d02a7a299862de11ab76c30ca9d07f81f99bd859ec74bdf63b2?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
          alt="Admin Profile"
          class="object-contain shrink-0 rounded-full aspect-square w-[59px]"
        />
        <div class="flex flex-col self-start mt-1">
          <div class="self-start text-xl font-bold">Admin</div>
          <div class="mt-3.5 text-base">LoremIpsum@gmail.com</div>
        </div>
      </div>
    </header>

    <div class="mt-7 max-md:max-w-full">
      <div class="flex gap-5 max-md:flex-col">
        <nav class="w-[26%] max-md:ml-0 max-md:w-full">
          <div class="flex flex-col grow text-2xl text-white max-md:mt-10">
            <div class="self-center font-bold">PET DKI</div>
            <div
              class="flex flex-col items-start py-24 pl-6 mt-1.5 w-full font-medium rounded-none bg-slate-600 max-md:pt-24 max-md:pl-5"
            >
              <a
                href="#"
                class="flex gap-6 ml-8 whitespace-nowrap max-md:ml-2.5 nav-link"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/fb04244f6765b90bac3e757ac89140ce60ed974e3d612f2eaf184f467aed2f6c?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="Dashboard"
                  class="object-contain shrink-0 aspect-square w-[46px]"
                />
                <span class="my-auto">Dashboard</span>
              </a>

              <a
                href="#"
                class="flex gap-6 self-stretch px-5 py-2.5 mt-6 whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600 max-md:px-5 nav-link"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/d3336bcfb678ddacf284b9dfa43f29d4ebb6bb0d74e7ce47f688cbadaf62948c?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="Product"
                  class="object-contain shrink-0 w-14 aspect-square"
                />
                <span class="grow shrink my-auto w-[204px]">Product</span>
              </a>

              <a
                href="#"
                class="flex gap-8 mt-7 ml-6 whitespace-nowrap max-md:ml-2.5 nav-link"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/ad68e20161d2e1516b80af4271ca8e89521928208635b785844e7c3a3aa5d9d4?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="Transaction"
                  class="object-contain shrink-0 aspect-square w-[46px]"
                />
                <span class="my-auto">Transaction</span>
              </a>

            <a
                href="#"
                class="flex gap-9 mt-11 ml-7 max-md:mt-10 max-md:ml-2.5 nav-link"
            >
                <img
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/7329b5a0-a3e9-4b5a-8433-931521ada27b?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                alt="POS icon"
                class="object-contain shrink-0 aspect-[1.02] w-[42px]"
                />
                <span class="my-auto basis-auto">Point of Sell</span>
            </a>

              <a
                href="#"
                class="flex gap-7 mt-80 ml-7 max-md:mt-10 max-md:ml-2.5 nav-link"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/a59312e49fa0f69fcea2bc744ed7cc093a0dec6e9b93cf04a408bdfab9b8a93d?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="Log out"
                  class="object-contain shrink-0 aspect-[0.89] w-[34px]"
                />
                <span class="self-start">Log out</span>
              </a>
            </div>
          </div>
        </nav>

        <main class="ml-5 w-[74%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col items-start mt-6 w-full max-md:mt-10 max-md:max-w-full"
          >
            <div
              class="flex flex-wrap gap-5 justify-between max-w-full font-bold w-[974px]"
            >
              <h2 class="self-start mt-3.5 text-4xl text-blue-950">Product</h2>
              <div class="flex gap-1 text-xl">
                <button
                  class="flex gap-5 items-start px-8 py-5 whitespace-nowrap rounded-2xl bg-slate-100 text-slate-600 max-md:px-5 btn-hover"
                >
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/5fceb2b38570db72ffd3900e2dcc53fdd3b9d6da59bad07f63c84cc6caa5a517?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                    alt="Filter"
                    class="object-contain shrink-0 aspect-[0.87] w-[27px]"
                  />
                  <span>Filter</span>
                </button>
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/9ace39f6510d97ac9d07fb1001b22d649cf0e42c73a1e9b76cea25cb6f105a84?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="More options"
                  class="object-contain shrink-0 my-auto w-6 aspect-square"
                />
                <button
                  class="px-3.5 py-7 text-white rounded-2xl bg-slate-600 max-md:pr-5 btn-hover"
                >
                  Add Product
                </button>
              </div>
            </div>

            <section
              class="flex flex-col self-stretch pb-7 mt-10 w-full rounded-2xl bg-slate-100 max-md:max-w-full"
            >
              <div
                class="flex flex-wrap gap-5 justify-between items-start py-7 pr-20 pl-10 mr-0 w-full text-xl font-medium text-amber-200 rounded-2xl bg-slate-600 max-md:px-5 max-md:max-w-full"
              >
                <div class="flex gap-10 self-stretch max-md:max-w-full">
                  <div>Image</div>
                  <div class="text-center">SKU</div>
                  <div class="text-center basis-auto">Product name</div>
                  <div class="text-center basis-auto">Category</div>
                  <div>Price</div>
                </div>
                <div class="flex gap-1.5 whitespace-nowrap">
                  <div>Stock</div>
                  <div
                    class="flex shrink-0 self-start mt-2 w-2 bg-amber-200 h-[13px]"
                  ></div>
                </div>
                <div class="flex gap-1.5 whitespace-nowrap">
                  <div>Description</div>
                  <div
                    class="flex shrink-0 self-start mt-1.5 bg-amber-200 h-[15px] w-[7px]"
                  ></div>
                </div>
              </div>

              <div class="self-center mt-5 max-w-full w-[950px]">
                <div class="flex gap-5 max-md:flex-col">
                  <div class="w-[65%] max-md:ml-0 max-md:w-full">
                    <div class="w-full max-md:mt-10 max-md:max-w-full">
                      <!-- Product rows -->
                      <div
                        class="flex gap-10 items-center text-xl font-medium text-slate-600 max-md:max-w-full table-row"
                      >
                        <img
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ab02fa0d485e0052a3178022cdfc72b9e1f61ca03348749d87918bd12a88778?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                          alt="Product"
                          class="object-contain shrink-0 self-stretch rounded-full aspect-square w-[53px]"
                        />
                        <div class="grow shrink self-stretch my-auto w-[115px]">
                          KS93528TUT
                        </div>
                        <div class="grow shrink self-stretch my-auto w-[93px]">
                          Product 1
                        </div>
                      </div>

                      <!-- Repeat for other products -->
                    </div>
                  </div>

                  <div class="ml-5 w-[16%] max-md:ml-0 max-md:w-full">
                    <div
                      class="self-stretch my-auto text-xl font-medium text-slate-600 max-md:mt-10"
                    >
                      <div class="max-md:mr-1">Category 1</div>
                      <div class="mt-20 max-md:mt-10 max-md:mr-1.5">
                        Category 1
                      </div>
                      <div class="mt-20 max-md:mt-10 max-md:mr-1">
                        Category 1
                      </div>
                      <div class="mt-20 max-md:mt-10 max-md:mr-1">
                        Category 1
                      </div>
                      <div class="mt-20 max-md:mt-10">Category 1</div>
                    </div>
                  </div>

                  <div class="ml-5 w-1/5 max-md:ml-0 max-md:w-full">
                    <div
                      class="self-stretch my-auto text-xl font-medium text-slate-600 max-md:mt-10"
                    >
                      <div>Rp. 200.000</div>
                      <div class="mt-20 max-md:mt-10">Rp. 200.000</div>
                      <div class="mt-20 max-md:mt-10">Rp. 200.000</div>
                      <div class="mt-20 max-md:mt-10">Rp. 200.000</div>
                      <div class="mt-20 max-md:mt-10">Rp. 200.000</div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <nav
              class="flex flex-wrap gap-5 justify-between items-start mt-8 ml-7 max-w-full text-xl font-medium whitespace-nowrap text-slate-600 w-[922px]"
              aria-label="Pagination"
            >
              <button class="flex gap-3 btn-hover">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f9eeb852c9228af465aad9202d63771acf8cbcb06142bf0338c68c844ecb442?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="Previous"
                  class="object-contain shrink-0 self-start w-3 aspect-[0.55]"
                />
                <span>Previous</span>
              </button>

              <div class="flex gap-5 items-start self-stretch">
                <button class="btn-hover">1</button>
                <button
                  class="self-stretch px-2 pt-px pb-2.5 text-white rounded-md bg-slate-600 h-[25px] w-[25px]"
                >
                  2
                </button>
                <button class="btn-hover">3</button>
              </div>

              <button class="flex gap-3.5 items-start btn-hover">
                <span>next</span>
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/856aa508a88fbfce4ee4850206428da9a4a53d1bdfce483454f6838c42d9bcbb?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  alt="Next"
                  class="object-contain shrink-0 w-3 aspect-[0.55]"
                />
              </button>
            </nav>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
</html>