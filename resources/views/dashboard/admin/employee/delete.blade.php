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
      
      <!-- Delete Confirmation Modal -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 backdrop-blur-md overflow-y-auto p-4">
  <div class="relative bg-white p-12 rounded-3xl w-full max-w-xl text-center">
    <!-- Modal Icon -->
    <div class="absolute -top-[102px] left-1/2 transform -translate-x-1/2 bg-rose-200 rounded-full w-[204px] h-[204px] flex items-center justify-center">
      <svg width="126" height="126" viewBox="0 0 126 126" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M89.25 26.25V21C89.25 18.2152 88.1438 15.5445 86.1746 13.5754C84.2055 11.6062 81.5348 10.5 78.75 10.5H47.25C44.4652 10.5 41.7945 11.6062 39.8254 13.5754C37.8562 15.5445 36.75 18.2152 36.75 21V26.25H21C19.6076 26.25 18.2723 26.8031 17.2877 27.7877C16.3031 28.7723 15.75 30.1076 15.75 31.5C15.75 32.8924 16.3031 34.2277 17.2877 35.2123C18.2723 36.1969 19.6076 36.75 21 36.75H26.25V94.5C26.25 98.6772 27.9094 102.683 30.8631 105.637C33.8168 108.591 37.8228 110.25 42 110.25H84C88.1772 110.25 92.1832 108.591 95.1369 105.637C98.0906 102.683 99.75 98.6772 99.75 94.5V36.75H105C106.392 36.75 107.728 36.1969 108.712 35.2123C109.697 34.2277 110.25 32.8924 110.25 31.5C110.25 30.1076 109.697 28.7723 108.712 27.7877C107.728 26.8031 106.392 26.25 105 26.25H89.25ZM78.75 21H47.25V26.25H78.75V21ZM89.25 36.75H36.75V94.5C36.75 95.8924 37.3031 97.2277 38.2877 98.2123C39.2723 99.1969 40.6076 99.75 42 99.75H84C85.3924 99.75 86.7277 99.1969 87.7123 98.2123C88.6969 97.2277 89.25 95.8924 89.25 94.5V36.75Z"
          fill="#FF3A4C"></path>
      </svg>
    </div>
    <!-- Modal Content -->
    <h2 class="mt-24 text-2xl font-bold text-gray-700">Are you sure?</h2>
    <p class="mt-2 text-gray-500">You are about to delete this employee. This action cannot be undone.</p>
    <div class="mt-6 flex justify-center gap-4">
      <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
      <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Delete</button>
    </div>
  </div>
</div>

      
  </body>
</html>
