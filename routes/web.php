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
    return view('welcome');
});

Route::domain('localhost')->group(function () {
    Route::get('test', function () {
        return rand(1, 100) . 'main';
    });
});

Route::domain('company.localhost')->group(function () {
    Route::get('test', function () {
        return rand(1, 100) . 'company';
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
