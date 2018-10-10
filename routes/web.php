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

<<<<<<< HEAD
Route::resource('invoice','InvoiceController');
=======
Route::get('/invoice', 'InvoiceController@generator')->name('generator');
>>>>>>> bc7334eec966df614c62002b6151306abf714128
