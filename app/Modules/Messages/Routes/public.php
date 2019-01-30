<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

Route::get('booking-appointment/create/{id}', 'OutgoingMessagesToCompanyController@create')->name('publicOutgoingMessagesToCompany.create');
Route::post('booking-appointment', 'OutgoingMessagesToCompanyController@store')->name('publicOutgoingMessagesToCompany.store');

Route::get('contact-admin/create', 'OutgoingMessagesToAdminController@create')->name('publicOutgoingMessagesToAdmin.create');
Route::post('contact-admin', 'OutgoingMessagesToAdminController@store')->name('publicOutgoingMessagesToAdmin.store');

