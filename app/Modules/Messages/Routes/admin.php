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

Route::get('/incoming-messages', 'IncomingMessagesController@index')->name('adminIncomingMessages.index');
Route::get('/incoming-messages/{message}', 'IncomingMessagesController@show')->name('adminIncomingMessages.show');
Route::delete('/incoming-messages/{message}', 'IncomingMessagesController@destroy')->name('adminIncomingMessages.destroy');

Route::get('/outgoing-messages', 'OutgoingMessagesController@index')->name('adminOutgoingMessages.index');
Route::get('/outgoing-messages/{message}', 'OutgoingMessagesController@show')->name('adminOutgoingMessages.show');
Route::get('/outgoing-messages/create/{id}', 'OutgoingMessagesController@create')->name('adminOutgoingMessages.create');
Route::post('/outgoing-messages', 'OutgoingMessagesController@store')->name('adminOutgoingMessages.store');
Route::delete('/outgoing-messages/{message}', 'OutgoingMessagesController@destroy')->name('adminOutgoingMessages.destroy');

