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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('jadwalCheckups', App\Http\Controllers\JadwalCheckupController::class);
    Route::get('jadwalCheckups/polamakan/{id}', [App\Http\Controllers\JadwalCheckupController::class, 'makan'])->name("jadwalCheckups.makan");
    Route::get('jadwalCheckups/obat/{id}', [App\Http\Controllers\JadwalCheckupController::class, 'obat'])->name('jadwalCheckups.obat');
    Route::get('pemeriksaans/jadwalkan/{id}', [App\Http\Controllers\PemeriksaanController::class, 'jadwalkan'])->name("pemeriksaan.jadwalkan");
    Route::get('reminder', [App\Http\Controllers\SettingsController::class, 'reminder'])->name("settings.reminder");
    Route::post('reminder/test', [App\Http\Controllers\SettingsController::class, 'reminderTest'])->name("settings.reminder.test");
    Route::post('reminder/save', [App\Http\Controllers\SettingsController::class, 'reminderSave'])->name("settings.reminder.save");
    Route::get('email', [App\Http\Controllers\SettingsController::class, 'email'])->name("settings.email");
    Route::post('email/save', [App\Http\Controllers\SettingsController::class, 'emailSave'])->name("settings.email.save");
    Route::get('notification', [App\Http\Controllers\SettingsController::class, 'notification'])->name("settings.notification");
    Route::post('notification/save', [App\Http\Controllers\SettingsController::class, 'notificationSave'])->name("settings.notification.save");
    Route::resource('pemeriksaans', App\Http\Controllers\PemeriksaanController::class);
    Route::resource('polaMakans', App\Http\Controllers\PolaMakanController::class);
    Route::resource('polaObats', App\Http\Controllers\PolaObatController::class);
    Route::resource('jadwalCheckups', App\Http\Controllers\JadwalCheckupController::class);
    Route::resource('polaObats', App\Http\Controllers\PolaObatController::class);
    Route::resource('polaMakans', App\Http\Controllers\PolaMakanController::class);
});


Route::resource('motivasis', App\Http\Controllers\MotivasiController::class);
