<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(10);
        dd($transactions);
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
        return view("transactions.create");
    }

    public function store(Request $request){
        //fungsi untuk pos
    }
}
