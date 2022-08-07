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


Route::post('/login', [App\Http\Controllers\API\AuthAPIController::class, 'login']);
Route::post('/register', [App\Http\Controllers\API\AuthAPIController::class, 'register']);
Route::group(['middleware' => 'guest'], function () {
    Route::post("/forgetPassword", [App\Http\Controllers\API\AuthAPIController::class, "forgetPassword"]);
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/post_token_FCM', [App\Http\Controllers\API\AuthAPIController::class, 'postTokenFCM']);
    Route::get('/user', [App\Http\Controllers\API\AuthAPIController::class, 'user']);
    Route::post('/user', [App\Http\Controllers\API\AuthAPIController::class, 'updateProfile']);
    Route::post('/changePassword', [App\Http\Controllers\API\AuthAPIController::class, 'changePassword']);
    Route::resource('users', App\Http\Controllers\API\UserAPIController::class);
    Route::resource('jadwal_checkups', App\Http\Controllers\API\JadwalCheckupAPIController::class);
    Route::resource('pemeriksaans', App\Http\Controllers\API\PemeriksaanAPIController::class);
    Route::resource('pola_makans', App\Http\Controllers\API\PolaMakanAPIController::class);
    Route::resource('pola_obats', App\Http\Controllers\API\PolaObatAPIController::class);
    Route::get('/dokters', [App\Http\Controllers\API\UserAPIController::class, 'dokters']);
});
