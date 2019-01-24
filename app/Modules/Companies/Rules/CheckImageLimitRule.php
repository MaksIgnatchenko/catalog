<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 23.01.19
 *
 */

namespace App\Modules\Companies\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckImageLimitRule implements Rule
{
    private $deletingImagesCount;
    private $currentImagesCount;
    private $imagesCountLimit;
    private $addedImagesCount;

    public function __construct($deletingImagesCount, $currentImagesCount, $imagesCountLimit)
    {
        $this->deletingImagesCount = $deletingImagesCount ?? 0;
        $this->currentImagesCount = $currentImagesCount ?? 0;
        $this->imagesCountLimit = $imagesCountLimit ?? 0;
    }

    public function passes($attribute, $value)
    {
        $this->addedImagesCount = $this->getAddedImagesCount($value);
        return $this->compareWithLimit();
    }

    /**
     * @param $value
     * @return int
     */
    private function getAddedImagesCount($value) : int
    {
        return count($value);
    }

    public function compareWithLimit() : bool
    {
        $newCount = $this->currentImagesCount + $this->addedImagesCount - $this->deletingImagesCount;
        return $newCount <= $this->imagesCountLimit;
    }

    public function message()
    {
        return 'You have exceeded the maximum count of images.';
    }

}