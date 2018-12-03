<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

Route::middleware(['auth:admin'])->group(function() {
    Route::get('/', 'DashboardController')->name('admin');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::resource('category', 'CategoryController');
    Route::resource('speciality', 'SpecialityController');
    Route::resource('type', 'TypeController');
});

Route::get('/login', 'LoginController@showLoginForm')->name('login')->middleware('guest:admin');
Route::post('/login', 'LoginController@login');


