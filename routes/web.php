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
Route::get('/register', 'RegisterController@getSignup');
Route::post('/register', 'RegisterController@postSignup');
Route::get('category/{id?}', 'CategoriesController@show');
Route::get('product/{id}', 'ProductsController@edit');
Route::get('product/delete/{id}', 'ProductsController@destroy');
Route::get('product/{product}', 'ProductsController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');
