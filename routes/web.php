<?php

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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/','WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('products','ProductController');
Route::get('products/{product}','WelcomeController@show')->name('single.show');
Route::post('addtocart/{product}','ShopController@addToCart')->name('add.cart');
Route::get('/cart','ShopController@cart')->name('cart');
Route::get('delete/item/{id}','ShopController@delete')->name('delete.item');
Route::get('cart/incr/{id}/{qty}','ShopController@incre')->name('qty.incr');
Route::get('cart/decr/{id}/{qty}','ShopController@decre')->name('qty.decr');
Route::post('addtocart/{product}','ShopController@homeaddToCart')->name('add.cart.home');
Route::get('checkout','ShopController@index')->name('checkout');
Route::get('userproducts','ProductController@user')->name('userproducts');
Route::get('notifications','ShopController@notify')->name('notification');
