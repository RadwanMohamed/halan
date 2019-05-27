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

Route::group(['middleware'=>['api']],function(){

    Route::post('login', 'Auth\LoginController@login');

    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('/users/store','Api\User\UserController@store');
    Route::get('/target','Api\HomeController@targetCity');
    Route::get('/settings',"Api\Setting\SettingController@index");

    // beginning users routes

    Route::post('/password/email','Api\User\UserController@send');





    Route::post('users/store','Api\User\UserController@store');
    Route::resource('users','Api\User\UserController')->except(['edit','create']);

    //beginning cars route
    Route::resource('cars','Api\Car\CarController')->only(['index','show']);

    //beginning client routes
    Route::resource('clients.orders','Api\Client\ClientOrderController');
    Route::resource('orders.clients','Api\Order\OrderClientController');

    //Order routes
    Route::resource('orders','Api\Order\OrderController');
    Route::resource('orders.driver','Api\Order\OrderDriverController');

    Route::post("/driver/action","Api\Order\OrderClientController@orderAction");



    Route::put('/password/reset','Api\User\UserController@updatePassword');
    Route::post('/message','Api\Contact\ContactController@send');



});
