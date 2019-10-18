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
Route::get('/users/{user}/orders', 'OrdersController@index')->name('order.index');
Route::get('/admin/orders', 'OrdersController@admin')->name('order.admin');
Route::post('/orders/{order}', 'OrdersController@update')->name('order.update');
Route::post('/notification/read', 'NotificationController@read')->name('notification.read');
