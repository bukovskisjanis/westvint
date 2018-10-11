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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('darbinieki','DarbiniekiController');

Route::resource('client','ClientController');

Route::resource('product','ProductController');

Route::resource('invoice','InvoiceController');

Route::get('/gen/invoice', 'InvoiceController@generator')->name('generator');

