<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'list', 'namespace' => 'API'], function () {
    Route::get('province', 'ListController@GetProvinceList');
    Route::get('amphure/{province_id}', 'ListController@GetAmphureList');
    Route::get('district/{amphure_id}', 'ListController@GetDistrictList');
});

Route::get('sendaddress/{id}', 'Customer\SendAddressController@viewDetail');