<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Employee - PetDKI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet" />
    <style>
      .paytone-font {
        font-family: "Paytone One", -apple-system, Roboto, Helvetica, sans-serif;
        font-weight: 400;
      }
      .paytone-slate {
        font-family: "Paytone One", -apple-system, Roboto, Helvetica, sans-serif;
        font-weight: 400;
        color: rgba(55, 73, 106, 1);
      }

      .nav-link {
        transition: all 0.2s ease-in-out;
      }
      .nav-link:hover {
        transform: translateX(5px);
        background-color: rgba(255, 255, 255, 0.1);
      }
      .search-input:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(55, 73, 106, 0.2);
      }
      .btn-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      }
    </style>
  </head>

  <body class="bg-white min-h-screen">
    <div class="pt-10 px-5 md:pt-16 md:pr-16 bg-white flex flex-col lg:flex-row">
      <!-- Sidebar -->
      <aside class="w-full lg:w-[27%] flex flex-col bg-white">
        <!-- Logo Header -->
        <div class="flex flex-col items-center pt-10 pb-5">
          <h1 class="text-6xl font-medium text-slate-600 max-md:text-4xl text-center">
            <span class="paytone-slate">Pet</span>
            <span class="paytone-font">DKI</span>
          </h1>
        </div>

        <!-- Scrollable Sidebar Menu -->
        <div class="flex flex-col flex-1 overflow-y-auto h-[calc(100vh-130px)]">
          <nav class="flex flex-col items-start pt-10 pl-6 w-full bg-slate-600 max-md:pl-5 flex-1">
            <a href="#" class="nav-link flex gap-6 ml-8 text-2xl font-medium text-white whitespace-nowrap max-md:ml-2.5">
              <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8eba9542dfd6c4b68e040005284adc0ea420d6ee?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                   alt="Dashboard icon" class="object-contain shrink-0 aspect-square w-[46px]" />
              <span class="my-auto basis-auto">Dashboard</span>
            </a>

            <div class="flex gap-6 mt-8 ml-5 max-md:ml-2.5">
              <div>
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/9ad6664831c02c1c7f3160dcdad834acb51e65ce?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                     alt="Product icon" class="object-contain w-14 aspect-square" />
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fb9700c4c7e40301611aa438695ed2bcc732a270?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                     alt="Transaction icon" class="object-contain mt-9 aspect-square w-[46px] max-md:mr-1.5" />
              </div>
              <div class="flex flex-col my-auto text-2xl font-medium text-white whitespace-nowrap">
                <a href="#" class="self-start">Product</a>
                <a href="#" class="mt-16 max-md:mt-10">Transaction</a>
              </div>
            </div>

            <a href="#" aria-current="page"
               class="nav-link flex gap-8 self-stretch px-7 py-4 mt-5 text-2xl font-medium whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600 max-md:px-5">
              <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d7388fe353ce649e3ec982683b6ada8c0aef83bb?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                   alt="Employee icon" class="object-contain shrink-0 aspect-[1.18] w-[46px]" />
              <span class="grow shrink my-auto w-[196px]">Employee</span>
            </a>

            <a href="#" class="nav-link flex gap-7 mt-72 ml-7 text-2xl font-medium text-white max-md:mt-10 max-md:ml-2.5">
              <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/04ad8c16e664b76d36b2c490786e60f8324c8ef9?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                   alt="Log out icon" class="object-contain shrink-0 aspect-[0.89] w-[34px]" />
              <span class="self-start">Log out</span>
            </a>
          </nav>
        </div>
      </aside>

      <!-- Main Content -->
      <main class="w-full lg:w-[73%] lg:ml-5 mt-10 lg:mt-0">
        <div class="flex flex-col items-start w-full">
          <!-- Header -->
          <header class="flex flex-wrap gap-10 w-full whitespace-nowrap">
            <div class="flex flex-wrap flex-auto gap-10 px-8 py-2.5 text-xl text-gray-400 rounded-3xl bg-slate-100 max-md:px-5">
              <span class="my-auto">Search</span>
              <button type="button" aria-label="Search">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6aca5d100837687e9f315d38b6dd97d8c6544c12?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                     alt="Search icon" class="object-contain shrink-0 w-10 aspect-square" />
              </button>
            </div>
            <div class="flex shrink gap-5 basis-auto grow-0 text-slate-600">
              <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/78b5def8285e555841750262ff5e88d725c9056a?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                   alt="Admin profile" class="object-contain shrink-0 rounded-full aspect-square w-[59px]" />
              <div class="flex flex-col self-start mt-1">
                <div class="text-xl font-bold">Admin</div>
                <div class="mt-1 text-base">LoremIpsum@gmail.com</div>
              </div>
            </div>
          </header>

          <!-- Add Employee Form -->
          <form class="w-full">
            <h2 class="mt-20 text-4xl font-bold text-blue-950 max-md:mt-10">Add New Employee</h2>

            <div class="mt-14 max-md:mt-10">
              <label for="fullName" class="block text-xl font-medium text-zinc-400 mb-2">Full Name</label>
              <input type="text" id="fullName" name="fullName" class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
            </div>

            <div class="mt-14 max-md:mt-10">
              <label for="username" class="block text-xl font-medium text-zinc-400 mb-2">Username</label>
              <input type="text" id="username" name="username" class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
            </div>

            <div class="flex flex-wrap gap-10 mt-16 max-md:mt-10">
              <div class="flex-1">
                <label for="email" class="block text-xl font-medium text-zinc-400 mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
              </div>
              <div class="flex-1">
                <label for="password" class="block text-xl font-medium text-zinc-400 mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
              </div>
            </div>

            <div class="mt-16 max-md:mt-10">
              <label for="role" class="block text-xl font-medium text-zinc-400 mb-2">Role</label>
              <input type="text" id="role" name="role" class="w-full border-b border-gray-400 focus:outline-none text-lg py-2" />
            </div>

            <div class="mt-12 max-md:mt-10">
              <label for="projectPhoto" class="block text-xl font-medium text-zinc-400 mb-2">Project Photo</label>
              <div class="flex items-center gap-3">
                <label for="projectPhoto" class="px-6 py-2 border border-zinc-600 text-sm font-medium cursor-pointer hover:bg-slate-100">Choose file</label>
                <span id="fileNameDisplay" class="text-zinc-500 text-sm">No file chosen</span>
                <input type="file" id="projectPhoto" name="projectPhoto" class="hidden" />
              </div>
            </div>

            <button type="submit" class="px-5 py-4 mt-8 text-xl font-bold text-white rounded-2xl bg-slate-600 btn-hover">
              Add Employee
            </button>
          </form>
        </div>
      </main>
    </div>

  <!-- Success Modal -->
  <div
        class="fixed top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 w-[748px] z-[1001]"
      >
        <div
          class="p-10 text-center bg-white rounded-3xl shadow-[0_0_8px_rgba(0,0,0,0.2)]"
        >
          <div class="relative mx-auto my-0 mt-0 h-[204px] w-[204px]">
            <svg
              width="204"
              height="204"
              viewBox="0 0 204 204"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="102" cy="102" r="102" fill="#D7F6D4"></circle>
            </svg>
            <svg
              style="
                position: absolute;
                top: 42px;
                left: 50%;
                transform: translateX(-50%);
              "
              width="107"
              height="107"
              viewBox="0 0 107 107"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M91.2622 25.1008C93.0009 26.8396 93.0009 29.6037 91.2622 31.3425L40.7047 81.9C40.2966 82.313 39.8107 82.6409 39.275 82.8647C38.7393 83.0885 38.1644 83.2038 37.5839 83.2038C37.0033 83.2038 36.4285 83.0885 35.8927 82.8647C35.357 82.6409 34.8711 82.313 34.463 81.9L15.738 63.175C15.325 62.7669 14.9971 62.281 14.7733 61.7453C14.5495 61.2095 14.4342 60.6347 14.4342 60.0541C14.4342 59.4736 14.5495 58.8987 14.7733 58.363C14.9971 57.8273 15.325 57.3413 15.738 56.9333C16.1461 56.5203 16.632 56.1924 17.1677 55.9686C17.7035 55.7448 18.2783 55.6295 18.8588 55.6295C19.4394 55.6295 20.0142 55.7448 20.55 55.9686C21.0857 56.1924 21.5716 56.5203 21.9797 56.9333L37.5839 72.5375L85.0205 25.1008C85.4286 24.6878 85.9145 24.3599 86.4502 24.1361C86.986 23.9123 87.5608 23.797 88.1414 23.797C88.7219 23.797 89.2967 23.9123 89.8325 24.1361C90.3682 24.3599 90.8541 24.6878 91.2622 25.1008ZM81.8551 15.6491L37.5839 59.9204L25.1451 47.4816C21.6676 44.0041 16.0055 44.0041 12.528 47.4816L6.28635 53.7233C2.80885 57.2008 2.80885 62.8629 6.28635 66.3404L31.253 91.3071C34.7305 94.7846 40.3926 94.7846 43.8701 91.3071L100.714 34.5079C104.191 31.0304 104.191 25.3683 100.714 21.8908L94.4722 15.6491C90.9501 12.1716 85.3326 12.1716 81.8551 15.6491Z"
                fill="#05CD99"
              ></path>
            </svg>
          </div>
          <h3 class="mx-0 my-5 text-4xl font-bold text-slate-600">
            Employee added successfully!
          </h3>
          <p class="text-2xl text-slate-600">
            The Employee has been successfully added
          </p>
        </div>
      </div>

      <!-- Modal Backdrop -->
      <div
        class="flex fixed top-0 left-0 justify-center items-center backdrop-blur-[7.5px] bg-black bg-opacity-40 size-full z-[1000]"
      ></div>
    </div>

    <script>
      // Simple script to handle modal closing
      document.addEventListener("DOMContentLoaded", function () {
        const modal = document.querySelector(".fixed.top-2\\/4");
        const backdrop = document.querySelector(".backdrop-blur-\\[7\\.5px\\]");

        if (backdrop) {
          backdrop.addEventListener("click", function () {
            modal.style.display = "none";
            backdrop.style.display = "none";
          });
        }
      });
    </script>
  </body>
</html>
