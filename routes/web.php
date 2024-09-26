<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user ;

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


Route::get('/home', [App\Http\Controllers\user\homeController::class, 'index'])->name('home');

Route::group(['prefix'=>'/','middleware'=>'auth','namespace' => 'App\Http\Controllers\user'],function(){
    Route::get('/', 'homeController@index')->name('user.index');
    Route::group(['prefix'=>'/cart'],function(){
        Route::get('/','cartController@showCart')->name('cart.show');
        Route::get('/addToCart/{product}','cartController@addToCart')->name('cart.add');
        Route::get('/removeToCart/{product}','cartController@removeToCart')->name('cart.remove');
        Route::get('/increaseItemToCart/{product}','cartController@increaseItemToCart')->name('cart.increaseItem');
        Route::get('/decreaseItemToCart/{product}','cartController@decreaseItemToCart')->name('cart.decreaseItem');
        Route::post('/addItemInfoToCart','cartController@addNewToCart')->name('cart.addItemInfoToCart');
    });

    Route::group(['prefix'=>'/shop'],function(){
        Route::get('/','shopController@getAllProduct')->name('shop.show');
        Route::get('/category/{CategorId}/shop','shopController@getProductOfCategory')->name('shop.category.product');
        Route::post('/filter','shopFilterController@filterdata')->name('filter');
    });

    Route::group(['prefix'=>'/shopDetails'],function(){
        Route::get('/{id}','shopDetailsController@shopDetails')->name('shop.shopDetails');
    });

    Route::group(['prefix'=>'/orders'],function(){
        Route::get('/','orderController@orders')->name('shop.orders');
        Route::get('/orderDetails/{id}','orderController@orderDetails')->name('order.details');
    });

    Route::group(['prefix'=>'/Favorite'],function(){
        Route::get('/','favoriteController@showFavorite')->name('show.Favorite');
        Route::get('/addToFavorite/{product}','favoriteController@addToFavorite')->name('Favorite.addToFavorite');
        Route::get('/removeToFavorite/{product}','favoriteController@removeToFavorite')->name('Favorite.removeToFavorite');
    });

    Route::group(['prefix'=>'/contact us'],function(){
        Route::get('/','contactController@showContact')->name('show.contact_us');
        Route::post('/send message','contactController@sendMessage')->name('contact.sendMessage');
        Route::post('/newsletter','contactController@newsletter')->name('send.newsletter');
    });
});

///////////////////////////////////////////////
Route::get('/checkout','App\Http\Controllers\user\checkoutController@getCheckoutPage')->name('checkout.show');
Route::post('/pay','App\Http\Controllers\FatoorahController@pay')->name('cart.pay');
Route::get('/call_back','App\Http\Controllers\FatoorahController@callback')->name('pay.callBack');

//////////////////////////////////////////////////////////////////

Route::post('/search', [App\Http\Controllers\user\shopController::class, 'search'])->name('search');


