<?php

use App\Http\Controllers\pages\HomePage;
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
