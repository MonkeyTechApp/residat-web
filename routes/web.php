<?php

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
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/restore', 'UserController@restore')->name('users.restore');
    Route::get('users/{id}/restore', 'UserController@restoreUser')->name('users.restore-user');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::any('users/{id}/destroy', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');

    // Countries
    Route::get('countries', 'CountryController@index')->name('countries');
    Route::get('countries/restore', 'CountryController@restore')->name('countries.restore');
    Route::get('countries/{id}/restore', 'CountryController@restoreUser')->name('countries.restore-country');
    Route::get('countries/{country}', 'CountryController@show')->name('countries.show');
    Route::get('countries/{country}/edit', 'CountryController@edit')->name('countries.edit');
    Route::put('countries/{country}', 'CountryController@update')->name('countries.update');
    Route::any('countries/{id}/destroy', 'CountryController@destroy')->name('countries.destroy');

    // Regions
    Route::get('regions', 'RegionController@index')->name('regions');
    Route::get('regions/restore', 'RegionController@restore')->name('regions.restore');
    Route::get('regions/{id}/restore', 'RegionController@restoreUser')->name('regions.restore-country');
    Route::get('regions/{region}', 'RegionController@show')->name('regions.show');
    Route::get('regions/{region}/edit', 'RegionController@edit')->name('regions.edit');
    Route::put('regions/{region}', 'RegionController@update')->name('regions.update');
    Route::any('regions/{id}/destroy', 'RegionController@destroy')->name('regions.destroy');

    // Zones
    Route::get('zones', 'ZoneController@index')->name('zones');
    Route::get('zones/create', 'ZoneController@create')->name('zones.create');
    Route::get('zones/restore', 'ZoneController@restore')->name('zones.restore');
    Route::get('zones/{id}/restore', 'ZoneController@restoreUser')->name('zones.restore-country');
    Route::get('zones/{zone}', 'ZoneController@show')->name('zones.show');
    Route::get('zones/{zone}/edit', 'ZoneController@edit')->name('zones.edit');
    Route::put('zones/{zone}', 'ZoneController@update')->name('zones.update');
    Route::post('zones/create', 'ZoneController@store')->name('zones.post');
    Route::any('zones/{id}/destroy', 'ZoneController@destroy')->name('zones.destroy');
});


Route::get('/', 'HomeController@index');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});
