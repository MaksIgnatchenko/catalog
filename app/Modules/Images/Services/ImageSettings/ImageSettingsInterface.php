<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Images\Services\ImageSettings;

interface ImageSettingsInterface
{
    /**
     * ImageSettingsInterface constructor.
     */
    public function __construct();

    /**
     * @return int|null
     */
    public function getRatio() : ?int;

    /**
     * @return string|null
     */
    public function getPath() : ?string;

    /**
     * @return string|null
     */
    public function getFormat() : ?string;

    /**
     * @return string|null
     */
    public function getImageType() : ?string;

    /**
     * @return bool
     */
    public function isRequireDifferentSizes() : bool;
}