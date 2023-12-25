<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\EscortController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UtilityController;
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
Route::get('/', [PagesController::class, 'home'])->name('welcome');
// Update Auth routes as per your requirement
Auth::routes([
    'confirm' => false, 'verify' => false, 'register' => true, 'login' => true,
]);

// Auth Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'frontend.home');

    Route::get('profile/{user:user_name}', [EscortController::class, 'getProfile'])->name('profile');
});

Route::get('/states', [UtilityController::class, 'getStatesFromCountry'])->name('get.states');
Route::get('/escorts/{user:user_name}', [EscortController::class, 'getEscort'])->name('get.escort');
Route::get('/search/escorts', SearchController::class)->name('get.escorts');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contact-us');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about-us');

// Blogs  Routes
Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/{blog:slug}', [BlogsController::class, 'show'])->name('blogs.show');
    // Route::get('/blogs/asvc', [BlogsController::class, 'show'])->name('blogs.show');
});
