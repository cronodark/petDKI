<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PetDKI - Employee Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet" />
    <style>
      .font-paytone {
        font-family: 'Paytone One', -apple-system, Roboto, Helvetica, sans-serif;
      }
      .text-ellipsis {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
      }

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
  <body class="bg-white text-gray-800">
    <div class="flex flex-col lg:flex-row min-h-screen">
      <!-- Sidebar -->
      <aside class="lg:w-1/5 h-full lg:h-screen flex flex-col items-center py-10">

        <!-- Logo Header -->
        <div class="flex flex-col items-center pt-10 pb-5">
          <h1 class="text-6xl font-medium text-slate-600 max-md:text-4xl text-center">
            <span class="paytone-slate">Pet</span>
            <span class="paytone-font">DKI</span>
          </h1>
        </div>

        <nav class="w-full bg-gray-800 px-6 space-y-8 text-center">
          <a href="#" class="flex items-center justify-center gap-4 text-xl text-white bg-gray-800 rounded-full py-3">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8eba9542dfd6c4b68e040005284adc0ea420d6ee" alt="Dashboard icon" class="w-8 h-8" />
            Dashboard
          </a>
          <a href="#" class="flex items-center justify-center gap-4 text-xl text-white bg-gray-800 rounded-full py-3">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/9ad6664831c02c1c7f3160dcdad834acb51e65ce" alt="Product icon" class="w-8 h-8" />
            Product
          </a>
          <a href="#" class="flex items-center justify-center gap-4 text-xl text-white bg-gray-800 rounded-full py-3">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fb9700c4c7e40301611aa438695ed2bcc732a270" alt="Transaction icon" class="w-8 h-8" />
            Transaction
          </a>
          <a href="#" class="flex items-center justify-center gap-4 text-xl font-medium whitespace-nowrap bg-white rounded-[30px_0px_0px_30px] text-slate-600">
              <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d7388fe353ce649e3ec982683b6ada8c0aef83bb?placeholderIfAbsent=true&apiKey=b6e760062608466c9c09a9a54edb9b26"
                  alt="Employee icon" class="object-contain shrink-0 aspect-[1.18] w-[46px]" />
            Employee
          </a>
          <a href="#" class="flex items-center justify-center gap-4 text-xl text-white bg-gray-800 py-3">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/04ad8c16e664b76d36b2c490786e60f8324c8ef9" alt="Logout icon" class="w-8 h-8" />
            Log out
          </a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 px-8 py-6">
        <!-- Header -->
        <header class="flex flex-col md:flex-row justify-between items-center mb-8">
          <div class="flex items-center gap-4 bg-gray-100 px-6 py-2 rounded-full w-full md:w-auto">
            <span class="text-gray-600">Search</span>
            <button type="button">
              <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6aca5d100837687e9f315d38b6dd97d8c6544c12" alt="Search" class="w-6 h-6" />
            </button>
          </div>
          <div class="flex items-center gap-4 mt-4 md:mt-0">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/78b5def8285e555841750262ff5e88d725c9056a" alt="Admin profile" class="w-14 h-14 rounded-full" />
            <div>
              <div class="text-lg font-bold text-gray-600">Admin</div>
              <div class="text-gray-400">LoremIpsum@gmail.com</div>
            </div>
          </div>
        </header>

        <!-- Table Section -->
        <section class="bg-gray-100 p-6 rounded-xl overflow-x-auto">
          <!-- Table Header -->
          <div class="hidden lg:grid grid-cols-6 gap-4 font-bold text-white bg-gray-600 p-4 rounded-xl min-w-[900px]">
            <span>Image</span>
            <span>Name</span>
            <span>Username</span>
            <span>Email</span>
            <span>Role</span>
            <span>Actions</span>
          </div>

          <!-- Table Rows -->
          <div class="flex flex-col gap-4 mt-4 min-w-[900px]">
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-4 items-center bg-white p-4 rounded-xl shadow">
              <div class="flex justify-center lg:justify-start">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/e17d44f23d91dd013d9e1fd9116686c99fc6b1f7" alt="Kevin" class="w-12 h-12 rounded-full object-cover" />
              </div>
              <span class="text-gray-700 font-medium">Kevin Farhan Hernandez</span>
              <span class="text-gray-600">kevin123</span>
              <span class="text-gray-600 text-ellipsis">kevin@gmail.com</span>
              <span class="text-gray-600">Warehouse</span>
              <div class="flex gap-2">
                <button class="px-4 py-2 border border-gray-600 text-gray-600 rounded-lg text-sm">Edit</button>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Delete</button>
              </div>
            </div>
          </div>

            <!-- Table Rows -->
          <div class="flex flex-col gap-4 mt-4 min-w-[900px]">
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-4 items-center bg-white p-4 rounded-xl shadow">
              <div class="flex justify-center lg:justify-start">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/e17d44f23d91dd013d9e1fd9116686c99fc6b1f7" alt="Kevin" class="w-12 h-12 rounded-full object-cover" />
              </div>
              <span class="text-gray-700 font-medium">Kevin Farhan Hernandez</span>
              <span class="text-gray-600">kevin123</span>
              <span class="text-gray-600 text-ellipsis">kevin@gmail.com</span>
              <span class="text-gray-600">Warehouse</span>
              <div class="flex gap-2">
                <button class="px-4 py-2 border border-gray-600 text-gray-600 rounded-lg text-sm">Edit</button>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Delete</button>
              </div>
            </div>
          </div>

          <!-- Table Rows -->
          <div class="flex flex-col gap-4 mt-4 min-w-[900px]">
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-4 items-center bg-white p-4 rounded-xl shadow">
              <div class="flex justify-center lg:justify-start">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/e17d44f23d91dd013d9e1fd9116686c99fc6b1f7" alt="Kevin" class="w-12 h-12 rounded-full object-cover" />
              </div>
              <span class="text-gray-700 font-medium">Kevin Farhan Hernandez</span>
              <span class="text-gray-600">kevin123</span>
              <span class="text-gray-600 text-ellipsis">kevin@gmail.com</span>
              <span class="text-gray-600">Warehouse</span>
              <div class="flex gap-2">
                <button class="px-4 py-2 border border-gray-600 text-gray-600 rounded-lg text-sm">Edit</button>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Delete</button>
              </div>
            </div>
          </div>
        </section>

        <!-- Pagination -->
        <nav class="flex justify-between items-center mt-6 text-slate-600 text-lg">
          <div class="flex items-center gap-2">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207" alt="Prev" class="w-3" />
            <span>Previous</span>
          </div>
          <div class="flex gap-4">
            <span>1</span>
            <span class="bg-gray-600 text-white px-2 py-1 rounded-md">2</span>
            <span>3</span>
          </div>
          <div class="flex items-center gap-2">
            <span>Next</span>
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d41ad5f2937bf2878cb2045a2aff05bdb36c3207" alt="Next" class="w-3 rotate-180" />
          </div>
        </nav>
      </main>
    </div>
  </body>
</html>