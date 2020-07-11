<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//http:127.0.0.1:8000/api/v1/autocine
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'autocine'], function () {
        //Auth
        Route::group([
            'middleware' => 'api',
            'prefix' => 'auth'
        ], function ($router) {
            Route::post('register', 'AuthController@register');
            Route::post('login', 'AuthController@login');
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('me', 'AuthController@me');
        });
        
        Route::get('/MovieController@index');
    });
});
