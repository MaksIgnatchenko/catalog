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
    'ads_image_path' => 'ads',
    /**
     * ratio = height / width
     */
    'ad_top_image_ratio' => 2,
    'ad_top_image_format' => 'origin',
    /**
     * ratio = height / width
     */
    'ad_left_image_ratio' => 2,
    'ad_left_image_format' => 'origin',
    /**
     * ratio = height / width
     */
    'ad_background_image_ratio' => 1,
    'ad_background_image_format' => 'origin',

    'companies_image_path' => 'companies',

    /**
     * max size for company images (KB).
     */
    'company_images_max_size' => 5120,

    /**
     * max size for company logo (KB).
     */
    'company_logo_max_size' => 1024,

    /**
     * ratio = height / width
     */
    'company_image_ratio' => 1,
    'company_image_format' => 'origin',

    /**
     * ratio = height / width
     */
    'company_team_image_ratio' => 1,
    'company_team_image_format' => 'origin',

    /**
     * ratio = height / width
     */
    'company_logo_image_ratio' => 1,
    'company_logo_image_format' => 'origin',


];
