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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('hello', function () {
    return 'Hello World laravel';
});


Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::post('test', function () {
    return 'this is a test';
});

//Route::get('order', 'OrderController@show');
Route::apiResource('orders', 'OrderController');
Route::apiResource('restos', 'RestoController');
Route::apiResource('categories', 'CategoryController');

Route::post('register','AuthController@register');
Route::post('login','AuthController@login');
