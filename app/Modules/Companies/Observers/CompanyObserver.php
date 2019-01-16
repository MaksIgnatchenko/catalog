<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Observers;

use App\Modules\Companies\Enums\CompanyImagePositionsEnum;
use App\Modules\Companies\Models\Company;
use App\Modules\Companies\Services\CompanyStatusChanger;
use App\Modules\Images\Models\Image;
use App\Modules\Images\Services\ImageService;
use App\Modules\Images\Services\ImageSettings\ImageSettingsFactory;
use App\Modules\Images\Services\ImageSettings\ImageSettingsInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CompanyObserver
{
    /**
     * Creating company listener.
     *
     * @param Company $company
     */
    public function creating(Company $company) : void
    {
        $attributes = $company->toArray();
        $companyStatusChanger = new CompanyStatusChanger($attributes);
        $statusData = $companyStatusChanger->getReplacementData();
        $company->fill(array_merge($statusData));
    }

    /**
     * Created company listener.
     *
     * @param Company $company
     */
    public function created(Company $company) : void
    {
        $this->saveCompanyImages($company, CompanyImagePositionsEnum::COMPANY_IMAGE);
        $this->saveCompanyImages($company, CompanyImagePositionsEnum::TEAM_IMAGE);
    }

    /**
     * Deleting company listener.
     *
     * @param Company $company
     */
    public function deleting(Company $company) : void
    {
        $images = $company->images()
            ->get(['url'])
            ->pluck('url', 'url')
            ->values()
            ->toArray();
        $images[] = $company->logo;
        Storage::delete($images);
        $company->images()->delete();
    }

    /**
     * Updating company listener.
     *
     * @param Company $company
     */
    public function updating(Company $company) : void
    {
        $changedAttributes = $company->getDirty();
        $companyStatusChanger = new CompanyStatusChanger($changedAttributes);
        $statusData = $companyStatusChanger->getReplacementData();
        $company->fill(array_merge($statusData));
    }

    /**
     * @param Company $company
     * @param string $imagePosition
     */
    private function saveCompanyImages(Company $company, string $imagePosition) : void
    {
        if ($incomingImages = $company->images[$imagePosition] ?? null) {
            $images = [];
            foreach ($company->images[$imagePosition] as $image) {
                $imageSettings = ImageSettingsFactory::getInstance($imagePosition);
                $images[] = $this->getImage($image, $imageSettings);
            }
            $company->images()->saveMany($images);
        }
    }

    /**
     * @param UploadedFile $image
     * @param ImageSettingsInterface $imageSettings
     * @return Image
     */
    private function getImage(UploadedFile $image, ImageSettingsInterface $imageSettings) : Image
    {
        $imageService = new ImageService($image, $imageSettings);
        $image = app()[Image::class]
            ->fill([
                'url' => $imageService->getUrl(),
                'type' => $imageService->getImageType(),
            ]);
        return $image;
    }
}
