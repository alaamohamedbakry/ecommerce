<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Customer\CustomerRegisterController;
use App\Http\Controllers\Customer\ForgotPasswordController;
use App\Http\Controllers\Customer\LoginController;
use App\Http\Controllers\Customer\MyPageController;
use App\Http\Controllers\Customer\RegisterCustomerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/index', [FirstController::class, 'index'])->name('index');
Route::get('product/{catid}', [FirstController::class, 'product'])->name('product');
Route::get('shop', [FirstController::class, 'shop'])->name('shop');
Route::get('review', [FirstController::class, 'review'])->name('review');
Route::post('storereview', [FirstController::class, 'storereview'])->name('storereview');
Route::get('search', function (Request $request) {
    $product = Product::where('name', 'like', '%' . $request->search . '%')->paginate(6);
    return view('front.shop', ['products' => $product]);
})->name('search');
Route::get('/cart', [CartController::class, 'show'])->name('front.cart');
Route::get('/previousorder', [CartController::class, 'previousorder'])->name('previousorder')->middleware('customer');

Route::post('storeorder', [CartController::class, 'storeorder'])->name('storeorder');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('customer');

Route::get('/deleteproduct/{cart}', [CartController::class, 'delete'])->name('deleteproduct');

Route::get('/singleproduct/{product}', [FirstController::class, 'showproduct'])->name('singleproduct');

Route::post('addproducttocart/{productid}', [CartController::class, 'addproducttocart'])->name('addproducttocart')->middleware('customer');
Route::post('update-quantity', [CartController::class, 'updateQuantity'])->name('update.quantity');



Route::get('/contact-us',[FirstController::class,'show'])->name('contact_us');

Route::get('/about-us',[FirstController::class,'about_us'])->name('about_us');










Route::prefix('customer')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('customer_login');
    Route::post('/login_submit', [LoginController::class, 'login_submit'])->name('customer_login_submit');
    Route::view('/forget-password','front.forget-password')->name('forget-password');
    Route::post('/send-password-reset-link', [ForgotPasswordController::class, 'sendpasswordresetlink'])->name('send-password-reset-link');
    Route::get('/password/reset/{token}', [LoginController::class, 'resetpassword'])->name('reset-password');

    Route::get('/register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('customer.register.form');
    Route::post('/register', [CustomerRegisterController::class, 'store'])->name('customer.register');

    Route::get('/logout', [LoginController::class, 'logout'])->name('customer_logout');
});





// **المسارات الخاصة بالـ customer**
