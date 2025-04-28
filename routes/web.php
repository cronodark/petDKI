<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompanyProfileController::class, 'index'])->name('company-profile.index');
Route::get('/catalog', [CompanyProfileController::class, 'catalog'])->name('company-profile.catalog');

Route::get('/login', [AuthController::class, 'login'])->name("login")->middleware("guest");
Route::post('/auth', [AuthController::class, 'authentication'])->name("auth")->middleware("guest");

Route::middleware("auth")->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
    Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    //route
    Route::middleware("role:manager")->group(function () {
        Route::prefix('worker')->as('manager.worker.')->group(function () {
            Route::get('/', [WorkerController::class, 'index'])->name('index');
            Route::get('/add', [WorkerController::class, 'create'])->name('create');
            Route::post('/add', [WorkerController::class, 'store'])->name('store');
            Route::get('/{id}', [WorkerController::class, 'show'])->name('show');
            Route::post('/{id}', [WorkerController::class, 'update'])->name('update');
            Route::delete('/{id}', [WorkerController::class, 'destroy'])->name('destroy');
        });

        // Route::prefix('transactions')->as('manager.transactions.')->group(function () {
        //     Route::get('/', [TransactionController::class, 'index'])->name('index');
        //     Route::get('/{id}', [TransactionController::class, 'show'])->name('show');
        // });

        Route::get('/products/report/pdf', [ProductController::class, 'generatePdfRecap'])->name('products.pdf.recap');
    });

    //route
    Route::middleware("role:cashier")->group(function () {
        Route::get('/pos/create', [TransactionController::class, 'create'])->name('cashier.transactions.create');
        Route::post('/transactions', [TransactionController::class, 'store'])->name('cashier.transactions.store');

    });

    //route
    Route::middleware("role:warehouse")->group(function () {
        Route::prefix('warehouse')->name('warehouse.')->group(function () {
        //product
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
        //report
        Route::get('/products/report/pdf', [ProductController::class, 'generatePdfRecap'])->name('products.pdf.recap');
        //category
       // Categories
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::get('/categories/{category}/delete', [CategoryController::class, 'destroy'])
        ->name('categories.delete');
        //supply
        Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
        Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
        Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
        Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
        Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
        Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
        Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
        });
    });
});
