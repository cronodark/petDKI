<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = ['name', 'description', 'image_url', 'address', 'category'];

    protected $casts = [
        'geom' => 'array',
    ];

}
