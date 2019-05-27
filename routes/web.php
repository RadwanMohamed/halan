<?php

Route::get('/adminpanel/logout',"Admin\Auth\LoginController@logout");

Route::get('/login',"Admin\Auth\LoginController@showLoginForm");
Route::get('adminpanel/login',"Auth\LoginController@showLoginForm");

Route::post('adminpanel/login',"Admin\Auth\LoginController@login");
Route::get('/docs',function (){
    return view('welcome');
});
Route::group(['middleware'=>['admin','web']],function () {

    Route::post('/adminpanel/users/{user}/block', 'Admin\User\UserController@block');
    Route::post('/adminpanel/users/{user}/activate', 'Admin\User\UserController@activate');
    Route::resource('/adminpanel/users', 'Admin\User\UserController');


    Route::resource('/adminpanel/reports', 'Admin\Report\ReportController');


    Route::resource('/adminpanel/cutterkinds', 'Admin\CutterKind\CutterKindController');
    Route::resource('/adminpanel/cuttersize', 'Admin\CutterSize\CutterSizeController');


    Route::resource('/adminpanel/categories', 'Admin\Category\CategoryController');


    Route::resource('/adminpanel/products', 'Admin\Product\ProductController');


    Route::resource('/adminpanel/orders', 'Admin\Order\OrderController');


    Route::resource('/adminpanel/requests', 'Admin\Request\RequestController');
    Route::get('/adminpanel/requests/{request}/orders', 'Admin\Request\RequestController@show');


    Route::post('/adminpanel/promotions/{promotion}/deactivate', 'Admin\Promotion\PromotionController@deactivate');
    Route::post('/adminpanel/promotions/{promotion}/activate', 'Admin\Promotion\PromotionController@activate');
    Route::resource('/adminpanel/promotions', 'Admin\Promotion\PromotionController');


    Route::resource('/adminpanel/branches', 'Admin\Branch\BranchController');

    Route::resource('/adminpanel/settings', 'Admin\Setting\SettingController');

    Route::get('/', 'HomeController@index');


    Route::get('/home', 'HomeController@index')->name('home');

});
