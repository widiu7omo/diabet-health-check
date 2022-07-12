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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('users', App\Http\Controllers\API\UserAPIController::class)->middleware('auth:sanctum');
Route::resource('jadwal_checkups', App\Http\Controllers\API\JadwalCheckupAPIController::class)->middleware('auth:sanctum');
Route::resource('pemeriksaans', App\Http\Controllers\API\PemeriksaanAPIController::class)->middleware('auth:sanctum');
Route::resource('pola_makans', App\Http\Controllers\API\PolaMakanAPIController::class)->middleware('auth:sanctum');
Route::resource('pola_obats', App\Http\Controllers\API\PolaObatAPIController::class)->middleware('auth:sanctum');
