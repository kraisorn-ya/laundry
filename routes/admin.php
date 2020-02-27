<?php

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
],function (){
    Route::get('/home', 'Backend\AdminController@index')->name('index');
    Route::post('/login', 'Admin\LoginController@login');
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');
    Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Admin\RegisterController@register');
    Route::get('profile', 'Backend\AdminController@profile')->name('profile');
    Route::get('/edit', 'Backend\AdminController@edit')->name('edit');
    Route::post('{id}/update', 'Backend\AdminController@update')->name('update');
    Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Admin\ResetPasswordController@reset')->name('password.update');

    Route::group([
        'prefix' => 'employee',
        'as' => 'employee.'
    ], function (){
        Route::get('/index', 'Backend\EmployeeController@index')->name('index');
        Route::get('/create', 'Backend\EmployeeController@create')->name('create');
        Route::post('/create', 'Backend\EmployeeController@store')->name('store');
        Route::any('/search', 'Backend\EmployeeController@search')->name('search');
        Route::get('{id}/employee/edit', 'Backend\EmployeeController@edit')->name('edit');
        Route::post('{id}/employee/update', 'Backend\EmployeeController@update')->name('update');
        Route::delete('{id}/employee/delete', 'Backend\EmployeeController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'users',
        'as' => 'users.'
    ], function (){
        Route::get('/index', 'Backend\UserController@index')->name('index');
        Route::get('/create', 'Backend\UserController@create')->name('create');
        Route::post('/create', 'Backend\UserController@store')->name('store');
        Route::any('/search', 'Backend\UserController@search')->name('search');
        Route::get('{id}/users/edit', 'Backend\UserController@edit')->name('edit');
        Route::post('{id}/users/update', 'Backend\UserController@update')->name('update');
        Route::delete('{id}/users/delete', 'Backend\UserController@destroy')->name('delete');
    });
    Route::group([
        'prefix' => 'clothes',
        'as' => 'clothes.'
    ], function (){
        Route::get('/index', 'Backend\ClothesController@index')->name('index');
        Route::get('/create', 'Backend\ClothesController@create')->name('create');
        Route::post('/create', 'Backend\ClothesController@store')->name('store');
        Route::any('/search', 'Backend\ClothesController@search')->name('search');
        Route::get('{id}/clothes/edit', 'Backend\ClothesController@edit')->name('edit');
        Route::post('{id}/clothes/update', 'Backend\ClothesController@update')->name('update');
        Route::delete('{id}/clothes/delete', 'Backend\ClothesController@destroy')->name('delete');
    });
    Route::group([
        'prefix' => 'promotion',
        'as' => 'promotion.'
    ], function (){
//        Route::get('/index', 'Backend\PromotionController@getPromotion')->name('index');
        Route::get('/index', 'Backend\PromotionController@index')->name('index');
//        Route::post('/post', 'Backend\PromotionController@post')->name('post');
        Route::get('/create', 'Backend\PromotionController@create')->name('create');
        Route::post('/create', 'Backend\PromotionController@store')->name('store');
        Route::get('{id}/promotion/edit', 'Backend\PromotionController@edit')->name('edit');
        Route::put('{id}promotion/update', 'Backend\PromotionController@update')->name('update');
        Route::delete('{id}/promotion/delete', 'Backend\PromotionController@destroy')->name('delete');
    });
    Route::group([
        'prefix' => 'articles',
        'as' => 'articles.'
    ], function (){
        Route::get('/index', 'Backend\ArticlesController@index')->name('index');
        Route::get('/create', 'Backend\ArticlesController@create')->name('create');
        Route::post('/create', 'Backend\ArticlesController@store')->name('store');
        Route::get('{id}/articles/edit', 'Backend\ArticlesController@edit')->name('edit');
        Route::post('{id}/articles/update', 'Backend\ArticlesController@update')->name('update');
        Route::delete('{id}/articles/delete', 'Backend\ArticlesController@destroy')->name('delete');
        Route::post('/search', 'Backend\ArticlesController@search')->name('search');
    });
    Route::group([
        'prefix' => 'article-category',
        'as' => 'article-category.'
    ], function (){
        Route::get('/index', 'Backend\ArticlesCategoryController@index')->name('index');
        Route::get('/create', 'Backend\ArticlesCategoryController@create')->name('create');
        Route::post('/create', 'Backend\ArticlesCategoryController@store')->name('store');
        Route::get('{id}/article-category/edit', 'Backend\ArticlesCategoryController@edit')->name('edit');
        Route::post('{id}/article-category/update', 'Backend\ArticlesCategoryController@update')->name('update');
        Route::delete('{id}/article-category/delete', 'Backend\ArticlesCategoryController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'service-type',
        'as' => 'service-type.'
    ], function (){
        Route::get('/index', 'Backend\ServiceTypeController@index')->name('index');
        Route::get('/create', 'Backend\ServiceTypeController@create')->name('create');
        Route::post('/search', 'Backend\ServiceTypeController@search')->name('search');
        Route::post('/create', 'Backend\ServiceTypeController@store')->name('store');
        Route::get('{id}/service-type/edit', 'Backend\ServiceTypeController@edit')->name('edit');
        Route::post('{id}/service-type/update', 'Backend\ServiceTypeController@update')->name('update');
        Route::delete('{id}/service-type/delete', 'Backend\ServiceTypeController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'order',
        'as' => 'order.'
    ], function (){
        Route::get('index', 'Backend\OrderController@index')->name('index');
        Route::any('/search', 'Backend\OrderController@search')->name('search');
        Route::get('{id}/order/create', 'Backend\OrderController@create')->name('create');
        Route::post('{id}/confirm', 'Backend\OrderController@confirm')->name('confirm');
        Route::post('{id}/confirm/update', 'Backend\OrderController@update')->name('update');
        Route::get('{id}/order/detail', 'Backend\OrderController@detail')->name('detail');
        Route::delete('{id}/order/delete', 'Backend\OrderController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'order-status',
        'as' => 'order-status.'
    ], function (){
        Route::get('index', 'Backend\OrderStatusController@index')->name('index');
        Route::get('{id}/order-status/detail', 'Backend\OrderStatusController@detail')->name('detail');
        Route::get('{id}/order-status/pay', 'Backend\OrderStatusController@pay')->name('pay');
        Route::get('{id}/order-status/status', 'Backend\OrderStatusController@status')->name('status');
        Route::post('{id}/order-status/update', 'Backend\OrderStatusController@update')->name('update');
        Route::post('{id}/order-status/order-status', 'Backend\OrderStatusController@orderStatus')->name('orderStatus');
        Route::post('{id}/order-status/send-status', 'Backend\OrderStatusController@sendStatus')->name('sendStatus');
        Route::post('{id}/order-status/pay-status', 'Backend\OrderStatusController@payStatus')->name('payStatus');
        Route::delete('{id}/order-status/delete', 'Backend\OrderStatusController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'order-details',
        'as' => 'order-details.'
    ], function (){
        Route::get('/index', 'Backend\OrderDetailsController@index')->name('index');
        Route::any('/search', 'Backend\OrderDetailsController@search')->name('search');
        Route::post('{id}/details', 'Backend\OrderDetailsController@details')->name('details');
    });

    Route::group([
        'prefix' => 'order-details-daily',
        'as' => 'order-details-daily.'
    ], function (){
        Route::get('/index', 'Backend\OrderDetailsDailyController@index')->name('index');
        Route::any('/search', 'Backend\OrderDetailsDailyController@search')->name('search');
        Route::get('{id}/details', 'Backend\OrderDetailsDailyController@details')->name('details');
    });

    Route::group([
        'prefix' => 'package',
        'as' => 'package.'
    ], function (){
        Route::get('/index', 'Backend\PackageController@index')->name('index');
        Route::get('/create', 'Backend\PackageController@create')->name('create');
        Route::post('/create', 'Backend\PackageController@store')->name('store');
        Route::get('{id}/package/edit', 'Backend\PackageController@edit')->name('edit');
        Route::put('{id}/package/update', 'Backend\PackageController@update')->name('update');
        Route::delete('{id}/package/delete', 'Backend\PackageController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'confirm-package',
        'as' => 'confirm-package.'
    ], function (){
        Route::get('/index', 'Backend\ConfirmPackage\ConfirmPackageController@index')->name('index');
    });

    Route::group([
        'prefix' => 'deliver',
        'as' => 'deliver.'
    ], function (){
        Route::get('index', 'Backend\Deliver\DeliverController@index')->name('index');
        Route::any('/search', 'Backend\Deliver\DeliverController@search')->name('search');
        Route::get('{id}/deliver/create', 'Backend\Deliver\DeliverController@create')->name('create');
        Route::post('{id}/confirm', 'Backend\Deliver\DeliverController@confirm')->name('confirm');
        Route::post('{id}/confirm/update', 'Backend\Deliver\DeliverController@update')->name('update');
        Route::get('{id}/deliver/detail', 'Backend\Deliver\DeliverController@detail')->name('detail');
        Route::delete('{id}/deliver/delete', 'Backend\Deliver\DeliverController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'manage-status',
        'as' => 'manage-status.'
    ], function (){
        Route::get('index', 'Backend\Manage\ManageOrderStatusController@index')->name('index');
        Route::get('{id}details', 'Backend\Manage\ManageOrderStatusController@details')->name('details');
        Route::get('{id}/manage-status/pay', 'Backend\Manage\ManageOrderStatusController@pay')->name('pay');
        Route::get('{id}/manage-status/status', 'Backend\Manage\ManageOrderStatusController@status')->name('status');
        Route::post('{id}/manage-status/update', 'Backend\Manage\ManageOrderStatusController@update')->name('update');
        Route::post('{id}/manage-status/order-status', 'Backend\Manage\ManageOrderStatusController@orderStatus')->name('orderStatus');
        Route::post('{id}/manage-status/deliver', 'Backend\Manage\ManageOrderStatusController@deliverStatus')->name('deliverStatus');
        Route::post('{id}/manage-status/send-status', 'Backend\Manage\ManageOrderStatusController@sendStatus')->name('sendStatus');
        Route::post('{id}/manage-status/pay-status', 'Backend\Manage\ManageOrderStatusController@payStatus')->name('payStatus');
        Route::delete('{id}/manage-status/delete', 'Backend\Manage\ManageOrderStatusController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'order-success',
        'as' => 'order-success.'
    ], function (){
        Route::get('index', 'Backend\Manage\OrderSuccessController@index')->name('index');
        Route::get('{id}details', 'Backend\Manage\OrderSuccessController@details')->name('details');
        Route::get('{id}customer', 'Backend\Manage\OrderSuccessController@dataCustomer')->name('dataCustomer');
        Route::get('{id}/manage-status/pay', 'Backend\Manage\OrderSuccessController@pay')->name('pay');
        Route::post('{id}/manage-status/order-status', 'Backend\Manage\OrderSuccessController@orderStatus')->name('orderStatus');
    });

    Route::group([
        'prefix' => 'confirm-order',
        'as' => 'confirm-order.'
    ], function (){
        Route::get('index', 'Backend\Deliver\ConfirmOrderController@index')->name('index');
        Route::get('{id}confirm', 'Backend\Deliver\ConfirmOrderController@confirm')->name('confirm');
        Route::put('edit', 'Backend\Deliver\ConfirmOrderController@edit')->name('edit');
        Route::delete('{id}confirm/delete', 'Backend\Deliver\ConfirmOrderController@destroy')->name('delete');
    });
});


Route::get('/admin/service', function () {
    return view('admin.show.service');
});

Route::get('/admin/test', function () {
    return view('admin.show.admin');
});

//Route::get('/login', function () {
////    return view('admin.login.login');
////});
