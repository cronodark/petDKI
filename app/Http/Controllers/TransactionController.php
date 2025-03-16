<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(10);
        return view("transactions.index");
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
        $producst = Product::all();
        // return view("transactions.create", compact("products"));
    }

    public function store(Request $request){
        //fungsi untuk pos
    }
}
