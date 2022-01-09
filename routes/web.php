<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSkuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('checkout/{order}', [CheckoutController::class, 'checkout'])->name('payment');

    Route::post('checkout', [CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::resource('products', ProductController::class)->only([
        'create', 'store'
    ])->middleware('merchant');

    Route::resource('products', ProductController::class)->only([
        'update', 'destroy', 'edit'
    ])->middleware('merchant-owner');

    Route::resource('product-skus/{product}', ProductSkuController::class)->only([
        'create', 'store'
    ])->middleware('merchant');

    Route::middleware(['admin'])->group(function () {

        Route::resource('categories', CategoryController::class)->only([
            'create', 'store', 'update', 'destroy', 'edit'
        ]);

        Route::get('admin/categories', [AdminController::class, 'index'])->name('admin.categories');

        Route::get('merchants', [MerchantController::class, 'index'])->name('merchants.index');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');
    });

    Route::resource('merchants', MerchantController::class)->only([
        'create', 'store'
    ]);
});

Route::get('/', [Controller::class, 'home'])->name('home');

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::view('contact', 'contact')->name('contact');

Route::view('about', 'about')->name('about');

require __DIR__ . '/auth.php';
