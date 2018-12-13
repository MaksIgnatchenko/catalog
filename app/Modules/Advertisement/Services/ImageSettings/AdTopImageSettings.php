<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Advertisement\Services\ImageSettings;


class AdTopImageSettings implements ImageSettingsInterface
{
    private $path;
    private $ration;
    private $format;

    public function __construct()
    {
        $this->path = config('image.ads_image_path');
        $this->ration = config('image.ad_top_image_ratio');
        $this->format = config('image.ad_top_image_format');
    }

    public function getRatio(): int
    {
        // TODO: Implement getWidth() method.
    }

    public function getPath(): string
    {
        // TODO: Implement getPath() method.
    }
}
