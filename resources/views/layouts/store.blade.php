<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Document</title>
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

        .nav-link.active {
            background-color: white;
            /* White background on active */
            color: #37496A;
            /* Change text color to Slate when active */
        }

        .nav-link.active svg {
            fill: #37496A !important;
            /* Change icon color to Slate when active */
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
    @yield('styles')
</head>

<body class="h-screen">
    <header class="mt-10">
        <div class="flex justify-between items-center h-16 px-15 pt-5 w-full">
            <div class="w-1/4 ">
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
                        <img src="{{ 'storage/' . Auth::user()->photo }}" class="object-contain shrink-0 rounded-full aspect-square w-[59px]" alt="user avatar"/>
                    @else
                        <img src="{{ asset('images/defaultProfile.png') }}"
                            class="object-contain shrink-0 rounded-full aspect-square w-[59px]" alt="user avatar"/>
                    @endif

                    <div class="flex flex-col self-start mt-1">
                        <div class="self-start text-xl font-bold">{{ Auth::user()->name }}</div>
                        <div class="text-base">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="mt-15 h-screen">
        <div class="flex">
            <nav class="w-1/4">
                <div
                    class="flex flex-col inline-flex items-center self-stretch pt-24 pl-6 mt-1.5 w-full rounded-none bg-slate-600  max-md:py-24 max-md:pl-5 rounded-tr-[100px] justify-between h-screen">
                    <div class="w-full">
                        {{-- dashboard --}}
                        <div class="nav-item w-full">
                            <a href="{{ route('dashboard') }}"
                                class="flex gap-6 self-stretch ps-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-transparent rounded-[30px_0px_0px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                    <path
                                        d="M19.9167 12.25V0.75H35.25V12.25H19.9167ZM0.75 19.9167V0.75H16.0833V19.9167H0.75ZM19.9167 35.25V16.0833H35.25V35.25H19.9167ZM0.75 35.25V23.75H16.0833V35.25H0.75ZM4.58333 16.0833H12.25V4.58333H4.58333V16.0833ZM23.75 31.4167H31.4167V19.9167H23.75V31.4167ZM23.75 8.41667H31.4167V4.58333H23.75V8.41667ZM4.58333 31.4167H12.25V27.5833H4.58333V31.4167Z" />
                                </svg>
                                <span class="grow shrink self-start w-[196px]">Dashboard</span>
                            </a>
                        </div>

                        {{-- produk --}}
                        <div class="nav-item w-full">
                            <a href="{{ route('products.index') }}"
                                class="flex gap-6 self-stretch ps-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-transparent rounded-[30px_0px_0px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
                                <svg width="36" height="36" viewBox="0 0 42 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                    <path
                                        d="M21 0.666748L42 12.3333V35.6667L21 47.3333L0 35.6667V12.3333L21 0.666748ZM37.3333 16.825L23.3333 24.9077V40.6483L37.3333 32.5943V16.825ZM4.6667 16.9557V32.597L18.6667 40.6483V25.0383L4.6667 16.9557ZM12.2267 10.882L7.847 13.402L20.888 20.9317L25.2607 18.407L12.2267 10.882ZM21 5.838L16.9027 8.19405L29.9273 15.712L34.0387 13.339L21 5.838Z" />
                                </svg>
                                <span class="grow shrink self-start w-[196px]">Produk</span>
                            </a>
                        </div>

                        @if (Auth::user()->role != 'warehouse')
                            {{-- transaksi --}}
                            <div class="nav-item w-full">
                                <a href="{{ route('transactions.index') }}"
                                    class="flex gap-6 self-stretch ps-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-transparent rounded-[30px_0px_0px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'transactions.index' ? 'active' : '' }}">
                                    <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                        <path
                                            d="M23 23.9584C21.2208 23.9584 19.5145 24.6651 18.2565 25.9232C16.9984 27.1813 16.2917 28.8875 16.2917 30.6667C16.2917 32.4459 16.9984 34.1522 18.2565 35.4102C19.5145 36.6683 21.2208 37.375 23 37.375C24.7792 37.375 26.4854 36.6683 27.7435 35.4102C29.0016 34.1522 29.7083 32.4459 29.7083 30.6667C29.7083 28.8875 29.0016 27.1813 27.7435 25.9232C26.4854 24.6651 24.7792 23.9584 23 23.9584ZM20.125 30.6667C20.125 29.9042 20.4279 29.1729 20.9671 28.6338C21.5062 28.0946 22.2375 27.7917 23 27.7917C23.7625 27.7917 24.4938 28.0946 25.0329 28.6338C25.5721 29.1729 25.875 29.9042 25.875 30.6667C25.875 31.4292 25.5721 32.1605 25.0329 32.6996C24.4938 33.2388 23.7625 33.5417 23 33.5417C22.2375 33.5417 21.5062 33.2388 20.9671 32.6996C20.4279 32.1605 20.125 31.4292 20.125 30.6667Z" />
                                        <path
                                            d="M33.5915 9.80564L27.4984 1.26306L5.0945 19.1609L3.8525 19.1475V19.1666H2.875V42.1666H43.125V19.1666H41.2812L37.6127 8.43523L33.5915 9.80564ZM37.2312 19.1666H18.0109L32.3265 14.2868L35.2437 13.3534L37.2312 19.1666ZM29.8042 11.0975L15.0267 16.1345L26.7298 6.78498L29.8042 11.0975ZM6.70833 34.8239V26.5056C7.5175 26.22 8.2525 25.7569 8.85942 25.1503C9.46634 24.5437 9.92981 23.809 10.2158 23H35.7842C36.0699 23.8093 36.5333 24.5445 37.1402 25.1514C37.7472 25.7583 38.4823 26.2217 39.2917 26.5075V34.8258C38.4823 35.1116 37.7472 35.5749 37.1402 36.1819C36.5333 36.7888 36.0699 37.5239 35.7842 38.3333H10.2197C9.93252 37.5239 9.46827 36.7887 8.86079 36.1816C8.25331 35.5744 7.51794 35.1106 6.70833 34.8239Z" />
                                    </svg>
                                    <span class="grow shrink self-start w-[196px]">Transaksi</span>
                                </a>
                            </div>
                        @endif

                        @if (Auth::user()->role == 'cashier')
                            {{-- POS --}}
                            <div class="nav-item w-full">
                                <a href="{{ route('cashier.transactions.create') }}"
                                    class="flex gap-6 self-stretch ps-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-transparent rounded-[30px_0px_0px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'cashier.transactions.create' ? 'active' : '' }}">
                                    {{-- <img src="{{ asset('images/pos.png') }}" class="w-10" alt="POS icon" /> --}}
                                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                        <path
                                            d="M36.2 24.8L35.4267 17.8403C34.8909 13.0181 34.623 10.6051 33.0004 9.1535C31.374 7.7 28.9496 7.7 24.097 7.7H17.903C13.0504 7.7 10.6241 7.7 8.9996 9.1535C7.377 10.6051 7.1091 13.0181 6.5733 17.8403L5.8 24.8M20.05 2H24.8M24.8 2H29.55M24.8 2V7.7M29.8673 24.8H12.1327C7.9793 24.8 5.9026 24.8 4.4301 25.8317C3.8867 26.2117 3.4117 26.6867 3.0317 27.2301C2 28.7026 2 30.7793 2 34.9327C2 37.0094 2 38.0487 2.5149 38.784C2.70617 39.0589 2.93987 39.2926 3.216 39.4851C3.9513 40 4.9906 40 7.0673 40H34.9327C37.0094 40 38.0487 40 38.784 39.4851C39.0589 39.2926 39.2926 39.0589 39.4851 38.784C40 38.0487 40 37.0094 40 34.9327C40 30.7793 40 28.7026 38.9683 27.2301C38.5883 26.6867 38.1133 26.2117 37.5699 25.8317C36.0974 24.8 34.0207 24.8 29.8673 24.8Z"
                                            stroke="white" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M15.3 31.4501L17.1924 32.7117C17.8169 33.1282 18.5508 33.3503 19.3014 33.3501H22.6986C23.4492 33.3503 24.1831 33.1282 24.8076 32.7117L26.7 31.4501M13.4 13.4001H17.2"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <span class="grow shrink self-start w-[196px]">POS</span>
                                </a>
                            </div>
                        @endif

                        @if (Auth::user()->role == 'warehouse')
                            {{-- kategori --}}
                            <div class="nav-item w-full">
                                <a href="#"
                                    class="flex gap-6 self-stretch ps-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-transparent rounded-[30px_0px_0px_30px] text-white hover:bg-slate-500 transition nav-link">
                                    <svg width="42" height="24" viewBox="0 0 42 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                        <path
                                            d="M9.75 5.25V0.75H41.25V5.25H9.75ZM9.75 14.25V9.75H41.25V14.25H9.75ZM9.75 23.25V18.75H41.25V23.25H9.75ZM3 5.25C2.3625 5.25 1.8285 5.034 1.398 4.602C0.9675 4.17 0.7515 3.636 0.75 3C0.7485 2.364 0.9645 1.83 1.398 1.398C1.8315 0.966 2.3655 0.75 3 0.75C3.6345 0.75 4.16925 0.966 4.60425 1.398C5.03925 1.83 5.2545 2.364 5.25 3C5.2455 3.636 5.0295 4.17075 4.602 4.60425C4.1745 5.03775 3.6405 5.253 3 5.25ZM3 14.25C2.3625 14.25 1.8285 14.034 1.398 13.602C0.9675 13.17 0.7515 12.636 0.75 12C0.7485 11.364 0.9645 10.83 1.398 10.398C1.8315 9.966 2.3655 9.75 3 9.75C3.6345 9.75 4.16925 9.966 4.60425 10.398C5.03925 10.83 5.2545 11.364 5.25 12C5.2455 12.636 5.0295 13.1708 4.602 13.6043C4.1745 14.0378 3.6405 14.253 3 14.25ZM3 23.25C2.3625 23.25 1.8285 23.034 1.398 22.602C0.9675 22.17 0.7515 21.636 0.75 21C0.7485 20.364 0.9645 19.83 1.398 19.398C1.8315 18.966 2.3655 18.75 3 18.75C3.6345 18.75 4.16925 18.966 4.60425 19.398C5.03925 19.83 5.2545 20.364 5.25 21C5.2455 21.636 5.0295 22.1707 4.602 22.6042C4.1745 23.0377 3.6405 23.253 3 23.25Z" />
                                    </svg>
                                    <span class="grow shrink self-start w-[196px]">Kategori</span>
                                </a>
                            </div>

                            {{-- supplier --}}
                            <div class="nav-item w-full">
                                <a href="#"
                                    class="flex gap-6 self-stretch ps-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-transparent rounded-[30px_0px_0px_30px] text-white hover:bg-slate-500 transition nav-link">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                        <path
                                            d="M6.5 27.125V25.75H3.75V27.125C3.75 29.6777 4.76406 32.1259 6.5691 33.9309C8.37413 35.7359 10.8223 36.75 13.375 36.75H17.5V34H13.375C11.5516 34 9.80295 33.2757 8.51364 31.9864C7.22433 30.697 6.5 28.9484 6.5 27.125ZM31.25 13.375V14.75H34V13.375C34 10.8223 32.9859 8.37414 31.1809 6.5691C29.3759 4.76406 26.9277 3.75 24.375 3.75H20.25V6.5H24.375C25.2778 6.5 26.1718 6.67783 27.0059 7.02333C27.8401 7.36883 28.598 7.87524 29.2364 8.51364C29.8748 9.15205 30.3812 9.90994 30.7267 10.7441C31.0722 11.5782 31.25 12.4722 31.25 13.375ZM13.375 13.375H5.125C4.03098 13.375 2.98177 13.8096 2.20818 14.5832C1.4346 15.3568 1 16.406 1 17.5V20.25H3.75V17.5C3.75 17.1353 3.89487 16.7856 4.15273 16.5277C4.41059 16.2699 4.76033 16.125 5.125 16.125H13.375C13.7397 16.125 14.0894 16.2699 14.3473 16.5277C14.6051 16.7856 14.75 17.1353 14.75 17.5V20.25H17.5V17.5C17.5 16.406 17.0654 15.3568 16.2918 14.5832C15.5182 13.8096 14.469 13.375 13.375 13.375ZM9.25 12C10.3378 12 11.4012 11.6774 12.3056 11.0731C13.2101 10.4687 13.9151 9.60975 14.3313 8.60476C14.7476 7.59977 14.8565 6.4939 14.6443 5.42701C14.4321 4.36011 13.9083 3.3801 13.1391 2.61092C12.3699 1.84173 11.3899 1.3179 10.323 1.10568C9.2561 0.893465 8.15024 1.00238 7.14524 1.41867C6.14025 1.83495 5.28126 2.5399 4.67692 3.44437C4.07257 4.34884 3.75 5.41221 3.75 6.5C3.75 7.95869 4.32946 9.35764 5.36091 10.3891C6.39236 11.4205 7.79131 12 9.25 12ZM9.25 3.75C9.7939 3.75 10.3256 3.91129 10.7778 4.21346C11.2301 4.51564 11.5825 4.94513 11.7907 5.44762C11.9988 5.95012 12.0533 6.50305 11.9472 7.0365C11.8411 7.56995 11.5791 8.05995 11.1945 8.44455C10.8099 8.82914 10.3199 9.09105 9.7865 9.19716C9.25305 9.30327 8.70012 9.24881 8.19762 9.04067C7.69512 8.83253 7.26563 8.48006 6.96346 8.02782C6.66128 7.57559 6.5 7.0439 6.5 6.5C6.5 5.77066 6.78973 5.07118 7.30546 4.55546C7.82118 4.03973 8.52065 3.75 9.25 3.75ZM35.375 32.625H27.125C26.031 32.625 24.9818 33.0596 24.2082 33.8332C23.4346 34.6068 23 35.656 23 36.75V39.5H25.75V36.75C25.75 36.3853 25.8949 36.0356 26.1527 35.7777C26.4106 35.5199 26.7603 35.375 27.125 35.375H35.375C35.7397 35.375 36.0894 35.5199 36.3473 35.7777C36.6051 36.0356 36.75 36.3853 36.75 36.75V39.5H39.5V36.75C39.5 35.656 39.0654 34.6068 38.2918 33.8332C37.5182 33.0596 36.469 32.625 35.375 32.625ZM25.75 25.75C25.75 26.8378 26.0726 27.9012 26.6769 28.8056C27.2813 29.7101 28.1402 30.4151 29.1452 30.8313C30.1502 31.2476 31.2561 31.3565 32.323 31.1443C33.3899 30.9321 34.3699 30.4083 35.1391 29.6391C35.9083 28.8699 36.4321 27.8899 36.6443 26.823C36.8565 25.7561 36.7476 24.6502 36.3313 23.6452C35.9151 22.6403 35.2101 21.7813 34.3056 21.1769C33.4012 20.5726 32.3378 20.25 31.25 20.25C29.7913 20.25 28.3924 20.8295 27.3609 21.8609C26.3295 22.8924 25.75 24.2913 25.75 25.75ZM34 25.75C34 26.2939 33.8387 26.8256 33.5365 27.2778C33.2344 27.7301 32.8049 28.0825 32.3024 28.2907C31.7999 28.4988 31.247 28.5533 30.7135 28.4472C30.1801 28.3411 29.6901 28.0791 29.3055 27.6945C28.9209 27.31 28.6589 26.8199 28.5528 26.2865C28.4467 25.7531 28.5012 25.2001 28.7093 24.6976C28.9175 24.1951 29.2699 23.7656 29.7222 23.4635C30.1744 23.1613 30.7061 23 31.25 23C31.9793 23 32.6788 23.2897 33.1945 23.8055C33.7103 24.3212 34 25.0207 34 25.75Z" />
                                    </svg>
                                    <span class="grow shrink self-start w-[196px]">Supplier</span>
                                </a>
                            </div>
                        @endif

                        @if (Auth::user()->role == 'manager')
                            {{-- karyawan --}}
                            <div class="nav-item w-full">
                                <a href="{{ route('manager.worker.index') }}"
                                    class="flex gap-6 self-stretch ps-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-transparent rounded-[30px_0px_0px_30px] text-white hover:bg-slate-500 transition nav-link {{ Route::currentRouteName() == 'manager.worker.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'manager.worker.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'manager.worker.show' ? 'active' : '' }}">
                                    <svg width="46" height="39" viewBox="0 0 46 39" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                        <path
                                            d="M16.1 17.3333C17.9196 17.3333 19.6983 16.825 21.2112 15.8727C22.7242 14.9204 23.9034 13.5669 24.5997 11.9833C25.296 10.3996 25.4782 8.65706 25.1232 6.97589C24.7682 5.29472 23.892 3.75047 22.6054 2.53841C21.3187 1.32636 19.6795 0.500937 17.8948 0.166531C16.1102 -0.167874 14.2604 0.0037551 12.5793 0.659715C10.8982 1.31567 9.46139 2.4265 8.45048 3.85173C7.43957 5.27695 6.9 6.95257 6.9 8.66667C6.9 10.9652 7.86928 13.1696 9.59462 14.7949C11.32 16.4202 13.66 17.3333 16.1 17.3333ZM16.1 4.33334C17.0098 4.33334 17.8992 4.58748 18.6556 5.06364C19.4121 5.53979 20.0017 6.21656 20.3498 7.00837C20.698 7.80019 20.7891 8.67148 20.6116 9.51206C20.4341 10.3526 19.996 11.1248 19.3527 11.7308C18.7094 12.3368 17.8897 12.7495 16.9974 12.9167C16.1051 13.0839 15.1802 12.9981 14.3397 12.6701C13.4991 12.3422 12.7807 11.7868 12.2752 11.0741C11.7698 10.3615 11.5 9.52372 11.5 8.66667C11.5 7.5174 11.9846 6.4152 12.8473 5.60254C13.71 4.78988 14.88 4.33334 16.1 4.33334ZM34.5 21.6667C35.8647 21.6667 37.1987 21.2854 38.3334 20.5712C39.4681 19.857 40.3525 18.8418 40.8748 17.6541C41.397 16.4664 41.5337 15.1595 41.2674 13.8986C41.0012 12.6377 40.344 11.4795 39.379 10.5705C38.4141 9.66144 37.1846 9.04237 35.8461 8.79157C34.5077 8.54076 33.1203 8.66948 31.8595 9.16145C30.5987 9.65342 29.521 10.4865 28.7629 11.5555C28.0047 12.6244 27.6 13.8811 27.6 15.1667C27.6 16.8906 28.327 18.5439 29.621 19.7629C30.915 20.9819 32.67 21.6667 34.5 21.6667ZM34.5 13C34.9549 13 35.3996 13.1271 35.7778 13.3652C36.156 13.6032 36.4508 13.9416 36.6249 14.3375C36.799 14.7334 36.8446 15.1691 36.7558 15.5894C36.6671 16.0097 36.448 16.3957 36.1263 16.6987C35.8047 17.0017 35.3949 17.2081 34.9487 17.2917C34.5026 17.3753 34.0401 17.3324 33.6198 17.1684C33.1996 17.0044 32.8403 16.7267 32.5876 16.3704C32.3349 16.0141 32.2 15.5952 32.2 15.1667C32.2 14.592 32.4423 14.0409 32.8737 13.6346C33.305 13.2283 33.89 13 34.5 13ZM34.5 23.8333C31.9512 23.836 29.4756 24.6362 27.462 26.1083C25.2092 23.9944 22.3423 22.5563 19.223 21.9753C16.1037 21.3942 12.8715 21.6963 9.93422 22.8435C6.99691 23.9906 4.48595 25.9314 2.718 28.4211C0.95006 30.9108 0.00430145 33.8379 0 36.8333C0 37.408 0.242321 37.9591 0.673654 38.3654C1.10499 38.7717 1.69 39 2.3 39C2.91 39 3.49501 38.7717 3.92635 38.3654C4.35768 37.9591 4.6 37.408 4.6 36.8333C4.6 33.9602 5.8116 31.2047 7.96827 29.173C10.1249 27.1414 13.05 26 16.1 26C19.15 26 22.0751 27.1414 24.2317 29.173C26.3884 31.2047 27.6 33.9602 27.6 36.8333C27.6 37.408 27.8423 37.9591 28.2737 38.3654C28.705 38.7717 29.29 39 29.9 39C30.51 39 31.095 38.7717 31.5263 38.3654C31.9577 37.9591 32.2 37.408 32.2 36.8333C32.2055 34.2949 31.5248 31.797 30.222 29.575C31.2384 28.8184 32.4604 28.3466 33.7482 28.2136C35.0359 28.0806 36.3374 28.2919 37.5037 28.8231C38.67 29.3544 39.6539 30.1842 40.343 31.2176C41.0321 32.251 41.3984 33.4463 41.4 34.6667C41.4 35.2413 41.6423 35.7924 42.0737 36.1987C42.505 36.6051 43.09 36.8333 43.7 36.8333C44.31 36.8333 44.895 36.6051 45.3263 36.1987C45.7577 35.7924 46 35.2413 46 34.6667C46 31.7935 44.7884 29.038 42.6317 27.0063C40.4751 24.9747 37.55 23.8333 34.5 23.8333Z" />
                                    </svg>
                                    <span class="grow shrink self-start w-[196px]">Karyawan</span>
                                </a>
                            </div>
                        @endif
                    </div>

                    {{-- logout --}}
                    <div class="nav-item w-full mb-12">
                        <a href="{{ route('logout') }}"
                            class="flex gap-6 self-stretch ps-8 py-3.5 text-2xl font-medium whitespace-nowrap bg-transparent rounded-[30px_0px_0px_30px] text-white hover:bg-slate-500 transition nav-link">
                            <svg width="34" height="38" viewBox="0 0 34 38" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0 4.22222C0 1.9 1.69962 0 3.77694 0H18.8847V4.22222H3.77694V33.7778H18.8847V38H3.77694C1.69962 38 0 36.1 0 33.7778V4.22222ZM26.7709 16.8889L21.9818 11.5351L24.6521 8.55L34 19L24.6521 29.45L21.9818 26.4649L26.7709 21.1111H14.3335V16.8889H26.7709Z" />
                            </svg>
                            <span class="grow shrink self-start w-[196px]">Log out</span>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="w-3/4 mx-5">
                @yield('content')
            </div>
        </div>
    </main>
    @yield('script')
</body>

</html>
