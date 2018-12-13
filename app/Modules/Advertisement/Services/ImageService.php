<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Advertisement\Services;

use App\Modules\Advertisement\Enums\ImageFormatsEnum;
use App\Modules\Advertisement\Services\ImageSettings\ImageSettingsInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * @var UploadedFile
     */
    private $image;

    /**
     * @var ImageSettingsInterface
     */
    private $settings;

    public function  __construct(UploadedFile $image, ImageSettingsInterface $settings)
    {
        $this->image = $image;
        $this->settings = $settings;
    }

    /**
     * @return string
     */
    public function saveAndCrop() : string
    {
        list($width, $height) = getimagesize($this->image);
        if ($ratio = $this->settings->getRatio()) {
            $height = $width * $ratio;
        }
        $fileName = $this->image->hashName();
        $image = Image::make($this->image)
            ->fit($width, $height);
        if (ImageFormatsEnum::DEFAULT !== $this->settings->getFormat()) {
            $image = $image->encode($this->settings->getFormat());
        }
        return $this->saveImage($fileName, $image);
    }

    /**
     * @param string $fileName
     * @param \Intervention\Image\Image $image
     * @return string
     */
    private function saveImage(string $fileName, \Intervention\Image\Image $image) : string
    {
        $fileName = $this->settings->getPath() . '/' . $fileName;
        Storage::put($fileName, $image);
        return Storage::url($fileName);
    }
}
