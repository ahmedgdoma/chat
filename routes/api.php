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

Route::group(['middleware' => ['api']], function () {
    Route::post('auth/login', 'ApiController@login');
    Route::post('auth/register', 'ApiController@register');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('auth/logout', 'ApiController@logout');
        Route::get('user', 'ApiController@getAuthUser');
        Route::post('sendMessage', 'MessageController@sendMessage');
        Route::get('userChats', 'MessageController@userChats');
        Route::get('ViewChat/{id}', 'MessageController@ViewChat');
        Route::get('viewUsers', 'UsersController@viewUsers');
    });
});
