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

Route::prefix('auth')->group(function () {

    Route::post('register', 'AuthController@register');

    Route::post('login', 'AuthController@login');

    Route::get('refresh', 'AuthController@refresh');

    Route::middleware('auth:api')->group(function () {

        Route::get('user', 'AuthController@user');

        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('account/update', 'UserController@update');
});

Route::get('muscle_groups', 'MuscleGroupController@index');

Route::get('sports_projectiles', 'SportsProjectileController@index');

Route::get('exercises', 'ExerciseController@index');
Route::get('/exercises/{exercise}', 'ExerciseController@show');

Route::get('muscles', 'MuscleController@index');
Route::get('/muscles/{muscle}', 'MuscleController@show');

Route::get('workouts', 'WorkoutController@index');
Route::get('/workouts/{workout}', 'WorkoutController@show');
