<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Advertisement\Services\ImageSettings;


use App\Modules\Advertisement\Enums\AdblockPositionsEnum;
use App\Modules\Images\Enums\DisplayRatioEnum;
use App\Modules\Images\Services\ImageSettings\ImageSettingsInterface;

class AdBackgroundImageSettings implements ImageSettingsInterface
{
    private $path;
    private $ration;
    private $format;
    private $imageType;
    private $responsiveRatios;


    public function __construct()
    {
        $this->path = config('image.ads_image_path');
        $this->ration = config('image.ad_background_image_ratio');
        $this->format =config('image.ad_background_image_format');
        $this->imageType = AdblockPositionsEnum::BACKGROUND;
        $this->responsiveRatios = DisplayRatioEnum::getAvailable();
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

    /**
     * @return string|null
     */
    public function getImageType(): ?string
    {
        return $this->imageType ?? null;
    }

    /**
     * @return bool
     */
    public function isRequireDifferentSizes(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function getResponsiveRatios() : array
    {
        return $this->responsiveRatios;
    }
}
