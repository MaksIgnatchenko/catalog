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
use Intervention\Image\ImageManagerStatic;

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

    /**
     * ImageService constructor.
     * @param UploadedFile $image
     * @param ImageSettingsInterface $settings
     */
    public function  __construct(UploadedFile $image, ImageSettingsInterface $settings)
    {
        $this->originImage = $image;
        $this->settings = $settings;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        $originFormat = $this->originImage->getClientOriginalExtension();
        $fileName = $this->originImage->hashName();
        $this->image = Image::make($this->originImage);
        $frame = $this->getFrame();
        $this->image = $frame->insert($this->image, 'center');
        if (ImageFormatsEnum::ORIGIN === $this->settings->getFormat()) {
            $image = $this->image->encode($originFormat);
        } else {
            $image = $this->image->encode($this->settings->getFormat());
        }
        return $this->saveImage($fileName, $image);
    }

    /**
     * @return string|null
     */
    public function getImageType() : ?string
    {
        return $this->settings->getImageType();
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

    /**
     * @return \Intervention\Image\Image
     */
    private function getFrame() : \Intervention\Image\Image
    {
        $width = $this->image->width();
        $height = $this->image->height();
        $ratio = $this->settings->getRatio();

        $mismatchWidth = $width - $height / $ratio;
        $mismatchHeight = $height - $width * $ratio;

        if ($mismatchWidth < 0 && $mismatchHeight > 0) {
            $width = $height / $ratio;
        } else {
            $height = $width * $ratio;
        }
        return ImageManagerStatic::canvas($width, $height);
    }

}
