<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\StockAdjustments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the current user's role
        $userRole = Auth::user()->role;
        
        // Initialize all possible variables with default values to avoid undefined variable errors
        $data = $this->initializeDefaultData();
        
        // Total overall stock - common for all roles
        $data['totalStock'] = Product::sum('stock');
        
        // Role-specific data
        switch ($userRole) {
            case 'warehouse':
                $this->getWarehouseData($data);
                break;
                
            case 'manager':
                $this->getManagerData($data);
                break;
                
            case 'cashier':
                $this->getCashierData($data);
                break;
                
            default:
                // Default to full access if role not specified
                $this->getWarehouseData($data);
                $this->getManagerData($data);
                $this->getCashierData($data);
        }
        
        return view('dashboard', $data);
    }
    
    private function initializeDefaultData()
    {
        // Initialize all possible variables with default values
        return [
            'userRole' => 'default',
            'totalStock' => 0,
            'totalCategories' => 0,
            'totalEmployees' => 0,
            'totalIncome' => 0,
            'totalOutcome' => 0,
            'recentTransactions' => collect(),
            'recentStockAdjustments' => collect(),
            'lowStockProducts' => collect(),
            'monthlySales' => collect(),
            'salesByCategory' => collect(),
            'stockMovement' => collect(),
            'stockHistory' => collect(),
            'dailySales' => collect(),
        ];
    }
    
    private function getWarehouseData(&$data)
    {
        // Total categories
        $data['totalCategories'] = Category::count();
        
        // Recent stock adjustments (in and out - last 5)
        $data['recentStockAdjustments'] = StockAdjustments::with(['product', 'user'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
            
        // Low stock products (stock less than 10)
        $data['lowStockProducts'] = Product::where('stock', '<', 10)
            ->with('category')
            ->orderBy('stock', 'asc')
            ->limit(5)
            ->get();
            
        // Monthly stock movement 
        $data['stockMovement'] = DB::table('stock_adjustments')
        ->select(
            DB::raw('SUM(CASE WHEN adjustment_type = "increase" THEN quantity ELSE 0 END) as total_in'),
            DB::raw('SUM(CASE WHEN adjustment_type = "decrease" THEN quantity ELSE 0 END) as total_out')
        )
        ->where('created_at', '>=', Carbon::now()->subDays(30)) // using 30 days as in the UI
        ->first();

        // Stock history over time (last 6 months)
        $data['stockHistory'] = DB::table('stock_adjustments')
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('SUM(CASE WHEN adjustment_type = "increase" THEN quantity ELSE -quantity END) as net_change')
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $monthDate = Carbon::createFromFormat('Y-m', $item->month);
                $item->month_name = $monthDate->format('F Y');
                return $item;
            });
            
        $data['userRole'] = 'warehouse';

        return route('dashboard', $data);
    }
    
    private function getManagerData(&$data)
    {
        // Total employees (users)
        $data['totalEmployees'] = User::count();
        
        // Total income (sum of all transactions)
        $data['totalIncome'] = Transaction::sum('total_price');
        
        // Total outcome (sum of stock adjustments that decrease inventory)
        $data['totalOutcome'] = StockAdjustments::where('adjustment_type', 'decrease')
            ->join('products', 'products.id', '=', 'stock_adjustments.product_id')
            ->sum(DB::raw('products.price * stock_adjustments.quantity'));
            
        // Recent transactions (last 5)
        $data['recentTransactions'] = Transaction::with(['user', 'transactionDetails.transaction'])
            ->orderBy('transaction_date', 'desc')
            ->limit(5)
            ->get();
            
        // Recent stock adjustments for manager
        $data['recentStockAdjustments'] = StockAdjustments::with(['product', 'user'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
            
        // Monthly sales for chart (last 6 months)
        $data['monthlySales'] = DB::table('transactions')
            ->select(
                DB::raw('DATE_FORMAT(transaction_date, "%Y-%m") as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->where('transaction_date', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $monthDate = Carbon::createFromFormat('Y-m', $item->month);
                $item->month_name = $monthDate->format('F Y');
                return $item;
            });
            
        // Sales by category for chart
        $data['salesByCategory'] = DB::table('transaction_details')
            ->join('products', 'products.id', '=', 'transaction_details.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('categories.category_name', DB::raw('SUM(transaction_details.quantity) as total_sold'))
            ->groupBy('categories.category_name')
            ->get();
            
        $data['userRole'] = 'manager';

        return view('dashboard', $data);
    }
    
    private function getCashierData(&$data)
    {
        // Total income (sum of all transactions)
        $data['totalIncome'] = Transaction::sum('total_price');
        
        // Recent transactions (last 5)
        $data['recentTransactions'] = Transaction::with(['user', 'transactionDetails.transaction'])
            ->orderBy('transaction_date', 'desc')
            ->limit(5)
            ->get();
            
        // Monthly sales for chart (last 6 months)
        $data['monthlySales'] = DB::table('transactions')
            ->select(
                DB::raw('DATE_FORMAT(transaction_date, "%Y-%m") as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->where('transaction_date', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $monthDate = Carbon::createFromFormat('Y-m', $item->month);
                $item->month_name = $monthDate->format('F Y');
                return $item;
            });
            
        // Daily sales for the last 7 days
        $data['dailySales'] = DB::table('transactions')
            ->select(
                DB::raw('DATE(transaction_date) as day'),
                DB::raw('SUM(total_price) as total')
            )
            ->where('transaction_date', '>=', Carbon::now()->subDays(7))
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->map(function ($item) {
                $dayDate = Carbon::createFromFormat('Y-m-d', $item->day);
                $item->day_name = $dayDate->format('D, M d');
                return $item;
            });
            
        // Sales by category (for cashier)
        $data['salesByCategory'] = DB::table('transaction_details')
            ->join('products', 'products.id', '=', 'transaction_details.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('categories.category_name', DB::raw('SUM(transaction_details.quantity) as total_sold'))
            ->groupBy('categories.category_name')
            ->get();
            
        $data['userRole'] = 'cashier';
    }
}