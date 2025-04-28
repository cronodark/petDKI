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

/* Hover animations */
.nav-link {
  transition:
    transform 0.2s ease,
    background-color 0.2s ease;
}

.nav-link:hover {
  transform: translateX(5px);
}

.card-hover {
  transition:
    transform 0.3s ease,
    box-shadow 0.3s ease;
}

.card-hover:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

/* Progress bar animation */
@keyframes progressFill {
  from {
    width: 0;
  }
  to {
    width: 100%;
  }
}

.progress-bar {
  animation: progressFill 1.5s ease-out forwards;
}

/* Fade in animation */
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

.fade-in {
  animation: fadeIn 0.5s ease-out forwards;
}

/* Scale animation for icons */
.icon-hover {
  transition: transform 0.2s ease;
}

.icon-hover:hover {
  transform: scale(1.1);
}


</style>


<div class="overflow-hidden pt-16 pr-16 bg-white max-md:pr-5">
  <div class="flex gap-5 max-md:flex-col">
    <nav class="w-[27%] max-md:ml-0 max-md:w-full">
      <div class="flex flex-col grow items-center max-md:mt-10">
        <h1 class="text-6xl text-slate-600 max-md:text-4xl">
          <span class="font-paytone" style="color: rgba(55, 73, 106, 1)"
            >Pet</span
          >
          <span class="font-paytone">DKI</span>
        </h1>
        <div class="mt-7 text-2xl font-bold text-white">PET DKI</div>

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

    <main class="ml-5 w-[73%] max-md:ml-0 max-md:w-full">
      <div class="flex flex-col mt-2 w-full max-md:mt-10 max-md:max-w-full">
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
              class="object-contain shrink-0 w-10 aspect-square"
              alt="Search icon"
            />
          </div>

          <div class="flex shrink gap-5 basis-auto grow-0 text-slate-600">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/b08577e4bd3b5d02a7a299862de11ab76c30ca9d07f81f99bd859ec74bdf63b2?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
              class="object-contain shrink-0 rounded-full aspect-square w-[59px]"
              alt="Admin avatar"
            />
            <div class="flex flex-col self-start mt-1">
              <div class="self-start text-xl font-bold">Admin</div>
              <div class="mt-3.5 text-base">LoremIpsum@gmail.com</div>
            </div>
          </div>
        </header>

        <h2
          class="self-start mt-20 text-4xl font-bold text-blue-950 max-md:mt-10"
        >
          Dashboard
        </h2>

        <section class="mt-11 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col">
            <article class="w-[33%] max-md:ml-0 max-md:w-full">
              <div
                class="flex flex-col grow items-start px-6 pt-5 pb-8 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-9 card-hover fade-in"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/070bb64c9a2dedb8d278fa8eacdcbe608c4919acf6ccf2bd34267323dd5597d4?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  class="object-contain w-10 aspect-square icon-hover"
                  alt="Stock icon"
                />
                <div class="mt-3 text-3xl font-extrabold text-amber-200">
                  5.200
                </div>
                <div class="mt-6 text-xl text-white">Stock</div>
                <div
                  class="flex flex-col items-start self-stretch mt-9 w-full bg-white rounded-[40px] max-md:pr-5"
                >
                  <div
                    class="flex shrink-0 bg-amber-200 h-[18px] rounded-[40px] w-[186px] progress-bar"
                  ></div>
                </div>
              </div>
            </article>

            <article class="w-[33%] max-md:ml-0 max-md:w-full">
              <div
                class="flex flex-col grow items-start px-6 pt-5 pb-8 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-9 card-hover fade-in"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1c11b8b4abf3f7fc6ce2e65d8d9290ee256520daa07ef421592b2667e8475d8?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  class="object-contain aspect-square w-[37px] icon-hover"
                  alt="Income icon"
                />
                <div class="mt-3.5 text-3xl font-extrabold text-amber-200">
                  Rp 5.000.000
                </div>
                <div class="mt-5 text-xl text-white">Income</div>
                <div
                  class="flex flex-col items-start self-stretch mt-9 bg-white rounded-[40px] max-md:pr-5"
                >
                  <div
                    class="flex shrink-0 bg-amber-200 h-[18px] rounded-[40px] w-[147px] progress-bar"
                  ></div>
                </div>
              </div>
            </article>

            <article class="w-[33%] max-md:ml-0 max-md:w-full">
              <div
                class="flex flex-col grow items-start px-6 pt-5 pb-8 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-9 card-hover fade-in"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/abe59c4fd7158d3e8eae339b598959764d8f2b53672165cbcd6211b7211963b5?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                  class="object-contain aspect-square w-[38px] icon-hover"
                  alt="Employee icon"
                />
                <div class="mt-4 text-3xl font-extrabold text-amber-200">5</div>
                <div class="mt-6 text-xl text-white">Employee</div>
                <div
                  class="flex flex-col items-start self-stretch mt-7 w-full bg-white rounded-[40px] max-md:pr-5"
                >
                  <div
                    class="flex shrink-0 bg-amber-200 h-[18px] rounded-[40px] w-[93px] progress-bar"
                  ></div>
                </div>
              </div>
            </article>
          </div>
        </section>

        <section class="mt-9 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col">
            <article class="w-[67%] max-md:ml-0 max-md:w-full">
              <div
                class="flex overflow-hidden flex-col items-start px-8 py-10 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-7 max-md:max-w-full fade-in"
              >
                <div
                  class="text-4xl font-bold tracking-tighter leading-none text-amber-200"
                >
                  320
                </div>
                <div class="mt-6 text-xl text-white">Buyer</div>
                <div
                  class="flex flex-wrap gap-4 self-stretch mt-20 max-md:mt-10"
                >
                  <div
                    class="flex flex-col items-start self-end mt-11 text-xs font-medium tracking-tight leading-loose whitespace-nowrap text-slate-400 max-md:mt-10"
                  >
                    <div>110</div>
                    <div class="self-stretch mt-10">100</div>
                    <div class="mt-10">80</div>
                    <div class="mt-10">50</div>
                  </div>
                  <div
                    class="overflow-hidden grow shrink-0 basis-0 h-[191px] w-fit max-md:max-w-full"
                  >
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/774c9ac6-d13f-412a-8b15-4408520e5b76?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                      class="object-contain max-w-full aspect-[2.49] w-[529px]"
                      alt="Buyer statistics graph"
                    />
                  </div>
                </div>
              </div>
            </article>

            <aside class="ml-5 w-[33%] max-md:ml-0 max-md:w-full">
              <div
                class="flex overflow-hidden flex-col items-start pt-5 pr-16 pb-8 pl-7 w-full text-xs tracking-tight leading-loose text-white rounded-3xl bg-slate-600 max-md:px-5 max-md:mt-7 fade-in"
              >
                <h3
                  class="text-xl font-bold tracking-tight leading-relaxed text-amber-200"
                >
                  Recent Transaction
                </h3>
                <div class="mt-9">Total Payment : Rp 1.000.000</div>
                <div class="mt-9">Total Payment : Rp 1.000.000</div>
                <div class="mt-9">Total Payment : Rp 1.000.000</div>
                <div class="mt-9">Total Payment : Rp 1.000.000</div>
                <div class="mt-9">Total Payment : Rp 1.000.000</div>
                <div class="mt-9">Total Payment : Rp 1.000.000</div>
              </div>
            </aside>
          </div>
        </section>

        <section
          class="flex flex-col px-8 py-12 mt-9 text-4xl font-bold tracking-tighter leading-none text-amber-200 rounded-2xl bg-slate-600 max-md:px-5 max-md:max-w-full fade-in"
        >
          <h3>Our Supplier</h3>
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/86258d39d4ca21050f54808423966e7e9e19d594d151349436c7c371ad278189?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
            class="object-contain mt-6 w-full aspect-[3.48] max-md:max-w-full"
            alt="Supplier statistics"
          />
        </section>
      </div>
    </main>
  </div>
</div>
</html>