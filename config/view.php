<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        resource_path('views'),
        app_path('Modules/Admins/Resources/views'),
        app_path('Modules/Advertisement/Resources/views'),
        app_path('Modules/Companies/Resources/views'),
        app_path('Modules/Permissions/Resources/views'),
        app_path('Modules/Supervisors/Resources/views'),
        app_path('Modules/StaticContent/Resources/views'),
        app_path('Modules/Messages/Resources/views'),
        app_path('Modules/Visitors/Resources/views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
