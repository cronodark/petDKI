@extends('layouts.store')

@section('content')
    <div class="flex min-h-screen">
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Dashboard Content -->
            <main class="p-6 space-y-8">
                <!-- Role-Based Title -->
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">
                        @if ($userRole == 'warehouse')
                            Warehouse Dashboard
                        @elseif($userRole == 'manager')
                            Manager Dashboard
                        @elseif($userRole == 'cashier')
                            Cashier Dashboard
                        @else
                            Inventory Dashboard
                        @endif
                    </h1>
                    <button id="mobile-menu-button" class="lg:hidden text-gray-600 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>

                <!-- Summary Cards (Role-based) -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <!-- Common for all: Total Stock -->
                    <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                        <span
                            class="text-4xl font-bold tracking-tighter text-amber-200">{{ number_format($totalStock) }}</span>
                        <h3 class="mt-3 text-xl text-white">Total Inventori</h3>
                        <div class="text-gray-300 text-lg mt-auto">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>

                    @if ($userRole == 'warehouse')
                        <!-- Total Categories -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">{{ $totalCategories }}</span>
                            <h3 class="mt-3 text-xl text-white">Total Kategori</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-tags"></i>
                            </div>
                        </div>

                        <!-- Stock In -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">
                                {{ number_format($stockMovementByCategory->sum('total_in')) }}
                            </span>
                            <h3 class="mt-3 text-xl text-white">Stock In (30d)</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-arrow-circle-down"></i>
                            </div>
                        </div>

                        <!-- Stock Out -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">
                                {{ number_format($stockMovementByCategory->sum('total_out')) }}
                            </span>
                            <h3 class="mt-3 text-xl text-white">Stock Out (30d)</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-arrow-circle-up"></i>
                            </div>
                        </div>
                    @endif

                    @if ($userRole == 'manager')
                        <!-- Total Users -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">{{ $totalEmployees }}</span>
                            <h3 class="mt-3 text-xl text-white">Total Karyawan</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>

                        <!-- Total Income -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">Rp
                                {{ number_format($totalIncome, 0) }}</span>
                            <h3 class="mt-3 text-xl text-white">Total Pemasukkan</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>

                        <!-- Total Expenses -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">Rp
                                {{ number_format($totalOutcome, 0) }}</span>
                            <h3 class="mt-3 text-xl text-white">Total </h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-minus-circle"></i>
                            </div>
                        </div>
                    @endif

                    @if ($userRole == 'cashier')
                        <!-- Total Income -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">Rp
                                {{ number_format($totalIncome, 0) }}</span>
                            <h3 class="mt-3 text-xl text-white">Total Pendapatan</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>

                        <!-- Today's Sales -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">
                                Rp
                                {{ number_format($dailySales->where('day', \Carbon\Carbon::today()->format('Y-m-d'))->first()->total ?? 0, 0) }}
                            </span>
                            <h3 class="mt-3 text-xl text-white">Penjualan Harian</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-cash-register"></i>
                            </div>
                        </div>


                        <!-- Yesterday's Sales -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">
                                Rp
                                {{ number_format($dailySales->where('day', \Carbon\Carbon::yesterday()->format('Y-m-d'))->first()->total ?? 0, 0) }}
                            </span>
                            <h3 class="mt-3 text-xl text-white">Penjualan Kemarin</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-history"></i>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Charts Section (Role-based) -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Analytics Graph (Larger) -->
                    <div class="lg:col-span-2">
                        <div class="flex overflow-hidden flex-col px-8 py-10 rounded-2xl bg-slate-600 text-white h-full">
                            <strong class="text-4xl font-bold tracking-tighter leading-none text-amber-200">
                                @if ($userRole == 'warehouse')
                                    {{ number_format($totalStock) }}
                                @elseif($userRole == 'manager' || $userRole == 'cashier')
                                    Rp {{ number_format($totalIncome, 0) }}
                                @else
                                    {{ number_format($totalStock) }}
                                @endif
                            </strong>
                            <h3 class="mt-6 text-xl text-white">
                                @if ($userRole == 'warehouse')
                                    Stock Overview
                                @elseif($userRole == 'manager' || $userRole == 'cashier')
                                    Revenue Overview
                                @else
                                    Stock Overview
                                @endif
                            </h3>
                            <div class="mt-10 w-full h-64">
                                @if ($userRole == 'warehouse')
                                    <canvas id="stockHistoryChart"></canvas>
                                @elseif($userRole == 'manager' || $userRole == 'cashier')
                                    <canvas id="monthlySalesChart"></canvas>
                                @else
                                    <canvas id="stockHistoryChart"></canvas>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Recent Items (Smaller) -->
                    <div class="lg:col-span-1">
                        <div
                            class="flex overflow-hidden flex-col pt-5 px-7 pb-8 h-full rounded-2xl bg-slate-600 text-white">
                            <h3 class="text-xl font-bold tracking-tight text-amber-200">
                                @if ($userRole == 'warehouse')
                                    Stock Terkini
                                @elseif($userRole == 'manager' || $userRole == 'cashier')
                                    Transaksi Terkini
                                @else
                                    Stock Terkini
                                @endif
                            </h3>

                            @if ($userRole == 'warehouse' && isset($recentStockAdjustments))
                                <div class="mt-4 space-y-5">
                                    @forelse($recentStockAdjustments->take(6) as $adjustment)
                                        <div class="flex justify-between">
                                            <div>
                                                <h4 class="text-sm font-bold">{{ $adjustment->product->product_name }}</h4>
                                                <p class="text-xs text-gray-300">
                                                    {{ $adjustment->created_at->format('M d, Y') }}</p>
                                            </div>
                                            <div
                                                class="text-sm font-bold {{ $adjustment->adjustment_type == 'in' ? 'text-green-400' : 'text-red-400' }}">
                                                {{ $adjustment->adjustment_type == 'in' ? '+' : '-' }}{{ $adjustment->quantity }}
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-gray-300">No recent stock adjustments</p>
                                    @endforelse
                                </div>
                            @elseif(($userRole == 'manager' || $userRole == 'cashier') && isset($recentTransactions))
                                <div class="mt-4 space-y-5">
                                    @forelse($recentTransactions->take(6) as $transaction)
                                        <div class="flex justify-between">
                                            <div>
                                                <h4 class="text-sm font-bold">Order #{{ $transaction->id }}</h4>
                                                <p class="text-xs text-gray-300">
                                                    {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('M d, Y') }}
                                                </p>
                                            </div>
                                            <div class="text-sm font-bold text-green-400">
                                                Rp {{ number_format($transaction->total_price, 2) }}
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-gray-300">No recent transactions</p>
                                    @endforelse
                                </div>
                            @else
                                <p class="mt-4 text-gray-300">No data available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            @if (session('success'))
                Toast.fire({
                    icon: "success",
                    title: "Login Berhasil",
                });
            @endif
            // Mobile sidebar toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const closeSidebar = document.getElementById('close-sidebar');
            const sidebarBackdrop = document.getElementById('sidebar-backdrop');

            if (mobileMenuButton && mobileSidebar) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileSidebar.classList.remove('-translate-x-full');
                });
            }

            if (closeSidebar && mobileSidebar) {
                closeSidebar.addEventListener('click', function() {
                    mobileSidebar.classList.add('-translate-x-full');
                });
            }

            if (sidebarBackdrop && mobileSidebar) {
                sidebarBackdrop.addEventListener('click', function() {
                    mobileSidebar.classList.add('-translate-x-full');
                });
            }

            // Get current user role from the page
            const userRole = '{{ $userRole }}';

            // WAREHOUSE ROLE CHARTS
            if (userRole === 'warehouse' || userRole === 'default') {
                // Stock History Chart
                const stockHistoryCtx = document.getElementById('stockHistoryChart');
                if (stockHistoryCtx) {
                    new Chart(stockHistoryCtx, {
                        type: 'line',
                        data: {
                            labels: [
                                @foreach ($stockHistory as $item)
                                    '{{ $item->month_name }}',
                                @endforeach
                            ],
                            datasets: [{
                                label: 'Net Stock Change',
                                data: [
                                    @foreach ($stockHistory as $item)
                                        {{ $item->net_change }},
                                    @endforeach
                                ],
                                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                                borderColor: '#FADE73',
                                pointRadius: 3,
                                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                                pointBorderColor: 'rgba(78, 115, 223, 1)',
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                tension: 0.3
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)'
                                    },
                                    ticks: {
                                        color: '#A3AED0',
                                        callback: function(value) {
                                            return value + ' units';
                                        }
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: '#A3AED0'
                                    },
                                    grid: {
                                        display: false
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                }

                // Stock by Category Chart
                const stockByCategoryCtx = document.getElementById('stockByCategoryChart');
                if (stockByCategoryCtx) {
                    new Chart(stockByCategoryCtx, {
                        type: 'bar',
                        data: {
                            labels: [
                                @foreach ($stockMovementByCategory as $item)
                                    '{{ $item->category_name }}',
                                @endforeach
                            ],
                            datasets: [{
                                    label: 'Stock In',
                                    data: [
                                        @foreach ($stockMovementByCategory as $item)
                                            {{ $item->total_in }},
                                        @endforeach
                                    ],
                                    backgroundColor: 'rgba(28, 200, 138, 0.8)',
                                    borderColor: '#FADE73',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Stock Out',
                                    data: [
                                        @foreach ($stockMovementByCategory as $item)
                                            {{ $item->total_out }},
                                        @endforeach
                                    ],
                                    backgroundColor: 'rgba(231, 74, 59, 0.8)',
                                    borderColor: 'rgba(231, 74, 59, 1)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)'
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return value + ' units';
                                        }
                                    }
                                },
                                x: {
                                    grid: {
                                        display: false
                                    }
                                }
                            }
                        }
                    });
                }
            }

            // MANAGER AND CASHIER ROLE CHARTS
            if (userRole === 'manager' || userRole === 'cashier' || userRole === 'default') {
                // Monthly Sales Chart
                const monthlySalesCtx = document.getElementById('monthlySalesChart');
                if (monthlySalesCtx) {
                    new Chart(monthlySalesCtx, {
                        type: 'line',
                        data: {
                            labels: [
                                @foreach ($monthlySales as $sale)
                                    '{{ $sale->month_name }}',
                                @endforeach
                            ],
                            datasets: [{
                                label: 'Monthly Sales',
                                data: [
                                    @foreach ($monthlySales as $sale)
                                        {{ $sale->total }},
                                    @endforeach
                                ],
                                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                                borderColor: '#FADE73',
                                pointRadius: 3,
                                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                                pointBorderColor: 'rgba(78, 115, 223, 1)',
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                tension: 0.3
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: '#E9EDF7'
                                    },
                                    ticks: {
                                        color: '#A3AED0',
                                        callback: function(value) {
                                            return 'Rp' + value.toLocaleString();
                                        }
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: '#A3AED0'
                                    },
                                    grid: {
                                        display: false,
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return 'Penjualan: Rp ' + context.raw.toLocaleString();
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                // Sales by Category Chart
                const salesByCategoryCtx = document.getElementById('salesByCategoryChart');
                if (salesByCategoryCtx) {
                    new Chart(salesByCategoryCtx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                @foreach ($salesByCategory as $sale)
                                    '{{ $sale->category_name }}',
                                @endforeach
                            ],
                            datasets: [{
                                data: [
                                    @foreach ($salesByCategory as $sale)
                                        {{ $sale->total_sold }},
                                    @endforeach
                                ],
                                backgroundColor: [
                                    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b',
                                    '#5a5c69', '#858796'
                                ],
                                hoverBackgroundColor: [
                                    '#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#be2617',
                                    '#484a54', '#60616f'
                                ],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            cutout: '70%',
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        padding: 20
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return context.label + ': ' + context.raw + ' units';
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }

            // CASHIER ONLY CHARTS
            if (userRole === 'cashier' || userRole === 'default') {
                // Daily Sales Chart
                const dailySalesCtx = document.getElementById('dailySalesChart');
                if (dailySalesCtx) {
                    new Chart(dailySalesCtx, {
                        type: 'bar',
                        data: {
                            labels: [
                                @foreach ($dailySales as $sale)
                                    '{{ $sale->day_name }}',
                                @endforeach
                            ],
                            datasets: [{
                                label: 'Daily Sales',
                                data: [
                                    @foreach ($dailySales as $sale)
                                        {{ $sale->total }},
                                    @endforeach
                                ],
                                backgroundColor: 'rgba(54, 185, 204, 0.8)',
                                borderColor: 'rgba(54, 185, 204, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)'
                                    },
                                    ticks: {
                                        color: '#A3AED0',
                                        callback: function(value) {
                                            return '$' + value.toLocaleString();
                                        }
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: '#A3AED0'
                                    },
                                    grid: {
                                        display: false
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return 'Sales: $' + context.raw.toLocaleString();
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
@endsection
