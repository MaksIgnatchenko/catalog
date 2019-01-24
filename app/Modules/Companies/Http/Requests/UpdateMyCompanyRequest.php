<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 21.01.19
 *
 */

namespace App\Modules\Companies\Http\Requests;

use App\Helpers\PostgresConstraints;
use App\Modules\Companies\Enums\CompanyImagePositionsEnum;
use App\Modules\Companies\Models\Company;
use App\Modules\Companies\Rules\CheckImageLimitRule;
use App\Modules\Company\Http\Requests\UniqueEntityExcept;
use Illuminate\Support\Facades\Auth;

class UpdateMyCompanyRequest extends StoreCompanyRequestAbstract
{
    use UniqueEntityExcept;

    /**
     * @var
     */
    private $company;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'company_image' => [
                'array',
                new CheckImageLimitRule(
                    $this->getDeletingImagesCount(CompanyImagePositionsEnum::COMPANY_IMAGE),
                    $this->getCurrentImagesCount(CompanyImagePositionsEnum::COMPANY_IMAGE),
                    $this->getImagesCountLimit(CompanyImagePositionsEnum::COMPANY_IMAGE)
                )
            ],
            'company_team_image' => [
                'array',
                new CheckImageLimitRule(
                    $this->getDeletingImagesCount(CompanyImagePositionsEnum::TEAM_IMAGE),
                    $this->getCurrentImagesCount(CompanyImagePositionsEnum::TEAM_IMAGE),
                    $this->getImagesCountLimit(CompanyImagePositionsEnum::TEAM_IMAGE)
                )
            ],
            'name' => 'required|string|min:1|max:100|unique:companies,name,' . $this->exceptId(),
            'delete_company_images' => 'array',
            'delete_company_images.*' => 'integer|min:1|max:' . PostgresConstraints::MAX_ID_VALUE . ',',
            'delete_team_images' => 'array',
            'delete_team_images.*' => 'integer|min:1|max:' . PostgresConstraints::MAX_ID_VALUE . ',',
        ];
        return array_merge(parent::rules(), $rules);
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        if (!$this->company) {
            $this->company = Auth::user()
                ->company()
                ->with('images')
                ->withCount([
                    'images as companyImagesCount' => function ($query) {
                        $query->where('type', CompanyImagePositionsEnum::COMPANY_IMAGE);
                    },
                    'images as teamImagesCount' => function ($query) {
                        $query->where('type', CompanyImagePositionsEnum::TEAM_IMAGE);
                    }])
                ->first();
        }
        return $this->company;
    }

    private function getDeletingImagesCount(string $imageType) : int
    {
        switch ($imageType) {
            case CompanyImagePositionsEnum::COMPANY_IMAGE :
                return count($this->delete_company_images ?? []);
            case CompanyImagePositionsEnum::TEAM_IMAGE :
                return count($this->delete_team_images ?? []);
        }
    }

    /**
     * @param string $imageType
     * @return int
     */
    private function getCurrentImagesCount(string $imageType) : int
    {
        switch ($imageType) {
            case CompanyImagePositionsEnum::COMPANY_IMAGE :
                return $this->getCompany()->companyImagesCount ?? 0;
            case CompanyImagePositionsEnum::TEAM_IMAGE :
                return $this->getCompany()->teamImagesCount ?? 0;
        }
    }

    /**
     * @param string $imageType
     * @return int
     */
    private function getImagesCountLimit(string $imageType) : int
    {
        switch ($imageType) {
            case CompanyImagePositionsEnum::COMPANY_IMAGE :
                return $this->getCompany()->company_images_limit ?? 0;
            case CompanyImagePositionsEnum::TEAM_IMAGE :
                return $this->getCompany()->team_images_limit ?? 0;
        }
    }
}
