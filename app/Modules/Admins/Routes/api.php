<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.2019
 *
 */

Route::get('/specialities', 'SpecialityController@getFromCategory');
Route::get('/types', 'TypeController@getFromSpeciality');





