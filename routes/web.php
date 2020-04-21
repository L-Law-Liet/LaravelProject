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

Route::get('/home', 'PagesController@home');
Route::get('/news', 'PagesController@news');
Route::get('/category', 'PagesController@category');
Route::get('/favourites', 'PagesController@favourites');
Route::get('/basket', 'PagesController@basket');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@checkLogin');
Route::get('/signup', 'AuthController@getSignup')->name('signup');
Route::post('/signup', 'AuthController@postSignup');
Route::resource('/products', 'CategoriesController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
