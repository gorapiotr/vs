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

Route::group(['prefix' => 'cats'], function() {
    Route::get('/', 'CatController@index');
    Route::get('/{id}', 'CatController@show');
});

Route::group(['prefix' => 'shelters'], function() {
    Route::get('/', 'ShelterController@index');
    Route::get('/{uskey}', 'ShelterController@show');
});