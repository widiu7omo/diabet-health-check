<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('roles', App\Http\Controllers\RoleController::class);


Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('jadwalCheckups', App\Http\Controllers\JadwalCheckupController::class);


Route::resource('pemeriksaans', App\Http\Controllers\PemeriksaanController::class);


Route::resource('polaMakans', App\Http\Controllers\PolaMakanController::class);


Route::resource('polaObats', App\Http\Controllers\PolaObatController::class);


Route::resource('jadwalCheckups', App\Http\Controllers\JadwalCheckupController::class);


Route::resource('polaObats', App\Http\Controllers\PolaObatController::class);


Route::resource('polaMakans', App\Http\Controllers\PolaMakanController::class);