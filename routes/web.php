<?php

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

Route::get('/', 'DishesController@index')->name('index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@edit')->name('profile');
Route::post('/profile_update/{id}', 'ProfileController@update')->name('profile_update');
Route::get('/index', 'DishesController@index')->name('index');
Route::get('/editDish/{id}', 'DishesController@edit')->name('dish_edit');
Route::get('/createDish', 'DishesController@create')->name('dish_create');
Route::post('/storeDish', 'DishesController@store')->name('dish_store');
Route::post('/addToCart', 'CartController@store')->name('addToCart');
Route::get('/deleteDish/{id}', 'DishesController@destroy')->name('destroy');
Route::post('/updateDish/{id}', 'DishesController@update')->name('dish_update');
Route::get('/cart', 'CartController@show')->name('cart_show');
Route::get('/cartItem_destroy/{id}', 'CartController@destroy')->name('cartItem_destroy');
// Route::post('/cart', 'CartController@store')->name('checkout');
Route::post('/order', 'OrderController@store')->name('order');
Route::get('/orders_show', 'OrderController@show')->name('orders_show');
