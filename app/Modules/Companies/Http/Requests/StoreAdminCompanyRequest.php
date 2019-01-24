<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.2019
 *
 */

namespace App\Modules\Companies\Http\Requests;

use App\Modules\Companies\Enums\CompanyStatusEnum;
use Illuminate\Validation\Rule;

class StoreAdminCompanyRequest extends StoreCompanyRequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:1|max:100|unique:companies,name',
            'email' => 'required|email|min:5|max:100|unique:company_owners,email',
            'password' => 'required|string|min:6|max:50,confirmed',
            'password_confirmation' => 'required|string|max:50|same:password',
            'company_images_limit' => 'required|integer|min:0|max:100',
            'team_images_limit' => 'required|integer|min:0|max:100',
            'status' => [ 'required', 'string', 'max:100', Rule::in(CompanyStatusEnum::getBasicStatuses())],
            'date_change_status' => 'date|after_or_equal:today',
        ];

        return array_merge(parent::rules(), $rules);
    }
}
