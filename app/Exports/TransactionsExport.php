<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if(Auth::user()->role == 'manager'){
            return Transaction::with('user')->get()->map(function ($transaction) {
                return [
                    'ID' => $transaction->id,
                    'Tanggal' => $transaction->transaction_date,
                    'Nama Kasir' => $transaction->user->name,
                    'Total Harga' => $transaction->total_price,
                ];
            });
        }else{
            return Transaction::where('user_id', Auth::user()->id)->get()->map(function ($transaction) {
                return [
                    'ID' => $transaction->id,
                    'Tanggal' => $transaction->transaction_date,
                    'Nama Kasir' => $transaction->user->name,
                    'Total Harga' => $transaction->total_price,
                ];
            });
        }
    }
}
