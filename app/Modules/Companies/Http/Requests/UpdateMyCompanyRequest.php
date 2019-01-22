<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 21.01.19
 *
 */

namespace App\Modules\Companies\Http\Requests;

use App\Modules\Companies\Rules\WorkDaysRule;
use App\Modules\Companies\Rules\WorldCountRule;
use App\Modules\Company\Http\Requests\UniqueEntityExcept;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMyCompanyRequest extends FormRequest
{
    use UniqueEntityExcept;

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
            'name' => 'required|string|min:1|max:100|unique:companies,name,' . $this->exceptId(),
            'website' => 'url|max:255',
            'phones' => 'array',
            'phones.*' => 'numeric|digits_between:1,20',
            'country_id' => 'required|integer|exists:geography_countries,id',
            'city_id' => 'required|integer|exists:geography_cities,id',
            'category_id' => 'required|integer|exists:categories,id',
            'speciality_id' => 'required|integer|exists:specialities,id',
            'type_id' => 'required|integer|exists:types,id',
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
