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

Auth::routes();

Route::get('/dashboard/login', 'App\Http\Controllers\Auth\adminController@login')->middleware('guest:admin');
Route::post('/dashboard/login', 'App\Http\Controllers\Auth\adminController@dologin')->name('admin.login');

Route::group(['prefix'=>'/dashboard','middleware'=>'auth:admin','namespace' => 'App\Http\Controllers\admin'],function(){
    Route::get('/', 'userController@index')->name('admin.users');
    Route::get('/delete/{id}','userController@delete')->name('admin.user.delete');
    Route::group(['prefix'=>'/category'],function(){
        Route::get('/', 'categoryController@index')->name('admin.category');
        Route::get('/create','categoryController@create')->name('admin.categories.create');
        Route::post('/category/store','categoryController@store')->name('admin.categories.store');
        Route::get('/category/edit/{id}','categoryController@edit')->name('admin.categories.edit');
        Route::post('/category/update','categoryController@update')->name('admin.categories.update');
        Route::get('/category/delete/{id}','categoryController@delete')->name('admin.categories.delete');
    });
    Route::group(['prefix'=>'/product'],function(){
        Route::get('/', 'productController@index')->name('admin.product');
        Route::get('/create','productController@create')->name('admin.product.create');
        Route::post('/store','productController@store')->name('admin.product.store');
        Route::get('/edit/{id}','productController@edit')->name('admin.product.edit');
        Route::post('/update','productController@update')->name('admin.product.update');
        Route::get('/delete/{id}','productController@delete')->name('admin.product.delete');
    });

    Route::group(['prefix'=>'/orders'],function(){
        Route::get('/', 'ordersController@index')->name('admin.orders');
        Route::get('/shippedOrder/{id}','ordersController@shippedOrder')->name('admin.orders.shippedOrder');
        Route::get('/processingOrder/{id}','ordersController@processingOrder')->name('admin.orders.processingOrder');
        Route::get('/orderDetails/{id}','ordersController@orderDetails')->name('admin.order.details');
        // Route::post('/update','ordersController@update')->name('admin.product.update');
        Route::get('/delete/{id}','ordersController@delete')->name('admin.order.delete');
    });

});
