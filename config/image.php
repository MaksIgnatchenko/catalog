<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    /**
     * ratio = height / width
     */
    'ad_top_image_ratio' => 2,
    'ad_top_image_path' => 'ads',
    'ad_top_image_format' => 'default',

    /**
     * ratio = height / width
     */
    'ad_left_image_ratio' => 2,
    'ad_left_image_path' => 'ads',
    'ad_left_image_format' => 'default',

    /**
     * ratio = height / width
     */
    'ad_background_image_ratio' => 1,
    'ad_background_image_path' => 'ads',
    'ad_background_image_format' => 'default',
];
