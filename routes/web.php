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
Route::get('/basket', 'PagesController@basket');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@index');
Route::get('profile', 'PagesController@profile');
Route::post('profile/update', 'UserController@update');
Route::post('/profile', 'UserController@profileImage');
Route::get('/register', 'RegisterController@getSignup');
Route::post('/register', 'RegisterController@postSignup');
Route::get('category/{id?}', 'CategoriesController@show');
Route::get('/sale', 'ProductsController@sale');
Route::get('product/edit/{id}', 'ProductsController@edit');
Route::get('product/add', 'ProductsController@create');
Route::post('category', 'ProductsController@store');
Route::post('product/update/{id}', 'ProductsController@update');
Route::get('product/delete/{id}', 'ProductsController@destroy');
Route::get('product-details/{id}', 'PagesController@product');
Route::get( 'fav/{id}','UserController@favourites');
Route::get( 'basket/{id}','UserController@basket');
Route::get('basket/delete/{id}', 'UserController@destroyFromBasket');
Route::get('favourites/delete/{id}', 'UserController@destroyFromFavourites');
Route::get('/search/{c?}/{sort?}', 'CategoriesController@search');


Auth::routes();

Route::get('/home', 'HomeController@index');
