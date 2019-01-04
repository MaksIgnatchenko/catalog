<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.2019
 *
 */

namespace App\Modules\Companies\Http\Requests;

use App\Modules\Companies\Enums\CompanyStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminCompanyRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:100|unique:companies,name',
            'email' => 'required|email|min:5|max:100|unique:companies,name',
            'password' => 'required|string|min:6|max:50,confirmed',
            'password_confirmation' => 'required|string|max:50|same:password',
            'country_id' => 'required|integer|exists:geography_countries,id',
            'city_id' => 'required|integer|exists:geography_cities,id',
            'category_id' => 'required|integer|exists:categories,id',
            'speciality_id' => 'required|integer|exists:specialities,id',
            'type_id' => 'required|integer|exists:types,id',
            'company_images_limit' => 'required|integer|min:0|max:100',
            'team_images_limit' => 'required|integer|min:0|max:100',
            'status' => [ 'required', 'string', 'max:100', Rule::in(CompanyStatusEnum::getBasicStatuses())],
            'date_change_status' => 'date|after_or_equal:today',
        ];
    }
}
