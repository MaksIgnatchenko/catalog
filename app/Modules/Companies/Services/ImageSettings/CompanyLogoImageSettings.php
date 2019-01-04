<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Companies\Services\ImageSettings;

use App\Modules\Images\Services\ImageSettings\ImageSettingsInterface;

class CompanyLogoImageSettings implements ImageSettingsInterface
{
    private $path;
    private $ratio;
    private $format;

    public function __construct()
    {
        $this->path = config('image.companies_image_path');
        $this->ratio = config('image.company_logo_image_ratio');
        $this->format =config('image.company_logo_image_format');
    }

    /**
     * @return int
     */
    public function getRatio(): int
    {
        return $this->ratio;
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
