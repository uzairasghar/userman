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

Route::get('home', 'PagesController@index')->name('home');
Route::get('/', 'PagesController@index')->name('index');
Route::get('about', 'PagesController@about')->name('about');
Route::get('services', 'PagesController@services')->name('services');

Route::group(['middleware' => ['auth','si']], function () {
    Route::get('products', 'UsermanController@index')->name('products');
    Route::get('products/create', 'UsermanController@create')->name('productcreate');
    Route::post('products', 'UsermanController@store')->name('productstore');
    Route::get('/products/{id}', 'UsermanController@show')->name('productshow');
    Route::get('/products/{id}/edit', 'UsermanController@edit')->name('productedit');
    Route::put('/products/update', 'UsermanController@update')->name('productupdate');
    Route::delete('products/{id}', 'UsermanController@destroy')->name('productdestroy');
});

Route::resource('users', 'UsersController');
Route::post('register', 'Auth\RegisterController@save');
Route::get('export', 'UsermanController@export')->name('export');

Auth::routes();

// Route::group(['middleware' => ['auth','si']], function () {
//     Route::resource('products', 'UsermanController', [
//         'name' => [
//             'products.index' => 'products',
//         ]
//     ]);
// });