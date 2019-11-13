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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::apiResource('livres', 'LivreController');
Route::post('livres/{livre}/lectures', 'LectureController@store');

Route::apiResource('books', 'Api\BookController');

// Route::get('books', 'BookController@index');
// Route::post('books/{book}', 'BookController@store');
// Route::get('books/{book}', 'BookController@show');
// Route::put('books/{book}', 'BookController@update');
// Route::delete('books/{book}', 'BookController@destroy');
