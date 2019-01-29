<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

Route::get('test', function() {
//    return response()->download(\App\Helpers\CustomUrl::getFull(public_path('files/d0QB0BWdsHmIPGge9SBRhr7VV9wYtBPyGLIc2hDu.jpeg')));
    $path = \Illuminate\Support\Facades\Storage::url('files/p27WYW24KeyF01jUs7HsefIg8cemn9PxGm0kWHg7.jpeg');
    return response()->download($path, 'file.jpeg', ['Content-Type' => 'image/jpg']);
//    dd(\Illuminate\Support\Facades\Storage::getVisibility('files/d0QB0BWdsHmIPGge9SBRhr7VV9wYtBPyGLIc2hDu.jpeg'));

});