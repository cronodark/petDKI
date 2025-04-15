@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg hidden lg:block">
        <div class="p-6 border-b">
            <h2 class="text-xl font-semibold text-blue-600">Inventory Dashboard</h2>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <p class="text-sm text-gray-600">Logged in as:</p>
                <p class="font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>
            <nav class="mt-6 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-blue-600 bg-blue-50 rounded hover:bg-blue-100">🏠 Dashboard</a>
                <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-gray-200">📦 Products</a>
                <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-gray-200">💰 Transactions</a>
                <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-gray-200">📊 Reports</a>
                <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-gray-200">👥 Users</a>
            </nav>
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="w-full px-4 py-2 text-sm text-red-600 bg-red-100 rounded hover:bg-red-200">🚪 Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-800">Welcome, {{ Auth::user()->name }} 👋</h1>
            <div class="lg:hidden">
                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6 space-y-8">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                <!-- Total Users -->
                <div class="bg-white shadow rounded-xl p-4 border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm text-blue-600 uppercase font-semibold">Total Users</h3>
                            <p class="text-lg font-bold text-gray-800 mt-1">{{ $totalEmployees }}</p>
                        </div>
                        <div class="text-gray-300 text-3xl">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Income -->
                <div class="bg-white shadow rounded-xl p-4 border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm text-green-600 uppercase font-semibold">Total Income</h3>
                            <p class="text-lg font-bold text-gray-800 mt-1">${{ number_format($totalIncome, 2) }}</p>
                        </div>
                        <div class="text-gray-300 text-3xl">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Expenses -->
                <div class="bg-white shadow rounded-xl p-4 border-l-4 border-red-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm text-red-600 uppercase font-semibold">Total Expenses</h3>
                            <p class="text-lg font-bold text-gray-800 mt-1">${{ number_format($totalOutcome, 2) }}</p>
                        </div>
                        <div class="text-gray-300 text-3xl">
                            <i class="fas fa-minus-circle"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Stock -->
                <div class="bg-white shadow rounded-xl p-4 border-l-4 border-cyan-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm text-cyan-600 uppercase font-semibold">Total Inventory</h3>
                            <p class="text-lg font-bold text-gray-800 mt-1">{{ number_format($totalStock) }} units</p>
                        </div>
                        <div class="text-gray-300 text-3xl">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Monthly Sales Chart -->
                <div class="bg-white shadow rounded-xl">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-semibold text-blue-600">Monthly Sales</h2>
                    </div>
                    <div class="p-4">
                        <div class="w-full h-64">
                            <canvas id="monthlySalesChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Sales by Category Chart -->
                <div class="bg-white shadow rounded-xl">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-semibold text-blue-600">Sales by Category</h2>
                    </div>
                    <div class="p-4">
                        <div class="w-full h-64">
                            <canvas id="salesByCategoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Transactions -->
                <div class="bg-white shadow rounded-xl">
                    <div class="p-4 border-b flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-blue-600">Recent Transactions</h2>
                        <a href="#" class="text-sm text-blue-500 hover:underline">View All</a>
                    </div>
                    <div class="p-4 overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <thead>
                                <tr class="text-xs text-gray-500 uppercase border-b">
                                    <th class="p-2">Date</th>
                                    <th class="p-2">Amount</th>
                                    <th class="p-2">User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentTransactions as $transaction)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-2">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('M d, Y') }}</td>
                                    <td class="p-2">${{ number_format($transaction->total_price, 2) }}</td>
                                    <td class="p-2">{{ $transaction->user->name }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="p-2 text-center text-gray-500">No recent transactions</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Stock Adjustments -->
                <div class="bg-white shadow rounded-xl">
                    <div class="p-4 border-b flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-blue-600">Recent Stock Adjustments</h2>
                        <a href="#" class="text-sm text-blue-500 hover:underline">View All</a>
                    </div>
                    <div class="p-4 overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <thead>
                                <tr class="text-xs text-gray-500 uppercase border-b">
                                    <th class="p-2">Date</th>
                                    <th class="p-2">Product</th>
                                    <th class="p-2">Type</th>
                                    <th class="p-2">Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentStockAdjustments as $adjustment)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-2">{{ $adjustment->created_at->format('M d, Y') }}</td>
                                    <td class="p-2">{{ $adjustment->product->product_name }}</td>
                                    <td class="p-2">
                                        @if($adjustment->adjustment_type == 'increase')
                                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">In</span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Out</span>
                                        @endif
                                    </td>
                                    <td class="p-2">{{ $adjustment->quantity }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="p-2 text-center text-gray-500">No recent stock adjustments</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Low Stock Items -->
            <div class="bg-white shadow rounded-xl">
                <div class="p-4 border-b flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-yellow-600">Low Stock Items</h2>
                    <a href="#" class="text-sm text-yellow-500 hover:underline">View All</a>
                </div>
                <div class="p-4 overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead>
                            <tr class="text-xs text-gray-500 uppercase border-b">
                                <th class="p-2">Product</th>
                                <th class="p-2">Category</th>
                                <th class="p-2">Stock</th>
                                <th class="p-2">SKU</th>
                                <th class="p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lowStockProducts as $product)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-2">{{ $product->product_name }}</td>
                                <td class="p-2">{{ $product->category->category_name }}</td>
                                <td class="p-2">
                                    <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                <td class="p-2">{{ $product->sku }}</td>
                                <td class="p-2">
                                    <a href="#" class="text-blue-500 hover:underline">Restock</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-2 text-center text-gray-500">No low stock items</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Mobile Sidebar (Hidden by default) -->
<div id="mobile-sidebar" class="fixed inset-0 z-20 transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden">
    <div class="absolute inset-0 bg-gray-600 opacity-75" id="sidebar-backdrop"></div>
    <div class="relative bg-white h-full w-64 overflow-y-auto">
        <div class="p-6 border-b">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-blue-600">Inventory Dashboard</h2>
                <button id="close-sidebar" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <p class="text-sm text-gray-600">Logged in as:</p>
                <p class="font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>
            <nav class="mt-6 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-blue-600 bg-blue-50 rounded hover:bg-blue-100">🏠 Dashboard</a>
                <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-gray-200">📦 Products</a>
                <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-gray-200">💰 Transactions</a>
                <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-gray-200">📊 Reports</a>
                <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-gray-200">👥 Users</a>
            </nav>
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="w-full px-4 py-2 text-sm text-red-600 bg-red-100 rounded hover:bg-red-200">🚪 Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile sidebar toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    const closeSidebar = document.getElementById('close-sidebar');
    const sidebarBackdrop = document.getElementById('sidebar-backdrop');
    
    if(mobileMenuButton && mobileSidebar) {
        mobileMenuButton.addEventListener('click', function() {
            mobileSidebar.classList.remove('-translate-x-full');
        });
    }
    
    if(closeSidebar && mobileSidebar) {
        closeSidebar.addEventListener('click', function() {
            mobileSidebar.classList.add('-translate-x-full');
        });
    }
    
    if(sidebarBackdrop && mobileSidebar) {
        sidebarBackdrop.addEventListener('click', function() {
            mobileSidebar.classList.add('-translate-x-full');
        });
    }
    
    // Monthly Sales Chart
    const monthlySalesCtx = document.getElementById('monthlySalesChart');
    if(monthlySalesCtx) {
        new Chart(monthlySalesCtx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($monthlySales as $sale)
                        '{{ $sale->month_name }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Monthly Sales',
                    data: [
                        @foreach($monthlySales as $sale)
                            {{ $sale->total }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
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
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
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
                        backgroundColor: 'rgba(255, 255, 255, 0.8)',
                        titleColor: '#6e707e',
                        bodyColor: '#6e707e',
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
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

    // Sales by Category Chart
    const salesByCategoryCtx = document.getElementById('salesByCategoryChart');
    if(salesByCategoryCtx) {
        new Chart(salesByCategoryCtx, {
            type: 'doughnut',
            data: {
                labels: [
                    @foreach($salesByCategory as $sale)
                        '{{ $sale->category_name }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($salesByCategory as $sale)
                            {{ $sale->total_sold }},
                        @endforeach
                    ],
                    backgroundColor: [
                        '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#5a5c69', '#858796'
                    ],
                    hoverBackgroundColor: [
                        '#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#be2617', '#484a54', '#60616f'
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
                        backgroundColor: 'rgba(255, 255, 255, 0.8)',
                        titleColor: '#6e707e',
                        bodyColor: '#6e707e',
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
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
});
</script>
@endsection