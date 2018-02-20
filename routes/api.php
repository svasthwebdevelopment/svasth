<?php

use Illuminate\Http\Request;

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


 Route::post('register','Api\Auth\RegisterController@register');
Route::post('login','Api\Auth\LoginController@login');
Route::post('refresh','Api\Auth\LoginController@refresh');
Route::post('sendotp','Api\Auth\RegisterController@sendOTP');
Route::post('checkOTP','Api\Auth\RegisterController@checkOTP');
Route::middleware('auth:api')->group(function () {
    
    Route::post('logout','Api\Auth\LoginController@logout');
});

 Route::get('products','Api\ProductController@index');
 Route::get('chart','Api\ChartController@index');
 Route::get('appstatus','Api\AppStatusController@index');
 Route::get('area','Api\AreaController@index');
 Route::get('getuserdetails','Api\UserController@index');