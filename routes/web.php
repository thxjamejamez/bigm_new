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
    return view('customer.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'namespace' => 'Customer'], function () {
    Route::get('profile/edit', 'ProfileController@view')->name('editprofile');
    Route::post('profile/edit', 'ProfileController@edit')->name('editprofile');
    Route::get('sendAddress', 'SendAddressController@view')->name('sendAddress');
});
Route::get('product', 'Customer\ProductController@view');
Route::get('cart', 'Customer\CartController@view')->name('cart');

Route::get('aboutme', 'Customer\AboutController@view')->name('aboutme');
Route::get('contact', 'Customer\ContactController@view')->name('contact');

Route::group(['prefix' => 'apanel', 'namespace' => 'Apanel'], function () {
    Route::get('/', function () {
        return view('apanel.home');
    });

    
});