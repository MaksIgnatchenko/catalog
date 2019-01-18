<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.12.2018
 *
 */

//Route::resource('company', 'CompanyController');

Route::middleware(['auth:company', 'verified'])->group(function() {
    Route::get('/', 'DashboardController')->name('company');
    Route::post('/logout', 'Auth\LoginController@logout')->name('companyLogout');
    Route::get('/test', function() {
        $companyOwner = \Illuminate\Support\Facades\Auth::user();
        return $companyOwner->company;
    });
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('companyLogin')->middleware('guest:company');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('guest:company');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');






