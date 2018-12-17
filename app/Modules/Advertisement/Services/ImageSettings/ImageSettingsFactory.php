<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Advertisement\Services\ImageSettings;

use App\Modules\Advertisement\Enums\AdblockPositionsEnum;

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