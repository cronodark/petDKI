<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'manager'){
            $transactions = Transaction::all();
        }else{
            $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        }
        return view("transactions.index", compact("transactions"));
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->load('transactionDetails');
        // return view("transactions.show", compact("transaction"));
    }

    public function create()
    {
        //halaman pos
        $products = Product::all();
        return view("pos", compact("products"));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $transaction = Transaction::create([
                'transaction_date' => date('Y-m-d'),
                'user_id' => Auth::user()->id,
                'total_price' => $request->total_price
            ]);
            foreach($request->items as $item){
                $transaction->transactionDetails()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }
            DB::commit();
            return back()->with('success', 'Transaksi berhasil disimpan');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Transaksi gagal disimpan');
        }
    }
}
