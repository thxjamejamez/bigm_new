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

# Customer Page
Route::group(['middleware' => 'auth', 'namespace' => 'Customer'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('edit', 'ProfileController@view')->name('editprofile');
        Route::post('edit', 'ProfileController@edit')->name('editprofile');
    });

    Route::group(['prefix' => 'sendAddress'], function () {
        Route::get('/', 'SendAddressController@view')->name('sendAddress');
        Route::post('/', 'SendAddressController@add')->name('AddSendAddress');
        Route::post('/{id}', 'SendAddressController@update')->name('editSendAddress');
        Route::get('/{id}/remove', 'SendAddressController@remove')->name('removeSendAddress');
        Route::get('/{id}/edit', 'SendAddressController@edit')->name('editdefaultAddress');
    });

    Route::group(['prefix' => 'quotation'], function () {
        Route::get('/', 'QuotationController@view')->name('viewQuotation');
        Route::get('/add/{type}', 'QuotationController@viewAdd')->name('viewAddQuotation');
        Route::get('/{id}', 'QuotationController@viewDetail')->name('viewDetail');
    });



    Route::group(['prefix' => 'payment'], function () {
        Route::get('/', 'PaymentController@view')->name('payment');
        Route::post('/', 'PaymentController@store')->name('storePayment');
        Route::get('/viewReceipt', 'PaymentController@viewReceipt')->name('viewReceipt');
    });


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


    Route::post('storeProductCustomer', 'ProductController@store')->name('storeProductCustomer');
    
    Route::get('appointmentView', 'AppointmentController@viewDetail')->name('appointmentView');
});

Route::get('product', 'Customer\ProductController@view')->name('viewProductCust');


Route::get('aboutme', 'Customer\AboutController@view')->name('aboutme');
Route::get('contact', 'Customer\ContactController@view')->name('contact');
Route::get('customProduct', 'Customer\ProductController@customProduct')->name('customProduct');


# Apanel 
Route::group(['prefix' => 'apanel', 'namespace' => 'Apanel'], function () {
    Route::get('/', function () {
        return view('apanel.home');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@view')->name('viewUser');
        Route::get('/{id}', 'UserController@viewDetail')->name('detailUser');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@view')->name('viewProduct');
        Route::get('/{id}', 'ProductController@viewDetail')->name('detailProduct');
        Route::post('/', 'ProductController@store')->name('storeProduct');
        Route::get('/{id}/remove', 'ProductController@inactiveProduct')->name('removeProduct');
    });

    Route::group(['prefix' => 'material'], function () {
        Route::get('/', 'MaterialController@view')->name('viewMaterial');
        Route::post('/', 'MaterialController@store')->name('storeMaterial');
        Route::get('/{id}/remove', 'MaterialController@inactiveMaterial')->name('removeMaterial');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'OrderController@view')->name('Order');
        Route::get('/{id}', 'OrderController@viewDtail')->name('OrderDetail');
    });

    Route::group(['prefix' => 'checkPayMent'], function () {
        Route::get('/', 'CheckPayMentController@view')->name('viewCheckPayment');
        Route::get('/{id}', 'CheckPayMentController@viewDetail')->name('detailCheckPayMent');
    });


    Route::group(['prefix' => 'quotations'], function () {

        Route::get('/', 'QuotationsController@view')->name('quotations');
        Route::get('/{id}', 'QuotationsController@viewDetail')->name('quotationsDetail');

        // Route::get('/', 'CheckPayMentController@view')->name('viewCheckPayment');
        // Route::get('/{id}', 'CheckPayMentController@viewDetail')->name('detailCheckPayMent');
    });


    
    Route::group(['prefix' => 'payQuotations'], function () {

        Route::get('/', 'PayQuotationController@view')->name('payQuotations');
        Route::get('/{id}', 'PayQuotationController@viewDetail')->name('payQuotationsDetail');

        // Route::get('/', 'CheckPayMentController@view')->name('viewCheckPayment');
        // Route::get('/{id}', 'CheckPayMentController@viewDetail')->name('detailCheckPayMent');
    });


  

});
