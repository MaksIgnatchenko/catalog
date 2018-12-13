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

Route::get('/countries', function () {
    return \Khsing\World\Models\Country::orderBy('name')
		->get(['id', 'name'])
		->pluck('name', 'id')
		->prepend('Select country', null)
		->toArray();
});

Route::get('/cities/{country}', 'CityController@getFromCountry');