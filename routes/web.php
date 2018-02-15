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
Route::get('/reservate', 'ReservationController@create')->name('reservate');
Route::post('/storeReservation', 'ReservationController@store')->name('reservation_store');
Route::get('/showReservation', 'ReservationController@show')->name('reservation_show');
Route::get('/reservation_destroy/{id}', 'ReservationController@destroy')->name('reservation_destroy');

Route::get('/order2', 'OrderController@index');

Route::get('/payment_success', 'OrderController@paymentSuccess');
Route::get('/payment_cancel', 'OrderController@paymentCancel');
