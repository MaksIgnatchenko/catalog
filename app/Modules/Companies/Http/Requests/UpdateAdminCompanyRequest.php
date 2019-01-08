<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 17.12.2018
 *
 */

namespace App\Modules\Companies\Http\Requests;

use App\Modules\Companies\Enums\CompanyStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminCompanyRequest extends FormRequest
{
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
		return [
            'status' => ['string', Rule::in(CompanyStatusEnum::getAvailable())],
            'company_images_limit' => 'integer|min:0|max:100',
            'team_images_limit' => 'integer|min:0|max:100',
            'date_change_status' => 'date|after_or_equal:today',
		];
    }
}
