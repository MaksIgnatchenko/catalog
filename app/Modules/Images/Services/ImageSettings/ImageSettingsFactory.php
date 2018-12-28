<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Images\Services\ImageSettings;

use App\Modules\Advertisement\Enums\AdblockPositionsEnum;
use App\Modules\Advertisement\Services\ImageSettings\AdBackgroundImageSettings;
use App\Modules\Advertisement\Services\ImageSettings\AdLeftImageSettings;
use App\Modules\Advertisement\Services\ImageSettings\AdTopImageSettings;

class ImageSettingsFactory
{
    public static function getInstance(string $position) : ImageSettingsInterface
    {
        switch ($position) {
            case AdblockPositionsEnum::TOP :
                return new AdTopImageSettings();
            case AdblockPositionsEnum::LEFT :
                return new AdLeftImageSettings();
            case AdblockPositionsEnum::BACKGROUND :
                return new AdBackgroundImageSettings();
        }
    }
}