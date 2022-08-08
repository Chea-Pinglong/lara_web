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



Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/', function () {
    return view('homepage');
});

Route::get('product', function () {
    return view('product/product');
});

Route::get('product1', function () {
    return view('product/product1');
});

Route::get('product2', function () {
    return view('product/product2');
});

Route::get('product3', function () {
    return view('product/product3');
});

Route::get('product4', function () {
    return view('product/product4');
});

Route::group(['middleware'=>['web']], function(){
    Route::resource('store', 'StoreController');
    Route::get('/', function () {
        return view('homepage');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

