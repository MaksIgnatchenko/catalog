<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

Route::get('positions/{type?}', 'PositionController@getAvailablePositions');