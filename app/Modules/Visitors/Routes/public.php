<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.01.19
 *
 */

Route::get('/', 'MainPageController')->name('mainPage');
Route::get('result', 'SearchController@search')->name('result');

Route::post('/login', 'Auth\LoginController@login')->name('visitorLogin');
Route::post('/visitorRegister', 'Auth\RegisterController@register')->name('visitorRegister');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('visitorVerification.verify');

Route::middleware('auth:visitor')->group(function() {
    Route::post('/logout', 'Auth\LoginController@logout')->name('visitorLogout');
});

Route::get('x', function() {
    return route('visitorVerification.verify', ['id' => 10]);
});

