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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', 'AuthController@login');
        Route::post('/register', 'AuthController@register');
        Route::post('/logout', 'AuthController@logout');
    });

    Route::group(['prefix' => 'drivers','middleware' => 'jwt.verify'], function () {
        // Get All Drivers
        Route::get('get_all', 'DriversController@getAll');
        // Get Driver By ID
        Route::get('get_by_id/{id}', 'DriversController@getById');
        // Add New Driver
        Route::post('create', 'DriversController@create');
        // Update Driver
        Route::post('update/{id}', 'DriversController@update');
        // Delete Driver
        Route::delete('delete/{id}', 'DriversController@delete');
    });
});


