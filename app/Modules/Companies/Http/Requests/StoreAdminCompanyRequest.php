<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.2019
 *
 */

namespace App\Modules\Companies\Http\Requests;

use App\Modules\Companies\Enums\CompanyStatusEnum;
use App\Modules\Companies\Rules\WorkDaysRule;
use App\Modules\Companies\Rules\WorldCountRule;
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
            'email' => 'required|email|min:5|max:100|unique:companies,email',
            'website' => 'url|max:255',
            'phones' => 'array',
            'phones.*' => 'numeric|digits_between:1,20',
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
            'company_image' => 'array',
            'company_image.*' => 'image|mimes:jpeg,png|max:' . config('image.company_images_max_size'),
            'company_team_image' => 'array',
            'company_team_image.*' => 'image|mimes:jpeg,png|max:' . config('image.company_images_max_size'),
            'logo' => 'image|mimes:jpeg,png|max:' . config('image.company_logo_max_size'),
            'about_us' => ['required', 'string', new WorldCountRule(config('company.min_word_count_about_us'))],
            'our_services' => ['required', 'string', new WorldCountRule(config('company.min_word_count_our_services'))],
            'work_days' => ['required', 'array', 'max:7', new WorkDaysRule()],
            'work_days.*.from' => 'date_format:H:i',
            'work_days.*.to' => 'date_format:H:i',
            'latitude' => 'numeric|between:-90,90',
            'longitude' => 'numeric|between:-180,180',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $defaultMessages = parent::messages();
        $otherMessages = [
            'work_days.*.from.*' => 'Invalid time format',
            'work_days.*.to.*' => 'Invalid time format',
        ];
        return array_merge($otherMessages, $defaultMessages);
    }
}
