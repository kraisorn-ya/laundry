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
        Route::post('/create', 'Backend\ServiceTypeController@store')->name('store');
        Route::get('{id}/service-type/edit', 'Backend\ServiceTypeController@edit')->name('edit');
        Route::post('{id}/service-type/update', 'Backend\ServiceTypeController@update')->name('update');
        Route::delete('{id}/service-type/delete', 'Backend\ServiceTypeController@destroy')->name('delete');
    });
});


Route::get('/admin/service', function () {
    return view('admin.show.service');
});

Route::get('/admin/test', function () {
    return view('admin.show.test');
});

//Route::get('/login', function () {
////    return view('admin.login.login');
////});