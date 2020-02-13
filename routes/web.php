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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/index', function () {
    return view('index');
});
Route::get('/index2', function () {
    return view('index2');
});
Route::get('/index3', function () {
    return view('index3');
});

Route::get('/index4/articles', 'Frontend\FrontEndController@articles')->name('articles');



//});
Route::group([
    'prefix' => 'laundry',
    'as' => 'laundry.'
], function (){
    Route::get('/', 'Frontend\FrontEndController@index')->name('index');
//    Route::get('{id}/content', 'Frontend\FrontEndController@content')->name('content');

    Route::group([
        'prefix' => 'articles',
        'as' => 'articles.'
    ], function (){
        Route::get('{name?}', 'Frontend\ArticlesController@index')->name('index');
        Route::get('{id}/content', 'Frontend\ArticlesController@content')->name('content');
    });

    Route::group([
        'prefix' => 'contact-us',
        'as' => 'contact-us.'
    ], function (){
        Route::get('/', 'Frontend\ContactUsController@index')->name('index');
    });

    Route::group([
        'prefix' => 'service-charge',
        'as' => 'service-charge.'
    ], function (){
        Route::get('/', 'Frontend\ServiceChargeController@index')->name('index');
        Route::get('/index2', 'Frontend\ServiceChargeController@index2')->name('index2');
    });

//    Route::group([
//        'prefix' => 'promotion',
//        'as' => 'promotion.'
//    ], function (){
//        Route::get('/index', 'BackendUser\BackendUserController@index')->name('index');
//        Route::post('{id}/update', 'BackendUser\BackendUserController@update')->name('update');
//    });
});

Route::group([
    'prefix' => 'users',
    'as' => 'users.'
], function (){
    Route::get('/profile', 'BackendUser\BackendUserController@profile')->name('profile');
    Route::get('/edit', 'BackendUser\BackendUserController@edit')->name('edit');
    Route::post('{id}/update', 'BackendUser\BackendUserController@update')->name('update');

    Route::group([
        'prefix' => 'service',
        'as' => 'service.'
    ], function (){
        Route::get('/', 'BackendUser\ServiceController@index')->name('index');
    });

    Route::group([
        'prefix' => 'package',
        'as' => 'package.'
    ], function (){
        Route::get('/', 'BackendUser\PackageController@index')->name('index');
        Route::post('/package', 'BackendUser\PackageController@buy')->name('buy');

    });

    Route::group([
        'prefix' => 'order',
        'as' => 'order.'
    ], function (){
        Route::get('/', 'BackendUser\OrderController@index')->name('index');
        Route::post('/order', 'BackendUser\OrderController@post')->name('post');
        Route::get('/service', 'BackendUser\OrderController@service')->name('service');
        Route::post('/confirm', 'BackendUser\OrderController@confirm')->name('confirm');
        Route::post('/confirm/store', 'BackendUser\OrderController@store')->name('store');
    });

    Route::group([
        'prefix' => 'order-details',
        'as' => 'order-details.'
    ], function (){
        Route::get('/index', 'BackendUser\OrderDetailsController@index')->name('index');
        Route::get('{id}/details', 'BackendUser\OrderDetailsController@details')->name('details');
        Route::get('{id}/pay', 'BackendUser\OrderDetailsController@pay')->name('pay');
        Route::post('{id}/update', 'BackendUser\OrderDetailsController@update')->name('update');

    });
    Route::group([
        'prefix' => 'all-order-details',
        'as' => 'all-order-details.'
    ], function (){
        Route::get('/index', 'BackendUser\AllOrderDetailsController@index')->name('index');
        Route::get('{id}/details', 'BackendUser\AllOrderDetailsController@details')->name('details');
        Route::any('/search', 'BackendUser\AllOrderDetailsController@search')->name('search');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
