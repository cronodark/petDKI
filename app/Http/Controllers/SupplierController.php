<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;


class SupplierController extends Controller
{
    public function getSuppliers()
{
    $data = DB::table('suppliers')
        ->select(
            'id',
            'name',
            'description',
            'photo_url as image_url',
            'address',
            'latitude',
            'longitude',
            'phone',
            'category'
        )
        ->get();

    return response()->json($data);
}

public function webgis()
{
    $suppliers = Supplier::all(); 
    return view('webgis', compact('suppliers')); 
}

}
