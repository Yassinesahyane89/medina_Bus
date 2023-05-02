<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\dashboard\AccountController;
use App\Http\Controllers\dashboard\HomePage;
use App\Http\Controllers\LineController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StationController;
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

/* ======================================== Dashboard ======================================== */
Route::redirect('/', '/login', 301)->name('index');

Route::get('home', [HomePage::class, 'index'])->name('home');

Route::prefix('account')->middleware('auth')->group(function () {
  Route::get('settings', [AccountController::class, 'account'])->name('account.settings');
  Route::post('account/image', [AccountController::class, 'account_image'])->name('account.settings.image');
  Route::get('settings/security', [AccountController::class, 'security'])->name('account.settings.security');
});

/**
 * bus
 */

Route::group(['controller' => BusController::class, 'prefix' => 'dashboard/bus'], function () {
  Route::get('/', 'index')->name('bus.index');
  Route::get('create', 'create')->name('bus.create');
  Route::get('edit/{id}', 'edit')->name('bus.edit');
  Route::get('delete/{id}', 'delete')->name('bus.delete');
});

/**
 * station
 */

Route::group(['controller' => StationController::class, 'prefix' => 'dashboard/station'], function () {
  Route::get('/', 'index')->name('station.index');
  Route::get('create', 'create')->name('station.create');
  Route::get('edit/{id}', 'edit')->name('station.edit');
  Route::get('delete/{id}', 'delete')->name('station.delete');
});

/**
 * line
 */

Route::group(['controller' => LineController::class, 'prefix' => 'dashboard/line'], function () {
  Route::get('/', 'index')->name('line.index');
  Route::get('create', 'create')->name('line.create');
  Route::get('edit/{id}', 'edit')->name('line.edit');
  Route::get('delete/{id}', 'delete')->name('line.delete');
});

/**
 * schedule
 */

Route::group(['controller' => ScheduleController::class, 'prefix' => 'dashboard/schedule'], function () {
  Route::get('/', 'index')->name('schedule.index');
  Route::get('create', 'create')->name('schedule.create');
  Route::get('edit/{id}', 'edit')->name('schedule.edit');
  Route::get('delete/{id}', 'delete')->name('schedule.delete');
});

/**
 * admin
 */

Route::group(['controller' => AdminController::class, 'prefix' => 'dashboard/admin'], function () {
  Route::get('/', 'index')->name('admin.index');
  Route::get('create', 'create')->name('admin.create');
  Route::get('edit/{id}', 'edit')->name('admin.edit');
  Route::get('delete/{id}', 'delete')->name('admin.delete');
});
