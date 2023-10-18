<?php

use App\Models\Product;
use App\Models\UserCart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CheckoutController;

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

define('PAGINATE', 8);

Route::get('/', [AuthController::class, 'wellcome'])->name('wellcome')->middleware('guest:admin');

Route::group(['middleware' => 'guest:web,admin', 'namespace' => 'User'], function () {
    Route::get('/login', [AuthController::class, 'get_login'])->name('get_login');
    Route::post('/login', [AuthController::class, 'post_login'])->name('post_login');
    Route::get('/register', [AuthController::class, 'get_register'])->name('get_register');
    Route::post('/register', [AuthController::class, 'post_register'])->name('post_register');
});
Route::group(['middleware' => 'auth:web,admin', 'namespace' => 'User'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => 'guest:admin', 'namespace' => 'User'], function () {
    Route::get('/shop', [ShopController::class, 'get_shop'])->name('get_shop');
    Route::get('/product/{id}', [ProductController::class, 'get_details_product'])->name('get_details_product');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});
Route::controller(CheckoutController::class)->middleware('guest:admin')->group(function () {
    Route::get('/checkout', 'index')->name('checkout.index');
    Route::post('/checkout/create', 'create')->name('checkout.create');
});
Route::controller(AccountController::class)->middleware('guest:admin')->group(function () {
    Route::get('/account', 'index')->name('account.index');
    Route::get('/item/show/{id}', 'show_item')->name('show_item');
});
