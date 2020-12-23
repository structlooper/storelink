<?php

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


Route::get('404','App\Http\Controllers\IndexController@error_not')->name('404_error');
Route::group(['namespace' => 'App\Http\Controllers'],function(){
    Route::get('/','IndexController@index')->name('home');
    Route::post('ipa/user','IndexController@login')->name('login');
    Route::post('ipa/logout','IndexController@logout')->name('logout');


    ///byManish
    Route::get('shop-main/{slug}','ShopController@categorym')->name('shop_main');
     Route::get('shop/{slug}','ShopController@category')->name('shop');
     Route::get('brands/{slug}','ShopController@brands')->name('brands');
     Route::get('bycategory','ShopController@bycat');
    Route::get('single/{slug}','ShopController@detail')->name('detail');
    // Route::post('ajaxdata','ShopController@ajaxD')->name('ajaxdata');

    Route::get('privacy_Policy','IndexController@privacy_Policy')->name('privacy_Policy');
    //end



    Route::group(['middleware' => 'checkUser','prefix' => 'user'],function(){
        Route::get('profile','UserController@profile')->name('profile');
        Route::get('address','UserController@address')->name('address');
        Route::get('address/add','UserController@add_address')->name('add_address');
        Route::get('address/edit/{id}','UserController@update_address')->name('address_edit');
        Route::get('checkout','UserController@checkout')->name('checkout');
        Route::get('orders','UserController@orders')->name('orders');
        Route::post('orders/details','UserController@order_details')->name('order_details');

    });
});
