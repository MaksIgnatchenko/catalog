<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

Route::resource('adblock', 'AdblockController');

////Route::resourse('adblock', 'AdblockController');
//Route::get('adblock', 'AdblockController@index')
//    ->name('adblock.index')
//    ->middleware('permission:index_adblocks');
//
//Route::get('adblock/{adblock}', 'AdblockController@show')
//    ->name('adblock.show')
//    ->middleware('permission:read_adblocks');
//
//Route::get('adblock/create', 'AdblockController@create')
//    ->name('adblock.create')
//    ->middleware('permission:create_adblocks');
//
//Route::post('adblock', 'AdblockController@store')
//    ->name('adblock.store')
//    ->middleware('permission:create_adblocks');
//
//Route::get('adblock/{adblock}/edit', 'AdblockController@edit')
//    ->name('adblock.edit')
//    ->middleware('permission:edit_adblocks');
//
//Route::put('adblock/{adblock}', 'AdblockController@update')
//    ->name('adblock.update')
//    ->middleware('permission:edit_adblocks');
//
//Route::delete('adblock/{adblock}', 'AdblockController@destory')
//    ->name('adblock.destory')
//    ->middleware('permission:delete_adblocks');
