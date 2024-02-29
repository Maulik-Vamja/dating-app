<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\EscortController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\{Route, Auth};
use Spatie\Sitemap\SitemapGenerator;

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
if (auth()->check()) {
    Route::get('/', [PagesController::class, 'home'])->middleware(['user_validate', 'verified'])->name('welcome');
} else {
    Route::get('/', [PagesController::class, 'home'])->middleware('user_validate')->name('welcome');
}
// Update Auth routes as per your requirement
Auth::routes([
    'confirm' => false, 'verify' => true, 'register' => true, 'login' => true,
]);

// Auth Routes
Route::middleware(['auth', 'verified', 'user_validate'])->group(function () {
    Route::view('home', 'frontend.home');
    Route::get('profile/update', [UserController::class, 'updateProfile'])->name('profile.edit');

    Route::get('profile/{user:user_name}', [UserController::class, 'getProfile'])->name('profile.get');

    Route::post('profile/{user:user_name}/update', [UserController::class, 'update'])->name('profile.update');

    Route::post('store-image', [UserController::class, 'storeImage'])->name('store.image');
    Route::post('remove-image', [UserController::class, 'removeImage'])->name('remove.image');
});

Route::get('/states', [UtilityController::class, 'getStatesFromCountry'])->name('get.states');
Route::get('/cities', [UtilityController::class, 'getCitiesFromState'])->name('get.cities');

Route::get('/escort/{user:user_name}', [EscortController::class, 'getEscort'])->name('get.escort');
Route::get('/search/escorts', SearchController::class)->name('get.escorts');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contact-us');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about-us');

// Blogs  Routes
Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/{blog:slug}', [BlogsController::class, 'show'])->name('blogs.show');
    // Route::get('/blogs/asvc', [BlogsController::class, 'show'])->name('blogs.show');
});

Route::post('/check/username', [UtilityController::class, 'checkUsername'])->name('check.username');
Route::post('/check/email', [UtilityController::class, 'checkEmail'])->name('check.email');
Route::post('/check/contact-no', [UtilityController::class, 'checkContact'])->name('check.contact-no');




// Generate SiteMap for all the Page
Route::get('/generate-sitemap-daynamically', function () {
    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));
    return response()->json(['message' => 'Sitemap generated successfully']);

});
