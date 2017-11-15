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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//login/logout
Route::get('admin', 'PageController@getLogin');
Route::post('admin', 'PageController@postLogin')->name('login');
Route::post('logout', 'PageController@postLogout')->name('logout');

//
Route::group(['prefix' => 'admin', 'middleware' => 'login'], function () {
    Route::resource('promotion', 'PromotionController')->middleware('manager');
    Route::resource('roomtype', 'RoomTypeController')->middleware('manager');
    Route::resource('room', 'RoomController')->middleware('manager');
    Route::resource('booking', 'BookingController')->middleware('sale');
    Route::get('statistic-revenue', 'StatisticController@getStatisticRevenue')->middleware('manager');
    Route::get('statistic-room', 'StatisticController@getStatisticRoom')->middleware('sale');
    Route::resource('service', 'ServiceController')->middleware('manager');
    Route::resource('user', 'UserController')->middleware('admin');
    Route::resource('image', 'ImageController')->middleware('manager');
    Route::resource('comment', 'CommentController')->middleware('manager');
});
