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


Route::get('/', 'FrontEndController@home')->name('home');

Route::get('/sysadmin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::post('ajax-get-cities-by-country', 'FrontEndController@ajaxGetCitiesByCountry')->name('ajax-get-cities-by-country');
Route::post('ajax-search-cities', 'FrontEndController@ajaxSearchCities')->name('ajax-search-cities');

Route::match(['get','post'],'search', 'FrontEndController@searchWorker')->name('search-worker');


Route::get('register', 'FrontEndController@register')->name('register');
Route::post('register', 'FrontEndController@postRegister');
Route::get('registration-sucess', 'FrontEndController@registrationSucess')->name('registration-sucess');

Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@postSignin');
Route::get('logout', 'AuthController@getLogout')->name('logout');
Route::get('how-it-works', 'FrontEndController@howItWorks')->name('how-it-works');


# Account Activation
Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');

Route::get('activity-areas', 'FrontEndController@browseActivityAreas')->name('activity-areas');

Route::get('contact', 'FrontEndController@contact')->name('contact');
Route::post('contact', 'FrontEndController@postContact')->name('contact');


Route::get('payment', 'FrontEndController@payment')->name('payment')->middleware('user');


Route::group(['middleware' => 'has-paid'], function () {
    Route::get('dashboard', 'AuthController@dashboard')->name('dashboard');
});


Route::group(['prefix' => 'edit-user', 'middleware' => 'has-paid', 'as' => 'edit-user.'], function () {
    Route::post('ajax-check-email', 'EditUserController@ajaxCheckEmail')->name('ajax-check-email');
    Route::put('personal', 'EditUserController@personal')->name('personal');
    Route::put('specialization', 'EditUserController@specialization')->name('specialization');

    Route::put('video', 'EditUserController@updateVideo')->name('video');
    Route::delete('del-video', 'EditUserController@delVideo')->name('del-video');

    Route::put('update-cv', 'EditUserController@updateCV')->name('update-cv');

    Route::put('update-pic', 'EditUserController@updatePic')->name('update-pic');

    Route::post('add-attestation', 'EditUserController@addAttestation')->name('add-attestation');
    Route::delete('del-attestation/{attestation}', 'EditUserController@delAttestation')->name('del-attestation');

    Route::put('social-networks', 'EditUserController@socialNetworks')->name('social-networks');

    Route::post('question/{question}', 'EditUserController@question')->name('question');

    Route::post('change-password', 'EditUserController@changePassword')->name('change-password');
});


Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'as' => 'admin.'], function () {

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

    Route::group(['prefix' => 'payment_methods', 'as' => 'payment_methods.'], function () {
        Route::put('restore/{payment_method}', 'PaymentMethodsController@restore')->name('restore');
    });
    Route::resource('payment_methods', 'PaymentMethodsController');

    Route::get('transactions', 'TransactionsController@transactions')->name('transactions');
});



Route::get('{link}', 'FrontEndController@userLink')->name('user-link');
