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

Route::get('/', 'WebController@index');
Route::resource('teams','TeamRegisterController');
Auth::routes(['verify' => true]);
Route::post('products/{product}/reviews', 'ReviewController@store');
Route::get('products/{product}/favorite', 'ProductController@favorite')->name('products.favorite');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/mypage', 'UserController@mypage')->name('mypage');
Route::get('users/mypage/favorite', 'UserController@favorite')->name('mypage.favorite');
Route::get('users/mypage/edit', 'UserController@edit')->name('mypage.edit');
Route::put('users/mypage', 'UserController@update')->name('mypage.update');
Route::get('users/mypage/password/edit', 'UserController@edit_password')->name('mypage.edit_password');
Route::put('users/mypage/password', 'UserController@update_password')->name('mypage.update_password');
if (env('APP_ENV') === 'production') {
         URL::forceScheme('https');
     }
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
