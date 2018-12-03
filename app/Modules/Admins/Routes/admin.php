<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

Route::get('/login', 'LoginController@showLoginForm')->name('login')->middleware('guest:admin');
Route::post('/login', 'LoginController@login');

Route::get('test', function(){return rand(1, 100) . 'admin';});


