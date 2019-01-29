<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/incoming-messages', 'IncomingMessagesController@index')->name('companyIncomingMessages.index');
Route::get('/incoming-messages/{message}', 'IncomingMessagesController@show')->name('companyIncomingMessages.show');
Route::delete('/incoming-messages/{message}', 'IncomingMessagesController@destroy')->name('companyIncomingMessages.destroy');

Route::get('/outgoing-messages', 'OutgoingMessagesController@index')->name('companyOutgoingMessages.index');
Route::get('/outgoing-messages/create', 'OutgoingMessagesController@create')->name('companyOutgoingMessages.create');
Route::get('/outgoing-messages/{message}', 'OutgoingMessagesController@show')->name('companyOutgoingMessages.show');
Route::post('/outgoing-messages', 'OutgoingMessagesController@store')->name('companyOutgoingMessages.store');
Route::delete('/outgoing-messages/{message}', 'OutgoingMessagesController@destroy')->name('companyOutgoingMessages.destroy');


