<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockAdjustments;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'manager') {
            $transactions = Transaction::with('user')->paginate(5);
        } else {
            $transactions = Transaction::where('user_id', Auth::user()->id)->paginate(5);
        }
        return view("dashboard.admin.transaction.main", compact("transactions"));
    }

    public function show($id)
    {
        $transaction = Transaction::with('transactionDetails.product.category', 'user')->findOrFail($id);
        return view("dashboard.admin.transaction.detail", compact("transaction"));
    }

    public function create()
    {
        //halaman pos
        $products = Product::all();
        return view("pos", compact("products"));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $transaction = Transaction::create([
                'transaction_date' => date('Y-m-d'),
                'user_id' => Auth::user()->id,
                'total_price' => $request->total_price
            ]);
            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);

                if ($product->stock < $item['quantity']) {
                    return back()->with('error', 'Stok tidak mencukupi untuk produk ' . $product->name);
                }

                $transaction->transactionDetails()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);

                $product->update([
                    'stock' => $product->stock - $item['quantity']
                ]);

                $data = StockAdjustments::create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'adjustment_type' => 'out',
                    'reason' => 'Penjualan produk',
                    'user_id' => Auth::user()->id,
                ]);
            }
            DB::commit();
            return back()->with('success', 'Transaksi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Transaksi gagal disimpan');
        }
    }
}
