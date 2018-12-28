<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Advertisement\Services\ImageSettings;


use App\Modules\Images\Services\ImageSettings\ImageSettingsInterface;

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

    /**
     * @return int
     */
    public function getRatio(): int
    {
        return $this->ration;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string|null
     */
    public function getFormat() : ?string
    {
        return $this->format;
    }
}
