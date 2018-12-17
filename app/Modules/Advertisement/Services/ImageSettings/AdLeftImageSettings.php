<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Advertisement\Services\ImageSettings;


class AdLeftImageSettings implements ImageSettingsInterface
{
    private $path;
    private $ration;
    private $format;

    public function __construct()
    {
<<<<<<< HEAD
        $this->path = config('image.ad_left_image_path');
=======
        $this->path = config('image.ads_image_path');
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
        $this->ration = config('image.ad_left_image_ratio');
        $this->format =config('image.ad_left_image_format');
    }

    public function getRatio(): int
    {
        return $this->ration;
    }

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

<<<<<<< HEAD
}
=======
}
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
