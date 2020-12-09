<?php

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

Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/news', 'PagesController@news');
Route::get('/favourites', 'PagesController@favourites');
Route::get('/basket', 'PagesController@basket')->name('basket');
Route::get('/checkout', 'PagesController@showCheckout')->name('checkout.show');
Route::post('/checkout', 'PagesController@doCheckout')->name('checkout.do');
Route::get('/success', 'PagesController@showSuccess')->name('success');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@index');
Route::get('profile', 'PagesController@profile');
Route::put('profile/update', 'UserController@update');
Route::put( '/profile', 'UserController@profileImage');
Route::get('category/{id?}', 'CategoriesController@show');
Route::get('/sale', 'ProductsController@sale');
Route::get('product/edit/{id}', 'ProductsController@edit')->name('product-update');
Route::get('product/add', 'ProductsController@create');
Route::post('category', 'ProductsController@store');
Route::put('product/update/{id}', 'ProductsController@update');
Route::delete('product/delete/{id}', 'ProductsController@destroy');
Route::get('product-details/{id}', 'PagesController@product');
Route::get( 'fav/{id}','UserController@favourites');
Route::get( 'basket/{id}','UserController@basket');
Route::delete('basket/delete/{id}', 'UserController@destroyFromBasket');
Route::delete('favourites/delete/{id}', 'UserController@destroyFromFavourites');
Route::get('/search/{c?}/{sort?}', 'CategoriesController@search');
Route::get('/feedback/{pid}', 'FeedbackController@create');

Auth::routes();

Route::get('/home', 'HomeController@index');
