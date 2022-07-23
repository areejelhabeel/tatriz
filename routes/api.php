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
Route::namespace('API')->group(function () {
    Route::apiResource('cities', 'CityController');

    Route::post('user/register', 'ApiAuthController@register');
    Route::post('user/login', 'ApiAuthController@login');
    Route::get('user/logout', 'ApiAuthController@logout');


});

Route::namespace('API')->middleware('auth:user')->group(function () {
   
    Route::get('user/logout', 'ApiAuthController@logout');


});


   
   
    
    
    


