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

    Route::group(['prefix' => 'sendAddress'], function () {
        Route::get('/', 'SendAddressController@view')->name('sendAddress');
        Route::post('/', 'SendAddressController@add')->name('AddSendAddress');
        Route::post('/{id}', 'SendAddressController@update')->name('editSendAddress');
        Route::get('/{id}/remove', 'SendAddressController@remove')->name('removeSendAddress');
    });

    Route::get('payment', 'PaymentController@view')->name('payment');

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', 'CartController@view')->name('viewCart');
        Route::post('/update', 'CartController@updateCart')->name('updateCart');
        Route::get('/clear', 'CartController@clearCart')->name('clearCart');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'OrderController@view')->name('viewOrder');
        Route::get('/{id}', 'OrderController@viewDetail')->name('viewOrderDetail');
        Route::post('/', 'OrderController@store')->name('storeOrder');
    });
});
Route::get('product', 'Customer\ProductController@view');


Route::get('aboutme', 'Customer\AboutController@view')->name('aboutme');
Route::get('contact', 'Customer\ContactController@view')->name('contact');


# Apanel 
Route::group(['prefix' => 'apanel', 'namespace' => 'Apanel'], function () {
    Route::get('/', function () {
        return view('apanel.home');
    });

    Route::get('product', 'ProductController@view')->name('product');
    Route::get('detailProduct', 'ProductController@viewDetail')->name('detailProduct');



    Route::get('material', 'MaterialController@view')->name('viewMaterial');


    Route::get('checkPayMent', 'CheckPayMentController@view')->name('viewCheckPayment');
    Route::get('detailCheckPayMent', 'CheckPayMentController@viewDetail')->name('detailCheckPayMent');


    Route::get('product', 'ProductController@view')->name('viewProduct');
    // Route::group(['prefix' => 'checkPayMent'], function () {
    //     Route::get('/','CheckPayMentController@view')->name('checkPayMent');
    //     Route::get('/{id}','CheckPayMentController@viewDetail')->name('detailCheckPayMent');
    // });


    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@view')->name('viewUser');
        Route::get('/{id}', 'UserController@viewDetail')->name('detailUser');
    });
});
