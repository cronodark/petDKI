<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("test");
});

Route::get('/login', [AuthController::class, 'login'])->name("login")->middleware("guest");
Route::post('/auth', [AuthController::class, 'authentication'])->name("auth")->middleware("guest");

Route::middleware("auth")->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");

    Route::get('/dashboard', [DashboardController ::class, 'index'])->name("dashboard");

    //route
    Route::middleware("role:manager")->group(function(){
        Route::get('/test-manager', function(){
            return "Test Manager";
        });
    });

    //route
    Route::middleware("role:cashier")->group(function(){
        Route::get('/test-cashier', function(){
            return "Test Cashier";
        });
    });

    //route
    Route::middleware("role:warehouse")->group(function(){
        Route::get('/test-warehouse', function(){
            return "Test Warehouse";
        });
    });
});

Route::get('/test', function (){
    return view("layouts.store");
})->name("test");
