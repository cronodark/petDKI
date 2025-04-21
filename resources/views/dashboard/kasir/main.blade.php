<!doctype html>
<html lang="en">
@extends('layouts.app')

<style>

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
      <div
        class="flex flex-col grow items-center text-2xl font-medium text-white max-md:mt-10"
      >
        <h1 class="text-6xl text-slate-600 max-md:text-4xl">
          <span class="font-paytone" style="color: rgba(55, 73, 106, 1)"
            >Pet</span
          >
          <span class="font-paytone">DKI</span>
        </h1>
        <div class="mt-7 font-bold">PET DKI</div>

        <div
          class="flex flex-col items-start self-stretch py-20 pl-6 mt-1.5 w-full rounded-none bg-slate-600 max-md:pt-24 max-md:pl-5"
        >
          <a
            href="#"
            class="flex gap-6 self-stretch px-8 py-3.5 whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600 max-md:px-5 nav-link"
          >
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/ad5fb5ea4f01b2f1fa23e3175d998204927def8dcb98708cf18ded71aa6099da?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
              alt="Dashboard icon"
              class="object-contain shrink-0 aspect-square w-[46px]"
            />
            <span class="grow shrink self-start mt-2.5 w-[196px]"
              >Dashboard</span
            >
          </a>

          <a
            href="#"
            class="flex gap-6 mt-5 ml-5 whitespace-nowrap max-md:ml-2.5 nav-link"
          >
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba67e374377b6328eb0884874d64347c3d330a1f0ff88d24a20dce4dedbdee01?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
              alt="Product icon"
              class="object-contain shrink-0 w-14 aspect-square"
            />
            <span class="my-auto">Product</span>
          </a>

          <a
            href="#"
            class="flex gap-8 mt-9 ml-6 whitespace-nowrap max-md:ml-2.5 nav-link"
          >
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/ad7619178124383c7ad9f8a97527954d59cf9b65370ba7420f79821338bcc97c?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
              alt="Transaction icon"
              class="object-contain shrink-0 aspect-square w-[46px]"
            />
            <span class="my-auto basis-auto">Transaction</span>
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
            class="flex gap-7 mt-72 ml-7 max-md:mt-10 max-md:ml-2.5 nav-link"
          >
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/a59312e49fa0f69fcea2bc744ed7cc093a0dec6e9b93cf04a408bdfab9b8a93d?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
              alt="Logout icon"
              class="object-contain shrink-0 aspect-[0.89] w-[34px]"
            />
            <span class="self-start">Log out</span>
          </a>
        </div>
      </div>
    </nav>

    <main class="ml-5 w-[73%] max-md:ml-0 max-md:w-full">
      <div
        class="flex flex-col self-stretch my-auto w-full max-md:mt-10 max-md:max-w-full"
      >
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
              alt="Search icon"
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

        <div class="mt-11 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col">
            <section class="w-[67%] max-md:ml-0 max-md:w-full">
              <div class="w-full max-md:mt-7 max-md:max-w-full">
                <div class="max-md:max-w-full">
                  <div class="flex gap-5 max-md:flex-col">
                    <article class="w-6/12 max-md:ml-0 max-md:w-full">
                      <div
                        class="flex flex-col grow items-start px-6 pt-5 pb-8 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-9 card-hover fade-in"
                      >
                        <img
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/7917c0f5107e0fde724296edd077b91db0b539d588b8df8ad1a434c1617f3172?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                          alt="Stock icon"
                          class="object-contain w-10 aspect-square icon-hover"
                        />
                        <div
                          class="mt-3 text-3xl font-extrabold text-amber-200"
                        >
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

                    <article class="w-6/12 max-md:ml-0 max-md:w-full">
                      <div
                        class="flex flex-col grow items-start px-6 pt-5 pb-8 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:mt-9 card-hover fade-in"
                      >
                        <img
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/31f5203b42f6c06a8e0f1667837b7c17b1af2a213acd83b20e8524ceefbc9eef?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                          alt="Income icon"
                          class="object-contain aspect-square w-[37px] icon-hover"
                        />
                        <div
                          class="mt-3.5 text-3xl font-extrabold text-amber-200"
                        >
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
                  </div>
                </div>

                <section
                  class="flex overflow-hidden flex-col items-start px-8 py-10 mt-9 w-full rounded-2xl bg-slate-600 max-md:px-5 max-md:max-w-full"
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
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/36586cbf-2455-4965-8d0b-02b04bf2f52c?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                        alt="Graph"
                        class="object-contain max-w-full aspect-[2.49] w-[529px]"
                      />
                    </div>
                  </div>
                </section>
              </div>
            </section>

            <aside class="ml-5 w-[33%] max-md:ml-0 max-md:w-full">
              <div
                class="flex overflow-hidden flex-col grow items-start pt-5 pr-14 pb-16 pl-7 w-full text-xl font-bold tracking-tight leading-tight text-white rounded-3xl bg-slate-600 max-md:px-5 max-md:mt-7 fade-in"
              >
                <h3 class="leading-relaxed text-amber-200">
                  Recent Transaction
                </h3>

                <div class="mt-4">#Order - 7</div>
                <div class="text-base tracking-tight leading-none">
                  Total Payment : Rp 1.000.000
                </div>

                <div class="mt-6">#Order - 7</div>
                <div class="text-base tracking-tight leading-none">
                  Total Payment : Rp 1.000.000
                </div>

                <div class="mt-6">#Order - 7</div>
                <div class="text-base tracking-tight leading-none">
                  Total Payment : Rp 1.000.000
                </div>

                <div class="mt-6">#Order - 7</div>
                <div class="text-base tracking-tight leading-none">
                  Total Payment : Rp 1.000.000
                </div>

                <div class="mt-6">#Order - 7</div>
                <div class="text-base tracking-tight leading-none">
                  Total Payment : Rp 1.000.000
                </div>

                <div class="mt-6">#Order - 7</div>
                <div class="text-base tracking-tight leading-none">
                  Total Payment : Rp 1.000.000
                </div>

                <div class="mt-6">#Order - 7</div>
                <div class="text-base tracking-tight leading-none">
                  Total Payment : Rp 1.000.000
                </div>

                <div class="mt-6">#Order - 7</div>
                <div class="text-base tracking-tight leading-none">
                  Total Payment : Rp 1.000.000
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
</html>
