<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Images\Services;

use App\Modules\Advertisement\Enums\ImageFormatsEnum;
use App\Modules\Images\Services\ImageSettings\ImageSettingsInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * @var UploadedFile
     */
    private $originImage;
    private $image;

    /**
     * @var ImageSettingsInterface
     */
    private $settings;

    public function  __construct(UploadedFile $image, ImageSettingsInterface $settings)
    {
        $this->originImage = $image;
        $this->settings = $settings;
    }

    /**
     * @return string
     */
    public function saveAndCrop() : string
    {
        $originFormat = $this->originImage->getClientOriginalExtension();
        $fileName = $this->originImage->hashName();
        $this->image = Image::make($this->originImage);
        $this->resizeImage();
        if (ImageFormatsEnum::ORIGIN === $this->settings->getFormat()) {
            $image = $this->image->encode($originFormat);
        } else {
            $image = $this->image->encode($this->settings->getFormat());
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
        return $fileName;
    }

    private function resizeImage() {
        if (($ratio = $this->settings->getRatio()) >= 1) {
            $height = $this->image->height();
            $width = round($height / $ratio);
        } else {
            $width = $this->image->width();
            $height = $width * $ratio;
        }
        $this->image->fit($width, $height);
    }

}
