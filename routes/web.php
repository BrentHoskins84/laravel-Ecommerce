<?php

use App\Http\Controllers\CouponsController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'HomeController@index')->name('home');

//SHOP
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/cart', 'CartController@index')->name('cart.index');
Route::post('/shop/cart', 'CartController@store')->name('cart.store');
Route::get('/shop/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/shop/checkout', 'CheckoutController@store')->name('checkout.store');
Route::delete('/shop/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

//COUPONS
route::post('/coupon', 'CouponsController@store')->name('coupon.store');
route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

//THANK YOU
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

route::get('empty', function (){
    Cart::destroy();
});

Auth::routes();

Route::get('/admin/{opt?}', 'DashboardController@index')->middleware('can:admin')->name('admin')->where ('opt', '.*');

//Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
//    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
//});
