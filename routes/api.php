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

// Route::post('livres/{livre}/lectures', 'LectureController@store');

Route::apiResource('books', 'Api\BookController');

// index store show update destroy
// Route::get('books/{book}/sessions', 'Api\ReadingSessionsController@index');
// Route::post('books/{book}/sessions', 'Api\ReadingSessionsController@store');
// Route::get('books/{book}/sessions/{readingSession}', 'Api\ReadingSessionsController@show');
// Route::patch('books/{book}/sessions/{readingSession}', 'Api\ReadingSessionsController@update');
// Route::delete('books/{book}/sessions/{readingSession}', 'Api\ReadingSessionsController@destroy');

Route::apiResource('books/{book}/sessions', 'Api\ReadingSessionsController');
