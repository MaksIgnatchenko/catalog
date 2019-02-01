<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.01.19
 *
 */

Route::get('search', 'SearchController@showSearchForm')->name('search');
Route::get('result', 'SearchController@search')->name('result');
