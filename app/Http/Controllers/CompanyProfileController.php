<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function catalog()
    {
        //fecth categories
        $categories = Category::with('products')->get();
        return view('catalog', compact('categories'));
    }
}
