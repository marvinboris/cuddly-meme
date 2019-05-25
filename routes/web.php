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

Route::get('/', function () {
    return view('admin.login');
});

Route::post('ajax-get-cities-by-country', 'FrontEndController@ajaxGetCitiesByCountry')->name('ajax-get-cities-by-country');


Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {

    # Error pages should be shown without requiring login
    Route::get('404', function () {
        return view('admin/404');
    });
    Route::get('500', function () {
        return view('admin/500');
    });

    # All basic routes defined here
    Route::get('login', 'AuthController@getSignin')->name('login');
    Route::get('signin', 'AuthController@getSignin')->name('signin');
    Route::post('signin', 'AuthController@postSignin')->name('postSignin');
    Route::post('signup', 'AuthController@postSignup')->name('admin.signup');
    Route::post('forgot-password', 'AuthController@postForgotPassword')->name('signup');

    # Forgot Password Confirmation
    Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

    # Account Activation
    Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');

    # Logout
    Route::get('logout', 'AuthController@getLogout')->name('logout');
});




Route::group(['prefix' => 'admin', 'namespace'=>'Admin' , 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('/', 'AuthController@dashboard')->name('dashboard');
    Route::get('home', 'AuthController@dashboard');
    Route::get('dashboard', 'AuthController@dashboard');


    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('trashed', 'UsersController@trashed')->name('trashed');
        Route::post('ajax-check-email', 'UsersController@ajaxCheckEmail')->name('ajax-check-email');
        Route::delete('hard_delete/{user}', 'UsersController@hardDelete')->name('hard_delete');
        Route::put('restore/{user}', 'UsersController@restore')->name('restore');
    });
    Route::resource('users', 'UsersController');

    Route::resource('files', 'FilesController');

    Route::resource('questions', 'QuestionsController');

    Route::group(['prefix' => 'activity_areas', 'as' => 'activity_areas.'], function () {
        Route::put('restore/{activity_area}', 'AtivityAreasController@restore')->name('restore');
    });
    Route::resource('activity_areas', 'AtivityAreasController');

    Route::group(['prefix' => 'payment_options', 'as' => 'payment_options.'], function () {
        Route::put('restore/{payment_options}', 'PaymentOptionsController@restore')->name('restore');
    });
    Route::resource('payment_options', 'PaymentOptionsController');

    Route::get('transactions', 'PaymentsController@transactions')->name('transactions');
});
