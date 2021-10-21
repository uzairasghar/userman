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
Route::get('/home', 'PagesController@index');
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::group(['middleware' => ['auth','si']], function () {
    Route::resource('products', 'UsermanController');
});

// Route::resource('products', 'UsermanController');
Route::resource('users', 'UsersController');
Route::post('register', 'Auth\RegisterController@save');

Auth::routes();