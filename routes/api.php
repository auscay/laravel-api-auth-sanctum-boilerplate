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

Route::prefix('auth')->group(function () {
	Route::post('signup', 'App\Http\Controllers\Api\Auth\AuthController@signup')->name('auth.signup');
	Route::post('login', 'App\Http\Controllers\Api\Auth\AuthController@login')->name('auth.login');
	Route::post('logout', 'App\Http\Controllers\Api\Auth\AuthController@logout')->middleware('auth:sanctum')->name('auth.logout');
	Route::get('user', 'App\Http\Controllers\Api\Auth\AuthController@getAuthenticatedUser')->middleware('auth:sanctum')->name('auth.user');

	Route::post('/password/email', 'App\Http\Controllers\Api\Auth\AuthController@sendPasswordResetLinkEmail')->middleware('throttle:5,1')->name('password.email');
	Route::post('/password/reset', 'App\Http\Controllers\Api\Auth\AuthController@resetPassword')->name('password.reset');
});

Route::prefix('auth')->group(function () {
	Route::post('artist/signup', 'App\Http\Controllers\Api\Auth\ArtistController@signup')->name('auth.signup');
	Route::post('artist/login', 'App\Http\Controllers\Api\Auth\ArtistController@login')->name('auth.login');
	Route::post('artist/logout', 'App\Http\Controllers\Api\Auth\ArtistController@logout')->middleware('auth:sanctum')->name('auth.logout');
	Route::get('user', 'App\Http\Controllers\Api\Auth\ArtistController@getAuthenticatedUser')->middleware('auth:sanctum')->name('auth.user');

	Route::post('artist/password/email', 'App\Http\Controllers\Api\Auth\ArtistController@sendPasswordResetLinkEmail')->middleware('throttle:5,1')->name('password.email');
	Route::post('artist/password/reset', 'App\Http\Controllers\Api\Auth\ArtistController@resetPassword')->name('password.reset');
});
