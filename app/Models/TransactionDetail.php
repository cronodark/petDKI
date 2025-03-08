<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'transaction_id',
        'product_id'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
