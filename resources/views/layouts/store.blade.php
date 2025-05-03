<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <icon href="{{ asset('images/favicon.png') }}" type="image/png" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        /* Font Import */
        @import url("https://fonts.googleapis.com/css2?family=Paytone+One&display=swap");

        .font-paytone {
            font-family: "Paytone One", -apple-system, Roboto, Helvetica, sans-serif;
        }

        /* Hover Animations */
        .nav-link {
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .nav-link:hover {
            transform: translateX(5px);
            box-shadow: 5px 10px 15px -5px rgba(0, 0, 0, 0.2);
            /* Curved shadow effect */
        }

        .nav-link.active {
            background-color: #ffffff;
            /* White background on active */
            color: #37496A;
            /* Change text color to Slate when active */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            /* Subtle shadow */
        }

        .nav-link.active svg {
            fill: #37496A !important;
            /* Change icon color to Slate when active */
        }

        /* Card Hover Animation */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Progress Bar Animation */
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

        /* Fade In Animation */
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

        /* Icon Scale Animation */
        .icon-hover {
            transition: transform 0.2s ease;
        }

        .icon-hover:hover {
            transform: scale(1.1);
        }

        /* Logout Button Styling */
        .logout-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border-radius: 9999px;
            /* Fully rounded */
            background-color: transparent;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .logout-button:hover {
            background-color: rgba(255, 255, 255, 0.1);
            /* Slight background change on hover */
            transform: scale(1.1);
            /* Scale up slightly on hover */
        }

        .logout-button svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
            /* Inherit text color */
        }
    </style>
    @yield('styles')
</head>

<body class="h-screen">
    <!-- Header Section -->
    <header class="mt-10">
        <div class="flex justify-between items-center h-16 px-15 pt-5 w-full">
            <div class="w-1/4">
                <h1 class="text-6xl text-slate-600 max-md:text-4xl">
                    <span class="font-paytone" style="color: rgba(55, 73, 106, 1)">Pet</span>
                    <span class="font-paytone">DKI</span>
                </h1>
            </div>
            <div class="w-1/2 flex justify-center">
                <div class="flex items-center gap-10 px-4 py-2.5 text-xl text-gray-400 rounded-3xl w-full bg-slate-100">
                    <input type="search" placeholder="Search" class="bg-transparent outline-none flex-1" />
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/c088c1e8e05d8cec874c3fb675968377fa9767b8245cc01b8c3ac7ad58b57075?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                        class="object-contain shrink-0 w-10 aspect-square" alt="Search icon" />
                </div>
            </div>
            <div class="w-1/4 flex justify-end">
                <div class="flex shrink gap-5 basis-auto grow-0 text-slate-600">
                    @if (Auth::user()->photo)
                        <img src="{{ 'storage/' . Auth::user()->photo }}"
                            class="object-contain shrink-0 rounded-full aspect-square w-[59px]" alt="User Avatar" />
                    @else
                        <img src="{{ asset('images/defaultProfile.png') }}"
                            class="object-contain shrink-0 rounded-full aspect-square w-[59px]" alt="User Avatar" />
                    @endif
                    <div class="flex flex-col self-start mt-1">
                        <div class="self-start text-xl font-bold">{{ Auth::user()->name }}</div>
                        <div class="text-base">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="mt-15 min-h-screen max-h-fit">
        <div class="flex min-h-screen">
            <!-- Sidebar Navigation -->
            <nav class="w-1/4">
                <div
                    class="flex flex-col inline-flex items-center self-stretch pt-8 px-4 mt-1.5 w-full rounded-none bg-slate-600 rounded-tr-[100px] justify-between h-full">
                    <!-- Common Navigation Items -->
                    <div class="w-full flex-grow">
                        <div class="mb-2 px-6">
                            <h3 class="text-gray-300 text-sm uppercase font-semibold mb-2">General</h3>
                            <div class="nav-item w-full">
                                <a href="{{ route('dashboard') }}"
                                    class="flex gap-4 self-stretch ps-6 py-3 text-lg font-medium whitespace-nowrap rounded-[30px_30px_30px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                                    <svg width="24" height="24" viewBox="0 0 36 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                        <path
                                            d="M19.9167 12.25V0.75H35.25V12.25H19.9167ZM0.75 19.9167V0.75H16.0833V19.9167H0.75ZM19.9167 35.25V16.0833H35.25V35.25H19.9167ZM0.75 35.25V23.75H16.0833V35.25H0.75ZM4.58333 16.0833H12.25V4.58333H4.58333V16.0833ZM23.75 31.4167H31.4167V19.9167H23.75V31.4167ZM23.75 8.41667H31.4167V4.58333H23.75V8.41667ZM4.58333 31.4167H12.25V27.5833H4.58333V31.4167Z" />
                                    </svg>
                                    <span class="grow shrink self-center">Dashboard</span>
                                </a>
                            </div>
                            <div class="nav-item w-full mt-2">
                                <a href="{{ route('products.index') }}"
                                    class="flex gap-4 self-stretch ps-6 py-3 text-lg font-medium whitespace-nowrap rounded-[30px_30px_30px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
                                    <svg width="24" height="24" viewBox="0 0 42 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                        <path
                                            d="M21 0.666748L42 12.3333V35.6667L21 47.3333L0 35.6667V12.3333L21 0.666748ZM37.3333 16.825L23.3333 24.9077V40.6483L37.3333 32.5943V16.825ZM4.6667 16.9557V32.597L18.6667 40.6483V25.0383L4.6667 16.9557ZM12.2267 10.882L7.847 13.402L20.888 20.9317L25.2607 18.407L12.2267 10.882ZM21 5.838L16.9027 8.19405L29.9273 15.712L34.0387 13.339L21 5.838Z" />
                                    </svg>
                                    <span class="grow shrink self-center">Produk</span>
                                </a>
                            </div>
                        </div>
                        <!-- Role-Specific Navigation Items -->
                        @if (Auth::user()->role == 'cashier')
                            <div class="mb-2 px-6">
                                <h3 class="text-gray-300 text-sm uppercase font-semibold mb-2">Cashier Tools</h3>
                                <div class="nav-item w-full">
                                    <a href="{{ route('transactions.index') }}"
                                        class="flex gap-4 self-stretch ps-6 py-3 text-lg font-medium whitespace-nowrap rounded-[30px_30px_30px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'transactions.index' ? 'active' : '' }}">
                                        <svg width="24" height="24" viewBox="0 0 46 46" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                            <path
                                                d="M23 23.9584C21.2208 23.9584 19.5145 24.6651 18.2565 25.9232C16.9984 27.1813 16.2917 28.8876 16.2917 30.6667C16.2917 32.4458 16.9984 34.1521 18.2565 35.4102C19.5145 36.6683 21.2208 37.375 23 37.375C24.7792 37.375 26.4855 36.6683 27.7435 35.4102C29.0016 34.1521 29.7083 32.4458 29.7083 30.6667C29.7083 28.8876 29.0016 27.1813 27.7435 25.9232C26.4855 24.6651 24.7792 23.9584 23 23.9584Z" />
                                            <path
                                                d="M23 0.75C10.3 0.75 0.75 10.3 0.75 23C0.75 35.7 10.3 45.25 23 45.25C35.7 45.25 45.25 35.7 45.25 23C45.25 10.3 35.7 0.75 23 0.75ZM23 41C12.5 41 5 33.5 5 23C5 12.5 12.5 5 23 5C33.5 5 41 12.5 41 23C41 33.5 33.5 41 23 41Z" />
                                        </svg>
                                        <span class="grow shrink self-center">Transaksi</span>
                                    </a>
                                </div>
                                <div class="nav-item w-full mt-2">
                                    <a href="{{ route('cashier.transactions.create') }}"
                                        class="flex gap-4 self-stretch ps-6 py-3 text-lg font-medium whitespace-nowrap rounded-[30px_30px_30px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'cashier.transactions.create' ? 'active' : '' }}">
                                        <svg width="24" height="24" viewBox="0 0 42 42" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                            <path d="M36.2 24.8L35.4267 17.8403C34.8909 13.0181..." />
                                        </svg>
                                        <span class="grow shrink self-center">Point of Sale</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <!-- Manager Role Navigation Items -->
                        @if (Auth::user()->role == 'manager')
                            <div class="mb-2 px-6">
                                <h3 class="text-gray-300 text-sm uppercase font-semibold mb-2">Management</h3>
                                <div class="nav-item w-full">
                                    <a href="{{ route('transactions.index') }}"
                                        class="flex gap-4 self-stretch ps-6 py-3 text-lg font-medium whitespace-nowrap rounded-[30px_30px_30px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'transactions.index' ? 'active' : '' }}">
                                        <svg width="24" height="24" viewBox="0 0 46 46" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                            <path
                                                d="M23 23.9584C21.2208 23.9584 19.5145 24.6651 18.2565 25.9232C16.9984 27.1813 16.2917 28.8876 16.2917 30.6667C16.2917 32.4458 16.9984 34.1521 18.2565 35.4102C19.5145 36.6683 21.2208 37.375 23 37.375C24.7792 37.375 26.4855 36.6683 27.7435 35.4102C29.0016 34.1521 29.7083 32.4458 29.7083 30.6667C29.7083 28.8876 29.0016 27.1813 27.7435 25.9232C26.4855 24.6651 24.7792 23.9584 23 23.9584Z" />
                                        </svg>
                                        <span class="grow shrink self-center">Transaksi</span>
                                    </a>
                                </div>
                                <div class="nav-item w-full mt-2">
                                    <a href="{{ route('manager.worker.index') }}"
                                        class="flex gap-4 self-stretch ps-6 py-3 text-lg font-medium whitespace-nowrap rounded-[30px_30px_30px_30px] text-white hover:bg-slate-500 transition nav-link {{ in_array(Route::currentRouteName(), ['manager.worker.index', 'manager.worker.create', 'manager.worker.show']) ? 'active' : '' }}">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/abe59c4fd7158d3e8eae339b598959764d8f2b53672165cbcd6211b7211963b5?placeholderIfAbsent=true&apiKey=bb7eb43fa3b041eb9b0e12445d776380"
                                            class="object-contain aspect-square h-6 w-6 icon-hover"
                                            alt="Employee icon" />
                                        <span class="grow shrink self-center">Karyawan</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <!-- Warehouse Role Navigation Items -->
                        @if (Auth::user()->role == 'warehouse')
                            <div class="mb-2 px-6">
                                <h3 class="text-gray-300 text-sm uppercase font-semibold mb-2">Inventory</h3>
                                <div class="nav-item w-full">
                                    <a href="{{ route('warehouse.categories.index') }}"
                                        class="flex gap-4 self-stretch ps-6 py-3 text-lg font-medium whitespace-nowrap rounded-[30px_30px_30px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'warehouse.categories.index' ? 'active' : '' }}">
                                        <svg width="24" height="24" viewBox="0 0 42 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                            <path
                                                d="M9.75 5.25V0.75H41.25V5.25H9.75ZM9.75 14.25V9.75H41.25V14.25H9.75ZM9.75 23.25V18.75H41.25V23.25H9.75ZM3 5.25C2.3625 5.25 1.75 4.6375 1.75 4C1.75 3.3625 2.3625 2.75 3 2.75H7.25C7.8875 2.75 8.5 3.3625 8.5 4C8.5 4.6375 7.8875 5.25 7.25 5.25H3Z" />
                                        </svg>
                                        <span class="grow shrink self-center">Kategori</span>
                                    </a>
                                </div>
                                <div class="nav-item w-full mt-2">
                                    <a href="{{ route('warehouse.suppliers.index') }}"
                                        class="flex gap-4 self-stretch ps-6 py-3 text-lg font-medium whitespace-nowrap rounded-[30px_30px_30px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'warehouse.suppliers.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'warehouse.suppliers.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'warehouse.suppliers.edit' ? 'active' : '' }}">
                                        <svg width="24" height="24" viewBox="0 0 40 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                            <path
                                                d="M6.5 27.125V25.75H3.75V27.125C3.75 29.6777 5.8223 31.75 8.375 31.75H31.625C34.1777 31.75 36.25 29.6777 36.25 27.125V12.875C36.25 10.3223 34.1777 8.25 31.625 8.25H8.375C5.8223 8.25 3.75 10.3223 3.75 12.875V14.25H6.5V12.875C6.5 11.6973 7.4473 10.75 8.625 10.75H31.375C32.5527 10.75 33.5 11.6973 33.5 12.875V27.125C33.5 28.3027 32.5527 29.25 31.375 29.25H8.625C7.4473 29.25 6.5 28.3027 6.5 27.125Z" />
                                        </svg>
                                        <span class="grow shrink self-center">Supplier</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="w-full px-6 pb-4 mt-auto">
                        <div class="flex items-center p-2 rounded-lg bg-slate-700">
                            <a href="{{ route('logout') }}" class="flex-grow">
                                <p class="text-white text-center text-2xl">Log Out</p>
                            </a>
                            <button type="submit" class="logout-button text-gray-300 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <div class="w-3/4 mx-5">
                @yield('content')
            </div>
        </div>
    </main>
    @yield('script')
</body>

</html>
