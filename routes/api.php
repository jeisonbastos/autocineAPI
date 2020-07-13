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
            'prefix' => 'auth'
        ], function ($router) {
            Route::post('register', 'AuthController@register');
            Route::post('login', 'AuthController@login');
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('me', 'AuthController@me');
        });


        //pelicula
        Route::group([
            'prefix' => 'pelicula'
        ], function () {
            Route::get('', 'MovieController@index');
            Route::get('all', 'MovieController@all');
            Route::get('/{id}', 'MovieController@show');
        });

        //clasificaciones
        Route::group([
            'prefix' => 'clasificacion'
        ], function () {
            Route::get('', 'ClassificationController@index');
            Route::get('all', 'ClassificationController@all');
            Route::get('/{id}', 'ClassificationController@show');
        });

        //generos
        Route::group([
            'prefix' => 'genero'
        ], function () {
            Route::get('', 'GenderController@index');
            Route::get('all', 'GenderController@all');
            Route::get('/{id}', 'GenderController@show');
        });

        //ubicacion
        Route::group([
            'prefix' => 'ubicacion'
        ], function () {
            Route::get('', 'LocationController@index');
            Route::get('all', 'LocationController@all');
            Route::get('/{id}', 'LocationController@show');
            Route::get('provincia/{provincia}', 'LocationController@show_for_provincia');
        });

        //clasificacion de productos
        Route::group([
            'prefix' => 'clasificacion producto'
        ], function () {
            Route::get('', 'ProductClassificationController@index');
            Route::get('all', 'ProductClassificationController@all');
            Route::get('/{id}', 'ProductClassificationController@show');
        });

        //tipos de productos
        Route::group([
            'prefix' => 'tipo producto'
        ], function () {
            Route::get('', 'ProductTypeController@index');
            Route::get('all', 'ProductTypeController@all');
            Route::get('/{id}', 'ProductTypeController@show');
        });

        //productos
        Route::group([
            'prefix' => 'producto'
        ], function () {
            Route::get('', 'ProductController@index');
            Route::get('all', 'ProductController@all');
            Route::get('/{id}', 'ProductController@show');
        });

        //reservaciones
        Route::group([
            'prefix' => 'reservacion'
        ], function () {
            Route::get('', 'ReservationController@index');
            Route::get('all', 'ReservationController@all');
            Route::get('/{id}', 'ReservationController@show');
            Route::get('usuario/{user_id}', 'ReservationController@show_for_user');
        });

        //roles
        Route::group([
            'prefix' => 'role'
        ], function () {
            Route::get('', 'RoleController@index');
            Route::get('all', 'RoleController@all');
            Route::get('/{id}', 'RoleController@show');
        });

        //funciones
        Route::group([
            'prefix' => 'funcion'
        ], function () {
            Route::get('', 'ShowController@index');
            Route::get('venta', 'ShowController@sell');
            Route::get('all', 'ShowController@all');
            Route::get('/{id}', 'ShowController@show');
            Route::get('ubicacion/{location_id}', 'ShowController@show_for_location');
            Route::get('pelicula/{movie_id}', 'ShowController@show_for_movie');
        });

        //tiquetes
        Route::group([
            'prefix' => 'tiquete'
        ], function () {
            Route::get('', 'TicketController@index');
            Route::get('all', 'TicketController@all');
            Route::get('/{id}', 'TicketController@show');
            Route::get('funcion/{show_id}', 'TicketController@show_for_a_show');
        });

        //tipos tiquetes
        Route::group([
            'prefix' => 'tipo tiquete'
        ], function () {
            Route::get('', 'TicketTypeController@index');
            Route::get('all', 'TicketTypeController@all');
            Route::get('/{id}', 'TicketTypeController@show');
        });
    });
});
