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

Route::get('/countries', 'CountryController@getCountryList');

Route::get('/cities/{country}', 'CityController@getFromCountry');

<<<<<<< HEAD
Route::post('/test', function(Request $request) {
    $obj = new \App\Modules\Admins\Models\Category();
    $obj->fill($request->all());
    $obj->save();
});
=======
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72

