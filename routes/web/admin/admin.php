<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\admin\FaqsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppUpdateSettingController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ErrorController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CmsPagesController;
use App\Http\Controllers\Admin\SummernoteController;
use App\Http\Controllers\Admin\VerificationRequestsController;
use App\Http\Controllers\MetaTagController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Admin Extra Middlewares
 * =======================================================================================
 * admin.password.confirm   =>  Re-confirm the password before accessing the given routes.
 * admin.verified           =>  Only email verified admins can see or open the given routes.
 *
 */



Route::controller(PagesController::class)->group(function () {
    // Profile
    Route::get('profile/', 'profile')->name('profile');
    Route::post('profile/update',  'updateProfile')->name('profile.update');
    Route::put('change/password',  'updatePassword')->name('update-password');

    // Quick Link
    Route::get('quickLink', 'quickLink')->name('quickLink');
    Route::post('link/update', 'updateQuickLink')->name('update-quickLink');
});

Route::group(['middleware' => ['check_permit', 'revalidate']], function () {

    Route::controller(PagesController::class)->group(function () {
        /* Dashboard */
        // Route::get('/', 'dashboard')->name('dashboard.index');
        Route::get('/dashboard', 'dashboard')->name('dashboard.index');

        /* Site Configuration */
        Route::get('settings', "showSetting")->name('settings.index');
        Route::post('change-setting', "changeSetting")->name('settings.change-setting');
    });

    /* User */
    Route::post('change/password/{escort}', [UserController::class, 'changePassword'])->name('escorts.changePassword');
    Route::resource('escorts', UserController::class);

    /* Role Management */
    Route::resource('roles', AdminController::class);

    /* Country Management */
    Route::get('countries/listing', [CountryController::class, 'listing'])->name('countries.listing');
    Route::resource('countries', CountryController::class);

    /* State Management */
    Route::get('states/listing', [StateController::class, 'listing'])->name('states.listing');
    Route::resource('states', StateController::class);

    /* City Management */
    Route::get('cities/listing', [CityController::class, 'listing'])->name('cities.listing');
    Route::resource('cities', CityController::class);

    /* CMS Management */
    Route::resource('pages', CmsPagesController::class);

    /* FAQs Management */
    Route::get('faqs/listing', [FaqsController::class, 'listing'])->name('faqs.listing');
    Route::resource('faqs', FaqsController::class);

    /* Blog Management */
    Route::resource('blogs', BlogController::class);

    /* app update settings */
    Route::get('update-settings', [AppUpdateSettingController::class, 'index'])->name('update-settings.index');
    Route::post('app-change-setting', [AppUpdateSettingController::class, 'store'])->name('update-settings.change-setting');

    /* FAQs Management */
    Route::get('verification-requests/listing', [VerificationRequestsController::class, 'listing'])->name('verification-requests.listing');
    Route::resource('verification-requests', VerificationRequestsController::class);

});

// User Exception
Route::get('users-error-listing',  [ErrorController::class, "listing"])->name('error.listing');

//Chart routes
Route::controller(ChartController::class)->name('users.')->group(function () {
    Route::get('register-users-chart', 'getRegisterUser')->name('registerchart');
    Route::get('active-deactive-users-chart', 'getActiveDeactiveUser')->name('activeDeactiveChart');
});

Route::controller(UtilityController::class)->group(function () {
    Route::post('check-email', 'checkEmail')->name('check.email');
    Route::post('check-contact', 'checkContact')->name('check.contact');

    Route::post('check-title', 'checkTitle')->name('check.title');
    Route::post('profile/check-password',  'profilecheckpassword')->name('profile.check-password');
});

Route::post('summernote-image-upload', [SummernoteController::class, 'imageUpload'])->name('summernote.imageUpload');
Route::post('summernote-media-image', [SummernoteController::class, 'mediaDelete'])->name('summernote.mediaDelete');
