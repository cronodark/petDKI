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
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
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

                        <!-- Low Stock Items -->
                        <div class="flex flex-col overflow-hidden rounded-2xl bg-slate-600 text-white min-w-full">
                            <div class="px-8 py-6 border-b border-slate-500">
                                <h3 class="text-2xl font-bold text-amber-200">Produk dengan Stok Rendah</h3>
                            </div>
                            <div class="px-8 py-6">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm">
                                        <thead>
                                            <tr class="text-left border-b border-slate-500">
                                                <th class="pb-3 pr-4 font-semibold text-gray-300">Produk</th>
                                                <th class="pb-3 pr-4 font-semibold text-gray-300">Kategori</th>
                                                <th class="pb-3 pr-4 font-semibold text-gray-300">Stok Saat Ini</th>
                                                <th class="pb-3 font-semibold text-gray-300">SKU</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lowStockProducts as $product)
                                                <tr class="border-b border-slate-700">
                                                    <td class="py-3 pr-4">{{ $product->product_name }}</td>
                                                    <td class="py-3 pr-4">{{ $product->category->category_name }}</td>
                                                    <td class="py-3 pr-4">
                                                        <span class="px-2 py-1 rounded text-xs bg-red-600 text-white">
                                                            {{ $product->stock }}
                                                        </span>
                                                    </td>
                                                    <td class="py-3">{{ $product->sku }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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

                        {{-- <!-- Total Expenses -->
                        <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">{{ $totalTransactions }}</span>
                            <h3 class="mt-3 text-xl text-white">Total Transaksi </h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-minus-circle"></i>
                            </div>
                        </div> --}}
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
                        {{-- <div class="flex flex-col overflow-hidden px-8 py-6 rounded-2xl bg-slate-600 text-white">
                            <span class="text-4xl font-bold tracking-tighter text-amber-200">
                                Rp
                                {{ number_format($dailySales->where('day', \Carbon\Carbon::yesterday()->format('Y-m-d'))->first()->total ?? 0, 0) }}
                            </span>
                            <h3 class="mt-3 text-xl text-white">Penjualan Kemarin</h3>
                            <div class="text-gray-300 text-lg mt-auto">
                                <i class="fas fa-history"></i>
                            </div>
                        </div> --}}
                    @endif
                </div>

                <!-- Charts Section (Role-based) -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Analytics Graph (Larger) -->
                    <div class="lg:col-span-2">
                        <div class="flex overflow-hidden flex-col px-8 py-10 rounded-2xl bg-slate-600 text-white h-full">
                            @if ($userRole == 'warehouse')
                                <div class="flex justify-between items-center mb-4">
                                    <strong class="text-2xl font-bold tracking-tighter leading-none text-amber-200">
                                        Total Stok Terkini = {{ number_format($totalStock) }}
                                    </strong>
                                    <div class="flex space-x-2">
                                        <input type="week" id="weekSelector"
                                            class="bg-white text-slate-800 rounded px-2 py-1 text-sm"
                                            value="{{ now()->format('Y-\WW') }}">
                                        <button id="refreshChart"
                                            class="bg-amber-200 text-slate-800 px-3 py-1 rounded text-sm cursor-pointer">
                                            Perbarui
                                        </button>
                                    </div>
                                </div>
                                <h3 class="text-xl text-white ">Statistik Stok Mingguan</h3>
                            @elseif($userRole == 'manager' || $userRole == 'cashier')
                                <strong class="text-4xl font-bold tracking-tighter leading-none text-amber-200">
                                    Rp {{ number_format($totalIncome, 0) }}
                                </strong>
                                <h3 class="mt-6 text-xl text-white">Revenue Overview</h3>
                            @else
                                <strong class="text-4xl font-bold tracking-tighter leading-none text-amber-200">
                                    {{ number_format($totalStock) }}
                                </strong>
                                <h3 class="mt-6 text-xl text-white">Stock Overview</h3>
                            @endif
                            <div class="mt-6 w-full h-64">
                                @if ($userRole == 'warehouse')
                                    <canvas id="weeklyStockChart"></canvas>
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
                        @if ($userRole == 'warehouse')
                            <div
                                class="flex overflow-hidden flex-col pt-5 px-7 py-8 h-full rounded-2xl bg-slate-600 text-white">
                                <h3 class="text-2xl font-bold tracking-tight text-amber-200">
                                    Stock Terkini
                                </h3>
                                <div class="mt-4 space-y-5">
                                    @forelse($recentStockAdjustments->take(7) as $adjustment)
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
                            </div>
                        @elseif(($userRole == 'manager' || $userRole == 'cashier') && isset($recentTransactions))
                            <div
                                class="flex overflow-hidden flex-col pt-5 px-7 pb-8 h-full rounded-2xl bg-slate-600 text-white">
                                <h3 class="text-xl font-bold tracking-tight text-amber-200">
                                    Transaksi Terkini
                                </h3>
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
                            </div>
                        @else
                            <div
                                class="flex overflow-hidden flex-col pt-5 px-7 pb-8 h-full rounded-2xl bg-slate-600 text-white">
                                <p class="mt-4 text-gray-300">No data available</p>
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
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
                // Weekly Stock Chart with date selection
                let weeklyStockChart = null;

                function fetchWeeklyStockData(weekValue) {
                    // In a real application, this would be an AJAX call to your backend
                    // For demonstration, we'll simulate the data based on the selected week
                    return new Promise((resolve) => {
                        // Parse year and week number from the input
                        const [year, week] = weekValue.split('-W');

                        // Simulate an API call with setTimeout
                        setTimeout(() => {
                            // Generate start date of the selected week
                            const startOfWeek = moment().year(year).isoWeek(week).startOf(
                            'isoWeek');

                            // Generate daily labels for the week
                            const labels = [];
                            const stockInData = {!! json_encode($stockInData) !!};
                            const stockOutData = {!! json_encode($stockOutData) !!};

                            const stockInFinalData = [];
                            const stockOutFinalData = [];
                            const netChangeData = [];

                            console.log(stockInData, stockOutData); // For debugging

                            // Generate sample data for each day of the week
                            for (let i = 0; i < 7; i++) {
                                const currentDay = moment(startOfWeek).add(i, 'days');
                                const currentDate = currentDay.format('YYYY-MM-DD');

                                labels.push(currentDay.format('ddd DD MMM'));

                                // Get stock in and stock out values for the day (defaults to 0 if missing)
                                const stockIn = stockInData[currentDate] || 0;
                                const stockOut = stockOutData[currentDate] || 0;

                                // Push values to final data arrays
                                stockInFinalData.push(stockIn);
                                stockOutFinalData.push(stockOut);

                                // Calculate net change for the day
                                netChangeData.push(stockIn - stockOut);
                            }

                            // Resolve the data for chart
                            resolve({
                                labels,
                                stockInFinalData,
                                stockOutFinalData,
                                netChangeData
                            });
                        }, 300); // Simulate a delay (e.g., API call)
                    });
                }


                function createWeeklyStockChart(data) {
                    const weeklyStockCtx = document.getElementById('weeklyStockChart');

                    if (weeklyStockChart) {
                        weeklyStockChart.destroy();
                    }

                    if (weeklyStockCtx) {
                        weeklyStockChart = new Chart(weeklyStockCtx, {
                            type: 'line',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                        label: 'Stock In',
                                        data: data.stockInFinalData,
                                        backgroundColor: 'rgba(28, 200, 138, 0.1)',
                                        borderColor: '#1cc88a',
                                        pointRadius: 3,
                                        pointBackgroundColor: '#1cc88a',
                                        pointBorderColor: '#1cc88a',
                                        pointHoverRadius: 5,
                                        pointHitRadius: 10,
                                        pointBorderWidth: 2,
                                        tension: 0.2
                                    },
                                    {
                                        label: 'Stock Out',
                                        data: data.stockOutFinalData,
                                        backgroundColor: 'rgba(231, 74, 59, 0.1)',
                                        borderColor: '#e74a3b',
                                        pointRadius: 3,
                                        pointBackgroundColor: '#e74a3b',
                                        pointBorderColor: '#e74a3b',
                                        pointHoverRadius: 5,
                                        pointHitRadius: 10,
                                        pointBorderWidth: 2,
                                        tension: 0.2
                                    },
                                    {
                                        label: 'Net Change',
                                        data: data.netChangeData,
                                        backgroundColor: 'rgba(255, 222, 115, 0.1)',
                                        borderColor: '#FADE73',
                                        pointRadius: 3,
                                        pointBackgroundColor: '#FADE73',
                                        pointBorderColor: '#FADE73',
                                        pointHoverRadius: 5,
                                        pointHitRadius: 10,
                                        pointBorderWidth: 2,
                                        tension: 0.3
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: false,
                                        grid: {
                                            color: 'rgba(255, 255, 255, 0.1)'
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
                                        display: true,
                                        position: 'top',
                                        labels: {
                                            color: '#A3AED0',
                                            usePointStyle: true,
                                            padding: 20
                                        }
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                let label = context.dataset.label || '';
                                                if (label) {
                                                    label += ': ';
                                                }
                                                label += context.parsed.y + ' units';
                                                return label;
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    }
                }

                // Initialize the weekly stock chart with the current week
                const weekSelector = document.getElementById('weekSelector');
                if (weekSelector) {
                    fetchWeeklyStockData(weekSelector.value).then(createWeeklyStockChart);

                    // Event listener for refresh button
                    document.getElementById('refreshChart').addEventListener('click', function() {
                        fetchWeeklyStockData(weekSelector.value).then(createWeeklyStockChart);
                    });
                }

                // Monthly Stock Movement Chart (for Stock In/Out section)
                const monthlyStockMovementCtx = document.getElementById('monthlyStockMovementChart');
                if (monthlyStockMovementCtx) {
                    // This would typically be data from your backend
                    // Creating sample data for last 30 days
                    const lastMonthDates = [];
                    const stockInValues = [];
                    const stockOutValues = [];

                    // Generate sample data for the last 30 days
                    for (let i = 29; i >= 0; i--) {
                        const date = moment().subtract(i, 'days');

                        // Only add labels for every 5th day for readability
                        if (i % 5 === 0) {
                            lastMonthDates.push(date.format('DD MMM'));
                        } else {
                            lastMonthDates.push('');
                        }

                        // Generate random but somewhat consistent data
                        const base = Math.floor(Math.random() * 30) + 5;
                        stockInValues.push(base + Math.floor(Math.random() * 15));
                        stockOutValues.push(base - Math.floor(Math.random() * 10));
                    }

                    new Chart(monthlyStockMovementCtx, {
                        type: 'bar',
                        data: {
                            labels: lastMonthDates,
                            datasets: [{
                                    label: 'Stock In',
                                    data: stockInValues,
                                    backgroundColor: 'rgba(28, 200, 138, 0.8)',
                                    borderColor: 'rgba(28, 200, 138, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Stock Out',
                                    data: stockOutValues,
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
                                        color: 'rgba(255, 255, 255, 0.1)'
                                    },
                                    ticks: {
                                        color: '#A3AED0',
                                        callback: function(value) {
                                            return value;
                                        }
                                    }
                                },
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        color: '#A3AED0',
                                        autoSkip: true,
                                        maxRotation: 0
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                    labels: {
                                        color: '#A3AED0',
                                        usePointStyle: true,
                                        boxWidth: 8,
                                        padding: 10
                                    }
                                }
                            }
                        }
                    });
                }

                // Stock History Chart (preserve original functionality)
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
