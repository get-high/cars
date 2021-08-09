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

Route::get('v1/cars', 'App\Http\Controllers\Api\CarController@index');
Route::post('v1/cars', 'App\Http\Controllers\Api\CarController@store');
Route::patch('v1/cars/{car}', 'App\Http\Controllers\Api\CarController@update');
Route::delete('v1/cars/{car}', 'App\Http\Controllers\Api\CarController@destroy');
