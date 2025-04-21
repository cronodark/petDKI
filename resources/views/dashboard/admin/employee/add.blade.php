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
    <div class="pt-10 px-0 md:pt-16  flex flex-col lg:flex-row">
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

    <script>
      // Display selected file name
      document.getElementById("projectPhoto").addEventListener("change", function (e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : "No file chosen";
        document.getElementById("fileNameDisplay").textContent = fileName;
      });

      // Highlight active nav link on click (optional)
      document.querySelectorAll("nav a").forEach((link) => {
        link.addEventListener("click", (e) => {
          document.querySelectorAll("nav a").forEach((el) =>
            el.classList.remove("bg-white", "text-slate-600")
          );
          e.currentTarget.classList.add("bg-white", "text-slate-600");
        });
      });
    </script>
  </body>
</html>
