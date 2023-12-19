<?php

use Illuminate\Support\Facades\{Route, Auth};

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

/**
 * Extra Middlewares
 * =======================================================================================
 * password.confirm   =>  Re-confirm the password before accessing the given routes
 * verified           =>  Only email verified user can see or open the given routes
 *
 */

// Guest Routes
Route::view('/', 'welcome');
// Update Auth routes as per your requirement
Auth::routes([
    'confirm' => true, 'verify' => true, 'register' => false, 'login' => false,
]);

// Auth Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'frontend.home');
});
