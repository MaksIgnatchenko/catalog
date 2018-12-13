<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Advertisement\Services\ImageSettings;

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
}