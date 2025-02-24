<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustments extends Model
{
    use HasFactory;

    protected $fillable = [
        'adjustment_type',
        'quantity',
        'reason',
        'product_id',
        'user_id'
    ];

}
