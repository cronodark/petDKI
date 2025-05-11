<?php
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/suppliers', [SupplierController::class, 'getNearbySuppliers']);
Route::post('/suppliers', [SupplierController::class, 'store']);
