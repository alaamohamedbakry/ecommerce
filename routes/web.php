<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Order;
use Database\Factories\ProductFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('customers', CustomerController::class)->except('show');
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/Addproductimages/{productid}', [ProductController::class, 'addproductimages'])->name('addproductimage');
    Route::post('/storeproductimage', [ProductController::class, 'storeproductimage'])->name('storeproductimage');
    Route::delete('/removephotos/{productPhoto}', [ProductController::class, 'removeproductphotos'])->name('removeproductphotos');
    Route::delete('orderdetails/{id}', [OrderController::class, 'delete'])->name('orderdetails.delete');

   Route::get('/gettotalcustomer',[CustomerController::class,'gettotalcustomer'])->name('gettotalcustomer');
   Route::get('/total-order',[OrderController::class,'totalorders'])->name('total-orders');
   Route::get('/total-products',[ProductController::class,'totalproducts'])->name('total-products');
   Route::get('/total-earnings', [OrderController::class, 'getEarnings'])->name('total-earnings');
   Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('showdashboard');
   Route::get('/chart-product', [ProductController::class, 'getchart'])->name('chart-product');
   Route::get('/chart-earnings', [OrderController::class, 'chartearnings'])->name('chart-earnings');
});

require __DIR__ . '/auth.php';
