<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

Route::resource('company', 'CompanyController')->only(['index', 'update', 'edit']);