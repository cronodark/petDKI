<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\StockAdjustments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total employees (users with role 'employee')
        $totalEmployees = User::count();


        // Total income (sum of all transactions)
        $totalIncome = Transaction::sum('total_price');

        // Total outcome (sum of stock adjustments that decrease inventory)
        $totalOutcome = StockAdjustments::where('adjustment_type', 'decrease')
            ->join('products', 'products.id', '=', 'stock_adjustments.product_id')
            ->sum(DB::raw('products.price * stock_adjustments.quantity'));

        // Recent transactions (last 5)
        $recentTransactions = Transaction::with(['user', 'transactionDetails.transaction'])
            ->orderBy('transaction_date', 'desc')
            ->limit(5)
            ->get();

        // Recent stock adjustments (in and out - last 5)
        $recentStockAdjustments = StockAdjustments::with(['product', 'user'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Total overall stock
        $totalStock = Product::sum('stock');

        // Sales by category for chart
        $salesByCategory = DB::table('transaction_details')
            ->join('products', 'products.id', '=', 'transaction_details.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('categories.category_name', DB::raw('SUM(transaction_details.quantity) as total_sold'))
            ->groupBy('categories.category_name')
            ->get();

        // Monthly sales for chart (last 6 months)
        $monthlySales = DB::table('transactions')
            ->select(DB::raw('MONTH(transaction_date) as month'), DB::raw('SUM(total_price) as total'))
            ->where('transaction_date', '>=', Carbon::now()->subMonths(6))
            ->groupBy(DB::raw('MONTH(transaction_date)'))
            ->orderBy(DB::raw('MONTH(transaction_date)'))
            ->get()
            ->map(function ($item) {
                $item->month_name = Carbon::create()->month($item->month)->format('F');
                return $item;
            });

        // Low stock products (stock less than 10)
        $lowStockProducts = Product::where('stock', '<', 10)
            ->orderBy('stock', 'asc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalEmployees',
            'totalIncome',
            'totalOutcome',
            'recentTransactions',
            'recentStockAdjustments',
            'totalStock',
            'salesByCategory',
            'monthlySales',
            'lowStockProducts'
        ));
    }
}